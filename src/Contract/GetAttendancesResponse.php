<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class GetAttendancesResponse {
    /** @var \EcEnglish\ApiClient\Contract\Attendance[] */
    public $Attendances;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new GetAttendancesResponse();
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        if ($obj->Attendances !== NULL) {
            $tmpArray0 = array();
            $arrayIndex0 = 0;
            foreach ($obj->Attendances as $arrayItem0) {
                if ($arrayItem0 !== NULL) {
                    $tmpArray0[$arrayIndex0] = Attendance::Serialize($arrayItem0);
                }
                else {
                    $tmpArray0[$arrayIndex0] = NULL;
                }
                ++$arrayIndex0;
            }
            $dto->Attendances = $tmpArray0;
        }
        else {
            $dto->Attendances = NULL;
        }
        return $dto;
    }
}
?>
