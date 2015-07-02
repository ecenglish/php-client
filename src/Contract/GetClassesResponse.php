<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class GetClassesResponse {
    /** @var \EcEnglish\ApiClient\Contract\Class0[] */
    public $Classes;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new GetClassesResponse();
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        if ($obj->Classes !== NULL) {
            $tmpArray0 = array();
            $arrayIndex0 = 0;
            foreach ($obj->Classes as $arrayItem0) {
                if ($arrayItem0 !== NULL) {
                    $tmpArray0[$arrayIndex0] = Class0::Serialize($arrayItem0);
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
