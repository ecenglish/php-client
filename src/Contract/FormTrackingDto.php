<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class FormTrackingDto {
    /** @var string|null */
    public $IpAddress;
    /** @var string|null */
    public $PageUrl;
    /** @var string|null */
    public $PageName;
    /** @var string|null */
    public $HubpotTrackingCode;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new FormTrackingDto();
        $obj->IpAddress = Primitives::ReadString($dto->IpAddress);
        $obj->PageUrl = Primitives::ReadString($dto->PageUrl);
        $obj->PageName = Primitives::ReadString($dto->PageName);
        $obj->HubpotTrackingCode = Primitives::ReadString($dto->HubpotTrackingCode);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->IpAddress = Primitives::WriteString($obj->IpAddress);
        $dto->PageUrl = Primitives::WriteString($obj->PageUrl);
        $dto->PageName = Primitives::WriteString($obj->PageName);
        $dto->HubpotTrackingCode = Primitives::WriteString($obj->HubpotTrackingCode);
        return $dto;
    }
}
?>
