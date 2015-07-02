<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class Logout {

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new Logout();
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        return $dto;
    }

    /** @internal */
    public function _EcInternal_Serialize() {
        return Logout::Serialize($this);
    }

    /** @internal */
    public function _EcInternal_DeserializeResponse($dto) {
    }

    /** @internal */
    public function _EcInternal_GetUrl() {
        return '/json/oneway/Logout';
    }
}
?>
