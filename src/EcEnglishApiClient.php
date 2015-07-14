<?php
namespace EcEnglish\ApiClient;

use League\Url\UrlImmutable;

class EcEnglishApiClient {
    private $url;

    public function __construct($options) {
        $url = $options->BaseUrl;
        if ($url === NULL) {
            throw new Exception('Options must contain a URL');
        }
        $apiKey = $options->ApiKey;
        if ($apiKey === NULL) {
            throw new Exception('You must specify an ApiKey');
        }

        $this->url = $url;
        $this->apiKey = $apiKey;

        $this->curlOpts = array(
            \CURLOPT_RETURNTRANSFER => true,
            \CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'X-ApiKey: ' . $apiKey
            )
        );

        if ($options->SetCurlToVerbose) {
            $this->curlOpts[\CURLOPT_VERBOSE] = true;
        }
    }

    public function Send($msg) {
        $dto = $msg->_EcInternal_Serialize();
        $json = json_encode($dto);

        $pathPart = $msg->_EcInternal_GetUrl();
        $url = $this->url . $pathPart;

        $curl = \curl_init((string) $url);
        \curl_setopt_array($curl, $this->curlOpts);
        \curl_setopt($curl, \CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($curl);

        if ($result === FALSE) {
            throw new \Exception('Error calling EC English API: ' . curl_error($curl));
        }

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($httpCode >= 400) {
            $errorJson = json_decode($result);
            $message = 'HTTP Error Calling EC English API: ' . $httpCode;
            $code = 'HttpError';

            if ($errorJson and \property_exists($errorJson, 'ResponseStatus')) {
                $responseStatus = $errorJson->ResponseStatus;
                if(\property_exists($responseStatus, 'Message')) {
                    $message = $responseStatus->Message;
                }
                if (\property_exists($responseStatus, 'ErrorCode')) {
                    $code = $responseStatus->ErrorCode;
                }

                if (\property_exists($responseStatus, 'Errors')) {
                    throw new ValidationException($message, $responseStatus->Errors, $code);
                }

            }

            throw new ApiException($message, $code);
        }

        $responseDto = json_decode($result);
        return $msg->_EcInternal_DeserializeResponse($responseDto);
    }
}

?>
