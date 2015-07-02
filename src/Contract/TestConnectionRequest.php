<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class TestConnectionRequest {

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new TestConnectionRequest();
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        return $dto;
    }

    /** @internal */
    public function _EcInternal_Serialize() {
        return TestConnectionRequest::Serialize($this);
    }

    /** @internal */
    public function _EcInternal_DeserializeResponse($dto) {
        return TestConnectionResponse::Deserialize($dto);
    }

    /** @internal */
    public function _EcInternal_GetUrl() {
        return '/json/reply/TestConnectionRequest';
    }
}
?>
