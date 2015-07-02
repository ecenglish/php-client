<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class Teacher {
    /** @var int */
    public $Id;
    /** @var string|null */
    public $FirstName;
    /** @var string|null */
    public $LastName;
    /** @var string|null */
    public $EmailAddress;
    /** @var int|null */
    public $CentreId;
    /** @var string|null */
    public $CentreName;
    /** @var boolean */
    public $IsDeleted;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new Teacher();
        $obj->Id = Primitives::ReadInt($dto->Id);
        $obj->FirstName = Primitives::ReadString($dto->FirstName);
        $obj->LastName = Primitives::ReadString($dto->LastName);
        $obj->EmailAddress = Primitives::ReadString($dto->EmailAddress);
        $obj->CentreId = Primitives::ReadInt($dto->CentreId);
        $obj->CentreName = Primitives::ReadString($dto->CentreName);
        $obj->IsDeleted = Primitives::ReadBoolean($dto->IsDeleted);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->Id = Primitives::WriteInt($obj->Id);
        $dto->FirstName = Primitives::WriteString($obj->FirstName);
        $dto->LastName = Primitives::WriteString($obj->LastName);
        $dto->EmailAddress = Primitives::WriteString($obj->EmailAddress);
        $dto->CentreId = Primitives::WriteInt($obj->CentreId);
        $dto->CentreName = Primitives::WriteString($obj->CentreName);
        $dto->IsDeleted = Primitives::WriteBoolean($obj->IsDeleted);
        return $dto;
    }
}
?>
