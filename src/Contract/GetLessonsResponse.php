<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class GetLessonsResponse {
    /** @var \EcEnglish\ApiClient\Contract\Lesson[] */
    public $Lessons;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new GetLessonsResponse();
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        if ($obj->Lessons !== NULL) {
            $tmpArray0 = array();
            $arrayIndex0 = 0;
            foreach ($obj->Lessons as $arrayItem0) {
                if ($arrayItem0 !== NULL) {
                    $tmpArray0[$arrayIndex0] = Lesson::Serialize($arrayItem0);
                }
                else {
                    $tmpArray0[$arrayIndex0] = NULL;
                }
                ++$arrayIndex0;
            }
            $dto->Lessons = $tmpArray0;
        }
        else {
            $dto->Lessons = NULL;
        }
        return $dto;
    }
}
?>
