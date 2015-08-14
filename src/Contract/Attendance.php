<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class Attendance {
    /** @var int */
    public $BookingId;
    /** @var int */
    public $StudentId;
    /** @var int */
    public $TotalLessons;
    /** @var int */
    public $LessonsToDate;
    /** @var int */
    public $LessonsToDateAbsent;
    /** @var int */
    public $TotalLessonMinutes;
    /** @var int */
    public $LessonMinutesToDate;
    /** @var int */
    public $LessonMinutesToDateAbsent;
    /** @var boolean */
    public $IsDeleted;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new Attendance();
        $obj->BookingId = Primitives::ReadInt($dto->BookingId);
        $obj->StudentId = Primitives::ReadInt($dto->StudentId);
        $obj->TotalLessons = Primitives::ReadInt($dto->TotalLessons);
        $obj->LessonsToDate = Primitives::ReadInt($dto->LessonsToDate);
        $obj->LessonsToDateAbsent = Primitives::ReadInt($dto->LessonsToDateAbsent);
        $obj->TotalLessonMinutes = Primitives::ReadInt($dto->TotalLessonMinutes);
        $obj->LessonMinutesToDate = Primitives::ReadInt($dto->LessonMinutesToDate);
        $obj->LessonMinutesToDateAbsent = Primitives::ReadInt($dto->LessonMinutesToDateAbsent);
        $obj->IsDeleted = Primitives::ReadBoolean($dto->IsDeleted);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->BookingId = Primitives::WriteInt($obj->BookingId);
        $dto->StudentId = Primitives::WriteInt($obj->StudentId);
        $dto->TotalLessons = Primitives::WriteInt($obj->TotalLessons);
        $dto->LessonsToDate = Primitives::WriteInt($obj->LessonsToDate);
        $dto->LessonsToDateAbsent = Primitives::WriteInt($obj->LessonsToDateAbsent);
        $dto->TotalLessonMinutes = Primitives::WriteInt($obj->TotalLessonMinutes);
        $dto->LessonMinutesToDate = Primitives::WriteInt($obj->LessonMinutesToDate);
        $dto->LessonMinutesToDateAbsent = Primitives::WriteInt($obj->LessonMinutesToDateAbsent);
        $dto->IsDeleted = Primitives::WriteBoolean($obj->IsDeleted);
        return $dto;
    }
}
?>
