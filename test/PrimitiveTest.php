<?php

use EcEnglish\ApiClient\Primitives as Primitives;

class SerializationTests extends PHPUnit_Framework_TestCase {
    /** @expectedException Exception */
    public function testErrorOnInvalidInstant() {
        $instant = Primitives::ReadLocalDate('20150630aT10:24:43.4979533Z');
        print_r($instant);
    }

    public function testCanReadInstant() {
        $instant = Primitives::ReadInstant('2015-06-30T10:24:43.4979533Z');
        $this->assertEquals('2015-06-30 10:24:43.497953', $instant->format('Y-m-d H:i:s.u'));
    }

    public function testCanWriteDateTimeInstant() {
        $instant = new DateTime('2015-06-30 10:24:43', new DateTimeZone('Europe/London'));
        $instantWritten = Primitives::WriteInstant($instant);
        $this->assertEquals('2015-06-30T09:24:43.000000Z', $instantWritten);
    }

    public function testCanWriteTimestampInstant() {
        $integerValue = 1435661461;
        $instantWritten = Primitives::WriteInstant($integerValue);
        $this->assertEquals('2015-06-30T10:51:01.000000Z', $instantWritten);
    }

    public function testCanReadLocalDate() {
        $localDate = '2015-02-09';
        $readDate = Primitives::ReadLocalDate($localDate);
        $this->assertEquals('2015-02-09', $readDate->format('Y-m-d'));
    }

    public function testCanWriteLocalDate() {
        $localDate = new DateTime('2015-02-09', new DateTimeZone('Etc/UTC'));
        $written = Primitives::WriteLocalDate($localDate);
        $this->assertEquals('2015-02-09', $written);
    }

    public function testCanWriteLocalDateFromTimestamp() {
        $integerValue = 1435661460;
        $written = Primitives::WriteLocalDate($integerValue);
        $this->assertEquals('2015-06-30', $written);
    }

    public function testCanReadLocalTime() {
        $localTime = '14:33:21.4979577';
        $read = Primitives::ReadLocalTime($localTime);
        $this->assertEquals('14:33:21.497957', $read->format('H:i:s.u'));
    }

    public function testCanWriteLocalTime() {
        $localTime = new DateTime('1970-01-01 13:12:11.987654', new DateTimeZone('Etc/UTC'));
        $written = Primitives::WriteLocalTime($localTime);
        $this->assertEquals('13:12:11.987654', $written);
    }

    public function testCanWriteLocalTimeAsInteger() {
        $timestamp = 1435661461;
        $written = Primitives::WriteLocalTime($timestamp);
        $this->assertEquals('10:51:01.000000', $written);
    }

    public function testCanReadLocalDateTime() {
        $localDateTime = '2015-06-30T13:24:43.4979577';
        $read = Primitives::ReadLocalDateTime($localDateTime);
        $this->assertEquals('2015-06-30 13:24:43.497957', $read->format('Y-m-d H:i:s.u'));
    }

    public function testCanWriteLocalDateTime() {
        $localDateTime = new DateTime('2014-03-12 13:21:32.987654', new DateTimeZone('Etc/UTC'));
        $written = Primitives::WriteLocalDateTime($localDateTime);
        $this->assertEquals('2014-03-12T13:21:32.987654', $written);
    }

    public function testCanWriteLocalDateTimeFromInteger() {
        $localDateTime = new DateTime('2014-03-12 13:21:32.987654', new DateTimeZone('Etc/UTC'));
        $written = Primitives::WriteLocalDateTime($localDateTime);
        $this->assertEquals('2014-03-12T13:21:32.987654', $written);
    }

    public function testCanReadBoolean() {
        $trueRead = Primitives::ReadBoolean(true);
        $falseRead = Primitives::ReadBoolean(0);
        $this->assertEquals(true, $trueRead);
        $this->assertEquals(false, $falseRead);
    }

    public function testCanWriteBoolean() {
        $trueRead = Primitives::WriteBoolean(true);
        $falseRead = Primitives::WriteBoolean(0);
        $this->assertEquals(true, $trueRead);
        $this->assertEquals(false, $falseRead);
    }

    public function testCanReadInt() {
        $intRead = Primitives::ReadInt('33');
        $this->assertEquals(33, $intRead);
    }

    public function testCanReadZonedDateTime() {
        $read = Primitives::ReadZonedDateTime('2015-06-30T13:56:19.6490785+01 Europe/London');
        $this->assertEquals('Europe/London', $read->getTimezone()->getName());
        $this->assertEquals('2015-06-30 13:56:19.649078', $read->format('Y-m-d H:i:s.u'));
    }

    public function testCanWriteZonedDateTime() {
        $date = new DateTime('2015-06-30 13:56:19.987654', new DateTimeZone('Europe/London'));
        $written = Primitives::WriteZonedDateTime($date);
        $this->assertEquals('2015-06-30T13:56:19.987654+01 Europe/London', $written);
    }

    public function testCanReadOffsetDateTime() {
        $str = '2015-01-02T13:22:11.987654+03';
        $read = Primitives::ReadOffsetDateTime($str);
        $this->assertEquals('2015-01-02 13:22:11.987654', $read->date->format('Y-m-d H:i:s.u'));
        $this->assertEquals(60 * 60 * 3, $read->offsetSeconds);
    }

    public function testCanWiteOffsetDateTime() {
        $dateTime = new \EcEnglish\ApiClient\OffsetDateTime(
            3600,
            new DateTime('2015-03-02 13:22:33.876543', new \DateTimeZone('Etc/UTC'))
        );
        $written = Primitives::WriteOffsetDateTime($dateTime);
        $this->assertEquals('2015-03-02T13:22:33.876543+01', $written);
    }

}

?>
