<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class AskAQuestionForm {
    /** @var string|null */
    public $FirstName;
    /** @var string|null */
    public $LastName;
    /** @var string|null */
    public $Email;
    /** @var string|null */
    public $PhoneNumber;
    /** @var string|null */
    public $Nationality;
    /** @var string|null */
    public $Course;
    /** @var string|null */
    public $HowDidYouHearAboutUs;
    /** @var string|null */
    public $Message;
    /** @var string|null */
    public $Locale;
    /** @var \EcEnglish\ApiClient\Contract\FormTrackingDto|null */
    public $Tracking;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new AskAQuestionForm();
        $obj->FirstName = Primitives::ReadString($dto->FirstName);
        $obj->LastName = Primitives::ReadString($dto->LastName);
        $obj->Email = Primitives::ReadString($dto->Email);
        $obj->PhoneNumber = Primitives::ReadString($dto->PhoneNumber);
        $obj->Nationality = Primitives::ReadString($dto->Nationality);
        $obj->Course = Primitives::ReadString($dto->Course);
        $obj->HowDidYouHearAboutUs = Primitives::ReadString($dto->HowDidYouHearAboutUs);
        $obj->Message = Primitives::ReadString($dto->Message);
        $obj->Locale = Primitives::ReadString($dto->Locale);
        $obj->Tracking = FormTrackingDto::Deserialize($dto->Tracking);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->FirstName = Primitives::WriteString($obj->FirstName);
        $dto->LastName = Primitives::WriteString($obj->LastName);
        $dto->Email = Primitives::WriteString($obj->Email);
        $dto->PhoneNumber = Primitives::WriteString($obj->PhoneNumber);
        $dto->Nationality = Primitives::WriteString($obj->Nationality);
        $dto->Course = Primitives::WriteString($obj->Course);
        $dto->HowDidYouHearAboutUs = Primitives::WriteString($obj->HowDidYouHearAboutUs);
        $dto->Message = Primitives::WriteString($obj->Message);
        $dto->Locale = Primitives::WriteString($obj->Locale);
        if ($obj->Tracking !== NULL) {
            $dto->Tracking = FormTrackingDto::Serialize($obj->Tracking);
        }
        else {
            $dto->Tracking = NULL;
        }
        return $dto;
    }

    /** @internal */
    public function _EcInternal_Serialize() {
        return AskAQuestionForm::Serialize($this);
    }

    /** @internal */
    public function _EcInternal_DeserializeResponse($dto) {
    }

    /** @internal */
    public function _EcInternal_GetUrl() {
        return '/json/oneway/AskAQuestionForm';
    }
}
?>
