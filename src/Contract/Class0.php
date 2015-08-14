<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class Class0 {
    /** @var int */
    public $Id;
    /** @var string|null */
    public $Name;
    /** @var string|null */
    public $ClassLevel;
    /** @var string|null */
    public $ClassType;
    /** @var \DateTime|null */
    public $StartDate;
    /** @var \DateTime|null */
    public $EndDate;
    /** @var boolean */
    public $IsDeleted;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new Class0();
        $obj->Id = Primitives::ReadInt($dto->Id);
        $obj->Name = Primitives::ReadString($dto->Name);
        $obj->ClassLevel = Primitives::ReadString($dto->ClassLevel);
        $obj->ClassType = Primitives::ReadString($dto->ClassType);
        $obj->StartDate = Primitives::ReadLocalDate($dto->StartDate);
        $obj->EndDate = Primitives::ReadLocalDate($dto->EndDate);
        $obj->IsDeleted = Primitives::ReadBoolean($dto->IsDeleted);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->Id = Primitives::WriteInt($obj->Id);
        $dto->Name = Primitives::WriteString($obj->Name);
        $dto->ClassLevel = Primitives::WriteString($obj->ClassLevel);
        $dto->ClassType = Primitives::WriteString($obj->ClassType);
        $dto->StartDate = Primitives::WriteLocalDate($obj->StartDate);
        $dto->EndDate = Primitives::WriteLocalDate($obj->EndDate);
        $dto->IsDeleted = Primitives::WriteBoolean($obj->IsDeleted);
        return $dto;
    }
}
?>
