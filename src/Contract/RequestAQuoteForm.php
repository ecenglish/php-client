<?php
namespace EcEnglish\ApiClient\Contract;

use EcEnglish\ApiClient\Primitives as Primitives;

class RequestAQuoteForm {
    /** @var string|null */
    public $Locale;
    /** @var string|null */
    public $FirstName;
    /** @var string|null */
    public $LastName;
    /** @var string|null */
    public $Gender;
    /** @var \DateTime|null */
    public $DateOfBirth;
    /** @var string|null */
    public $Nationality;
    /** @var string|null */
    public $CountryOfResidence;
    /** @var string|null */
    public $LevelOfEnglish;
    /** @var string|null */
    public $Email;
    /** @var string|null */
    public $PhoneNumber;
    /** @var string|null */
    public $HowDidYouHearAboutUs;
    /** @var string|null */
    public $PreferredCentre;
    /** @var string|null */
    public $Course;
    /** @var \DateTime|null */
    public $CourseStartDate;
    /** @var int|null */
    public $LessonsPerWeek;
    /** @var int|null */
    public $CourseNumberOfWeeks;
    /** @var string|null */
    public $Accommodation;
    /** @var string|null */
    public $AccommodationRoomOption;
    /** @var string|null */
    public $AccommodationCateringOption;
    /** @var string|null */
    public $AccommodationBathroomOption;
    /** @var string|null */
    public $AccommodationMiscOption;
    /** @var int|null */
    public $AccommodationNumberOfWeeks;
    /** @var string|null[] */
    public $Extras;
    /** @var string|null */
    public $Message;
    /** @var string|null */
    public $SpecialRequirements;
    /** @var boolean */
    public $AcceptsTerms;
    /** @var \EcEnglish\ApiClient\Contract\FormTrackingDto|null */
    public $Tracking;

    public static function Deserialize($dto) {
        if ($dto === NULL) {
            return NULL;
        }
        $obj = new RequestAQuoteForm();
        $obj->Locale = Primitives::ReadString($dto->Locale);
        $obj->FirstName = Primitives::ReadString($dto->FirstName);
        $obj->LastName = Primitives::ReadString($dto->LastName);
        $obj->Gender = Primitives::ReadString($dto->Gender);
        $obj->DateOfBirth = Primitives::ReadLocalDate($dto->DateOfBirth);
        $obj->Nationality = Primitives::ReadString($dto->Nationality);
        $obj->CountryOfResidence = Primitives::ReadString($dto->CountryOfResidence);
        $obj->LevelOfEnglish = Primitives::ReadString($dto->LevelOfEnglish);
        $obj->Email = Primitives::ReadString($dto->Email);
        $obj->PhoneNumber = Primitives::ReadString($dto->PhoneNumber);
        $obj->HowDidYouHearAboutUs = Primitives::ReadString($dto->HowDidYouHearAboutUs);
        $obj->PreferredCentre = Primitives::ReadString($dto->PreferredCentre);
        $obj->Course = Primitives::ReadString($dto->Course);
        $obj->CourseStartDate = Primitives::ReadLocalDate($dto->CourseStartDate);
        $obj->LessonsPerWeek = Primitives::ReadInt($dto->LessonsPerWeek);
        $obj->CourseNumberOfWeeks = Primitives::ReadInt($dto->CourseNumberOfWeeks);
        $obj->Accommodation = Primitives::ReadString($dto->Accommodation);
        $obj->AccommodationRoomOption = Primitives::ReadString($dto->AccommodationRoomOption);
        $obj->AccommodationCateringOption = Primitives::ReadString($dto->AccommodationCateringOption);
        $obj->AccommodationBathroomOption = Primitives::ReadString($dto->AccommodationBathroomOption);
        $obj->AccommodationMiscOption = Primitives::ReadString($dto->AccommodationMiscOption);
        $obj->AccommodationNumberOfWeeks = Primitives::ReadInt($dto->AccommodationNumberOfWeeks);
        $obj->Message = Primitives::ReadString($dto->Message);
        $obj->SpecialRequirements = Primitives::ReadString($dto->SpecialRequirements);
        $obj->AcceptsTerms = Primitives::ReadBoolean($dto->AcceptsTerms);
        $obj->Tracking = FormTrackingDto::Deserialize($dto->Tracking);
        return $obj;
    }

    public static function Serialize($obj) {
        $dto = new \stdClass();
        $dto->Locale = Primitives::WriteString($obj->Locale);
        $dto->FirstName = Primitives::WriteString($obj->FirstName);
        $dto->LastName = Primitives::WriteString($obj->LastName);
        $dto->Gender = Primitives::WriteString($obj->Gender);
        $dto->DateOfBirth = Primitives::WriteLocalDate($obj->DateOfBirth);
        $dto->Nationality = Primitives::WriteString($obj->Nationality);
        $dto->CountryOfResidence = Primitives::WriteString($obj->CountryOfResidence);
        $dto->LevelOfEnglish = Primitives::WriteString($obj->LevelOfEnglish);
        $dto->Email = Primitives::WriteString($obj->Email);
        $dto->PhoneNumber = Primitives::WriteString($obj->PhoneNumber);
        $dto->HowDidYouHearAboutUs = Primitives::WriteString($obj->HowDidYouHearAboutUs);
        $dto->PreferredCentre = Primitives::WriteString($obj->PreferredCentre);
        $dto->Course = Primitives::WriteString($obj->Course);
        $dto->CourseStartDate = Primitives::WriteLocalDate($obj->CourseStartDate);
        $dto->LessonsPerWeek = Primitives::WriteInt($obj->LessonsPerWeek);
        $dto->CourseNumberOfWeeks = Primitives::WriteInt($obj->CourseNumberOfWeeks);
        $dto->Accommodation = Primitives::WriteString($obj->Accommodation);
        $dto->AccommodationRoomOption = Primitives::WriteString($obj->AccommodationRoomOption);
        $dto->AccommodationCateringOption = Primitives::WriteString($obj->AccommodationCateringOption);
        $dto->AccommodationBathroomOption = Primitives::WriteString($obj->AccommodationBathroomOption);
        $dto->AccommodationMiscOption = Primitives::WriteString($obj->AccommodationMiscOption);
        $dto->AccommodationNumberOfWeeks = Primitives::WriteInt($obj->AccommodationNumberOfWeeks);
        if ($obj->Extras !== NULL) {
            $tmpArray0 = array();
            $arrayIndex0 = 0;
            foreach ($obj->Extras as $arrayItem0) {
                $tmpArray0[$arrayIndex0] = Primitives::WriteString($arrayItem0);
                ++$arrayIndex0;
            }
            $dto->Extras = $tmpArray0;
        }
        else {
            $dto->Extras = NULL;
        }
        $dto->Message = Primitives::WriteString($obj->Message);
        $dto->SpecialRequirements = Primitives::WriteString($obj->SpecialRequirements);
        $dto->AcceptsTerms = Primitives::WriteBoolean($obj->AcceptsTerms);
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
        return RequestAQuoteForm::Serialize($this);
    }

    /** @internal */
    public function _EcInternal_DeserializeResponse($dto) {
    }

    /** @internal */
    public function _EcInternal_GetUrl() {
        return '/json/oneway/RequestAQuoteForm';
    }
}
?>
