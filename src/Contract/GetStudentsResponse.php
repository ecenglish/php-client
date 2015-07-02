<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class GetStudentsResponse {
    /** @var \EcEnglish\ApiClient\Contract\Student[] */
    public $Students;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new GetStudentsResponse();
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        if ($obj->Students !== NULL) {
            $tmpArray0 = array();
            $arrayIndex0 = 0;
            foreach ($obj->Students as $arrayItem0) {
                if ($arrayItem0 !== NULL) {
                    $tmpArray0[$arrayIndex0] = Student::Serialize($arrayItem0);
                }
                else {
                    $tmpArray0[$arrayIndex0] = NULL;
                }
                ++$arrayIndex0;
            }
            $dto->Students = $tmpArray0;
        }
        else {
            $dto->Students = NULL;
        }
        return $dto;
    }
}
?>
