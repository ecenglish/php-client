<?php
namespace EcEnglish\ApiClient;

class OffsetDateTime {
    public function __construct($offsetSeconds, $date) {
        $this->offsetSeconds = $offsetSeconds;
        $this->date = $date;
    }
}

?>
