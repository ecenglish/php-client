<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class UserDetails {
    /** @var string|null */
    public $Id;
    /** @var string|null */
    public $LastName;
    /** @var string|null */
    public $FirstName;
    /** @var string|null */
    public $Email;
    /** @var \EcEnglish\ApiClient\Contract\StudentDetails|null */
    public $StudentDetails;
    /** @var \EcEnglish\ApiClient\Contract\AgentUserDetails|null */
    public $AgentUserDetails;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new UserDetails();
        $obj->Id = Primitives::ReadString($dto->Id);
        $obj->LastName = Primitives::ReadString($dto->LastName);
        $obj->FirstName = Primitives::ReadString($dto->FirstName);
        $obj->Email = Primitives::ReadString($dto->Email);
        $obj->StudentDetails = StudentDetails::Deserialize($dto->StudentDetails);
        $obj->AgentUserDetails = AgentUserDetails::Deserialize($dto->AgentUserDetails);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->Id = Primitives::WriteString($obj->Id);
        $dto->LastName = Primitives::WriteString($obj->LastName);
        $dto->FirstName = Primitives::WriteString($obj->FirstName);
        $dto->Email = Primitives::WriteString($obj->Email);
        if ($obj->StudentDetails !== NULL) {
            $dto->StudentDetails = StudentDetails::Serialize($obj->StudentDetails);
        }
        else {
            $dto->StudentDetails = NULL;
        }
        if ($obj->AgentUserDetails !== NULL) {
            $dto->AgentUserDetails = AgentUserDetails::Serialize($obj->AgentUserDetails);
        }
        else {
            $dto->AgentUserDetails = NULL;
        }
        return $dto;
    }
}
?>
