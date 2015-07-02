<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class GetTeachersResponse {
    /** @var \EcEnglish\ApiClient\Contract\Teacher[] */
    public $Teachers;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new GetTeachersResponse();
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        if ($obj->Teachers !== NULL) {
            $tmpArray0 = array();
            $arrayIndex0 = 0;
            foreach ($obj->Teachers as $arrayItem0) {
                if ($arrayItem0 !== NULL) {
                    $tmpArray0[$arrayIndex0] = Teacher::Serialize($arrayItem0);
                }
                else {
                    $tmpArray0[$arrayIndex0] = NULL;
                }
                ++$arrayIndex0;
            }
            $dto->Teachers = $tmpArray0;
        }
        else {
            $dto->Teachers = NULL;
        }
        return $dto;
    }
}
?>
