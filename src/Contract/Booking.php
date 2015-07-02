<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class Booking {
    /** @var int */
    public $CentreId;
    /** @var string|null */
    public $CentreName;
    /** @var int */
    public $SchoolId;
    /** @var string|null */
    public $SchoolName;
    /** @var \DateTime */
    public $StartDate;
    /** @var \DateTime */
    public $EndDate;
    /** @var boolean */
    public $HasArrived;
    /** @var \EcEnglish\ApiClient\Contract\ClassAssignment[] */
    public $Classes;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new Booking();
        $obj->CentreId = Primitives::ReadInt($dto->CentreId);
        $obj->CentreName = Primitives::ReadString($dto->CentreName);
        $obj->SchoolId = Primitives::ReadInt($dto->SchoolId);
        $obj->SchoolName = Primitives::ReadString($dto->SchoolName);
        $obj->StartDate = Primitives::ReadLocalDate($dto->StartDate);
        $obj->EndDate = Primitives::ReadLocalDate($dto->EndDate);
        $obj->HasArrived = Primitives::ReadBoolean($dto->HasArrived);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->CentreId = Primitives::WriteInt($obj->CentreId);
        $dto->CentreName = Primitives::WriteString($obj->CentreName);
        $dto->SchoolId = Primitives::WriteInt($obj->SchoolId);
        $dto->SchoolName = Primitives::WriteString($obj->SchoolName);
        $dto->StartDate = Primitives::WriteLocalDate($obj->StartDate);
        $dto->EndDate = Primitives::WriteLocalDate($obj->EndDate);
        $dto->HasArrived = Primitives::WriteBoolean($obj->HasArrived);
        if ($obj->Classes !== NULL) {
            $tmpArray0 = array();
            $arrayIndex0 = 0;
            foreach ($obj->Classes as $arrayItem0) {
                if ($arrayItem0 !== NULL) {
                    $tmpArray0[$arrayIndex0] = ClassAssignment::Serialize($arrayItem0);
                }
                else {
                    $tmpArray0[$arrayIndex0] = NULL;
                }
                ++$arrayIndex0;
            }
            $dto->Classes = $tmpArray0;
        }
        else {
            $dto->Classes = NULL;
        }
        return $dto;
    }
}
?>
