<?php
namespace EcEnglish\ApiClient;

class OffsetDateTime {
    public function __construct($offsetSeconds, $date) {
        $this->offsetSeconds = $offsetSeconds;
        $this->date = $date;
    }

    public static function Parse($obj) {
        $tz = new \DateTimeZone('Etc/UTC');
        $dt = \DateTime::createFromFormat('!Y-m-d\\TH:i:s.u+', $obj, $tz);
        if ($dt === FALSE)
            throw new \Exception('Unable to parse DateTime');
        $matched = preg_match('/(\\+|\\-)([0-9:]+)(\\.[0-9]+)?$/', $obj, $matches);
        if (!$matched) {
            throw new \Exception('Unable to find offset');
        }

        $time = explode(':', $matches[2]);
        while(count($time) < 3) {
            array_push($time, 0);
        }

        $hoursPart = $time[0] * 60 * 60;
        $minsPart = $time[1] * 60;
        $secsPart = $time[2];
        $secs = $hoursPart + $minsPart + $secsPart;
        if ($matches[0] == '-') {
            $secs = $secs * -1;
        }

        if (count($matches) > 3 && $matches[3]) {
            $secs .= $matches[3];
            $secs = (float) $secs;
        }

        return new OffsetDateTime($secs, $dt);
    }

    public function formatIsoString() {
        $offsetSeconds = $this->offsetSeconds;
        $sign = $offsetSeconds < 0 ? '-' : '+';
        if ($sign == '-') {
            $offsetSeconds *= -1;
        }
        $offsetSecondsInt = floor($offsetSeconds);
        $hours = floor($offsetSecondsInt / 3600);
        $mins = floor(($offsetSecondsInt - ($hours*3600)) / 60);
        $secs = floor(((int)$offsetSecondsInt) % 60);
        $fraction = $offsetSeconds - $offsetSecondsInt;
        $secs += $fraction;
        $offsetStr = $sign;
        $offsetStr .= \str_pad($hours, 2, '0', \STR_PAD_LEFT);
        if ($mins != 0 or $secs != 0) {
            $offsetStr .= ':' . $mins;
        }
        if ($secs != 0) {
            $offsetStr .= ':' . $secs;
        }

        $dateStr = $this->date->format('Y-m-d\\TH:i:s.u') . $offsetStr;
        return $dateStr;
    }
}

?>
