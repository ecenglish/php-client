<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class ClassAssignment {
    /** @var int */
    public $ClassId;
    /** @var \DateTime */
    public $StartDate;
    /** @var \DateTime */
    public $EndDate;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new ClassAssignment();
        $obj->ClassId = Primitives::ReadInt($dto->ClassId);
        $obj->StartDate = Primitives::ReadLocalDate($dto->StartDate);
        $obj->EndDate = Primitives::ReadLocalDate($dto->EndDate);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->ClassId = Primitives::WriteInt($obj->ClassId);
        $dto->StartDate = Primitives::WriteLocalDate($obj->StartDate);
        $dto->EndDate = Primitives::WriteLocalDate($obj->EndDate);
        return $dto;
    }
}
?>
