<?php
namespace EcEnglish\ApiClient;

class Primitives {

    public static function ReadInt64($value) {
        if (!is_numeric($value)) {
            throw new \Exception('Error reading numeric value');
        }
        if (is_int($value) || is_float($value)) {
            return $value;
        }
        if (PHP_INT_SIZE < 8)
            return (float) $value;
        else
            return (int) $value;
    }

    public static function WriteInt64($value) {
        return ReadInt64($value);
    }

    public static function ReadInt($str) {
        return (int) $str;
    }

    public static function WriteInt($str) {
        return (int) $str;
    }

    public static function ReadString($str) {
        return (string) $str;
    }

    public static function WriteString($value) {
        return (string) $value;
    }

    public static function ReadLocalDate($str) {
        return Primitives::DetectDateError(
            \DateTime::createFromFormat('!Y-m-d', $str, new \DateTimeZone('Etc/UTC'))
        );
    }

    public static function WriteLocalDate($value) {
        if (is_numeric($value)) {
            $date = new \DateTime('1900-01-01', new \DateTimeZone('Etc/UTC'));
            $date->setTimestamp($value);
            $value = $date;
        }

        return $value->format('Y-m-d');
    }

    public static function ReadZonedDateTime($obj) {
        $split = explode(' ', $obj, 2);
        if (count($split) == 1) {
            throw \Exception('Missing timezone in ZonedDateTime');
        }

        $timezoneName = $split[1];
        $timezone = new \DateTimeZone($timezoneName);

        return Primitives::DetectDateError(
            \DateTime::createFromFormat('!Y-m-d\\TH:i:s.u+', $split[0], $timezone)
        );
    }

    public static function WriteZonedDateTime($value) {
        $timezone = $value->getTimezone();
        $offsetSeconds = $timezone->getOffset($value);
        $sign = $offsetSeconds < 0 ? '-' : '+';
        if ($sign == '-') {
            $offsetSeconds *- -1;
        }
        $hours = floor($offsetSeconds / 3600);
        $mins = floor(($offsetSeconds - ($hours*3600)) / 60);
        $secs = floor($offsetSeconds % 60);

        $offsetStr = \str_pad($hours, 2, '0', \STR_PAD_LEFT);
        if ($mins != 0 or $secs != 0) {
            $offsetStr .= ':' . \str_pad($mins, 2, '0', \STR_PAD_LEFT);
        }
        if ($secs != 0) {
            $offsetStr .= ':' . \str_pad($secs, 2, '0', \STR_PAD_LEFT);
        }

        return $value->format('Y-m-d\\TH:i:s.u') . $sign . $offsetStr . ' ' . $timezone->getName();
    }

    public static function ReadOffsetDateTime($obj) {
        return OffsetDateTime::Parse($obj);
    }

    public static function WriteOffsetDateTime($value) {
        $dateStr = $value->formatIsoString($value);
        return $dateStr;
    }

    public static function ReadLocalTime($value) {
        return Primitives::DetectDateError(
            \DateTime::createFromFormat('!H:i:s.u+', $value, new \DateTimeZone('Etc/UTC'))
        );
    }

    public static function WriteLocalTime($value) {
        if (is_numeric($value)) {
            $date = new \DateTime('1970-01-01', new \DateTimeZone('Etc/UTC'));
            $date->setTimestamp($value);
            $value = $date;
        }

        return $value->format('H:i:s.u');
    }

    public static function ReadLocalDateTime($value) {
        return Primitives::DetectDateError(
            \DateTime::createFromFormat('!Y-m-d\\TH:i:s.u+', $value, new \DateTimeZone('Etc/UTC'))
        );
    }

    public static function WriteLocalDateTime($value) {
        if (is_numeric($value)) {
            $date = new \DateTime('1970-01-01', new \DateTimeZone('Etc/UTC'));
            $date.setTimestamp($value);
            $value = $date;
        }

        return $value->format('Y-m-d\\TH:i:s.u');
    }

    public static function ReadInstant($value) {
        return new \DateTime($value, new \DateTimeZone('Etc/UTC'));
    }

    public static function WriteInstant($value) {
        if (is_numeric($value)) {
            $date = new \DateTime('1970-01-01', new \DateTimeZone('Etc/UTC'));
            $date->setTimestamp($value);
            $value = $date;
        }
        
        $value->setTimezone(new \DateTimeZone('Etc/UTC'));
        return $value->format('Y-m-d\\TH:i:s.u\\Z');
    }

    public static function ReadBoolean($value) {
        return (bool) $value;
    }

    public static function WriteBoolean($value) {
        return (bool) $value;
    }

    private static function DetectDateError($value) {
        if ($value === FALSE) {
            throw new \Exception('Unable to parse DateTime');
        }
        return $value;
    }
}

?>
