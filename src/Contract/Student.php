<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class Student {
    /** @var int */
    public $Id;
    /** @var string|null */
    public $FirstName;
    /** @var string|null */
    public $LastName;
    /** @var string|null */
    public $EmailAddress;
    /** @var \DateTime|null */
    public $DateOfBirth;
    /** @var int|null */
    public $NationalityId;
    /** @var string|null */
    public $NationalityName;
    /** @var boolean */
    public $IsDeleted;
    /** @var \EcEnglish\ApiClient\Contract\Booking[] */
    public $Bookings;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new Student();
        $obj->Id = Primitives::ReadInt($dto->Id);
        $obj->FirstName = Primitives::ReadString($dto->FirstName);
        $obj->LastName = Primitives::ReadString($dto->LastName);
        $obj->EmailAddress = Primitives::ReadString($dto->EmailAddress);
        $obj->DateOfBirth = Primitives::ReadLocalDate($dto->DateOfBirth);
        $obj->NationalityId = Primitives::ReadInt($dto->NationalityId);
        $obj->NationalityName = Primitives::ReadString($dto->NationalityName);
        $obj->IsDeleted = Primitives::ReadBoolean($dto->IsDeleted);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->Id = Primitives::WriteInt($obj->Id);
        $dto->FirstName = Primitives::WriteString($obj->FirstName);
        $dto->LastName = Primitives::WriteString($obj->LastName);
        $dto->EmailAddress = Primitives::WriteString($obj->EmailAddress);
        $dto->DateOfBirth = Primitives::WriteLocalDate($obj->DateOfBirth);
        $dto->NationalityId = Primitives::WriteInt($obj->NationalityId);
        $dto->NationalityName = Primitives::WriteString($obj->NationalityName);
        $dto->IsDeleted = Primitives::WriteBoolean($obj->IsDeleted);
        if ($obj->Bookings !== NULL) {
            $tmpArray0 = array();
            $arrayIndex0 = 0;
            foreach ($obj->Bookings as $arrayItem0) {
                if ($arrayItem0 !== NULL) {
                    $tmpArray0[$arrayIndex0] = Booking::Serialize($arrayItem0);
                }
                else {
                    $tmpArray0[$arrayIndex0] = NULL;
                }
                ++$arrayIndex0;
            }
            $dto->Bookings = $tmpArray0;
        }
        else {
            $dto->Bookings = NULL;
        }
        return $dto;
    }
}
?>
