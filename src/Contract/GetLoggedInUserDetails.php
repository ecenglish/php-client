<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class GetLoggedInUserDetails {

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new GetLoggedInUserDetails();
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        return $dto;
    }

    /** @internal */
    public function _EcInternal_Serialize() {
        return GetLoggedInUserDetails::Serialize($this);
    }

    /** @internal */
    public function _EcInternal_DeserializeResponse($dto) {
        return UserDetails::Deserialize($dto);
    }

    /** @internal */
    public function _EcInternal_GetUrl() {
        return '/json/reply/GetLoggedInUserDetails';
    }
}
?>
