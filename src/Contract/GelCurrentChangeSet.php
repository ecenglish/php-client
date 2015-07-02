<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class GelCurrentChangeSet {

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new GelCurrentChangeSet();
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        return $dto;
    }

    /** @internal */
    public function _EcInternal_Serialize() {
        return GelCurrentChangeSet::Serialize($this);
    }

    /** @internal */
    public function _EcInternal_DeserializeResponse($dto) {
        return ChangeSet::Deserialize($dto);
    }

    /** @internal */
    public function _EcInternal_GetUrl() {
        return '/json/reply/GelCurrentChangeSet';
    }
}
?>
