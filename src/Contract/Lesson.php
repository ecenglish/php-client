<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class Lesson {
    /** @var int */
    public $ClassId;
    /** @var int */
    public $TeacherId;
    /** @var int */
    public $RoomId;
    /** @var string|null */
    public $RoomName;
    /** @var \DateTime */
    public $Date;
    /** @var \DateTime */
    public $StartTime;
    /** @var \DateTime */
    public $EndTime;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new Lesson();
        $obj->ClassId = Primitives::ReadInt($dto->ClassId);
        $obj->TeacherId = Primitives::ReadInt($dto->TeacherId);
        $obj->RoomId = Primitives::ReadInt($dto->RoomId);
        $obj->RoomName = Primitives::ReadString($dto->RoomName);
        $obj->Date = Primitives::ReadLocalDate($dto->Date);
        $obj->StartTime = Primitives::ReadLocalTime($dto->StartTime);
        $obj->EndTime = Primitives::ReadLocalTime($dto->EndTime);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->ClassId = Primitives::WriteInt($obj->ClassId);
        $dto->TeacherId = Primitives::WriteInt($obj->TeacherId);
        $dto->RoomId = Primitives::WriteInt($obj->RoomId);
        $dto->RoomName = Primitives::WriteString($obj->RoomName);
        $dto->Date = Primitives::WriteLocalDate($obj->Date);
        $dto->StartTime = Primitives::WriteLocalTime($obj->StartTime);
        $dto->EndTime = Primitives::WriteLocalTime($obj->EndTime);
        return $dto;
    }
}
?>
