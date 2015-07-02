<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class StudentDetails {
    /** @var int */
    public $Id;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new StudentDetails();
        $obj->Id = Primitives::ReadInt($dto->Id);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->Id = Primitives::WriteInt($obj->Id);
        return $dto;
    }
}
?>
