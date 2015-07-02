<?php

namespace EcEnglish\ApiClient;

class ValidationException extends ApiException {
    public function __construct($message, $errors, $code, Exception $previous = null) {
        parent::__construct($message, $errors, $code, $previous);
        $this->Errors = $errors;
    }
}

?>
