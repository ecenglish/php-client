<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class GelAttendances {
    /** @var int|null */
    public $MinChangeSet;
    /** @var int|null */
    public $MaxChangeSet;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new GelAttendances();
        $obj->MinChangeSet = Primitives::ReadInt($dto->MinChangeSet);
        $obj->MaxChangeSet = Primitives::ReadInt($dto->MaxChangeSet);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->MinChangeSet = Primitives::WriteInt($obj->MinChangeSet);
        $dto->MaxChangeSet = Primitives::WriteInt($obj->MaxChangeSet);
        return $dto;
    }

    /** @internal */
    public function _EcInternal_Serialize() {
        return GelAttendances::Serialize($this);
    }

    /** @internal */
    public function _EcInternal_DeserializeResponse($dto) {
        return GetAttendancesResponse::Deserialize($dto);
    }

    /** @internal */
    public function _EcInternal_GetUrl() {
        return '/json/reply/GelAttendances';
    }
}
?>
