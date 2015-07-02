<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class TestConnectionResponse {
    /** @var string|null */
    public $Message;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new TestConnectionResponse();
        $obj->Message = Primitives::ReadString($dto->Message);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->Message = Primitives::WriteString($obj->Message);
        return $dto;
    }
}
?>
