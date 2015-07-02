<?php

namespace EcEnglish\ApiClient;

class ApiException extends \Exception {
    public function __construct($message, $code, Exception $previous = null) {
        parent::__construct($message, 0, $previous);
        $this->Code = $code;
    }
}

?>
