<?php


namespace MpAssocies\Models\Form\Submission;


use DateTimeImmutable;
use Exception;
use MpAssocies\Models\StringUtils;

class SubmissionDto
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var BlocDataDto[]
     */
    public $blocData;

    /**
     * @var string
     */
    public $userId;

    /**
     * @var integer
     */
    public $formId;

    /**
     * @var DateTimeImmutable
     */
    public $createdAt;

    /**
     * @var DateTimeImmutable
     */
    public $updatedAt;

    /**
     * @return array
     */
    public function serialize()
    {
        $arrayBlocData = [];
        foreach ($this->blocData as $bloc){
            $arrayBlocData[] = $bloc->serialize();
        }

        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'formId' => $this->formId,
            'createdAt' => $this->createdAt->format(StringUtils::DATE_FORMAT),
            'updatedAt' => $this->updatedAt->format(StringUtils::DATE_FORMAT),
            'blocData' => $arrayBlocData,
        ];
    }

    /**
     * @param array $array
     * @return SubmissionDto
     * @throws Exception
     */
    public static function deserialize(array $array)
    {
        $blocs = [];
        foreach ($array['blocData'] as $blocDatum) {
            BlocDataDto::deserialize($blocDatum);
        }

        $submission = new SubmissionDto();
        $submission->id = $array['id'];
        $submission->userId = $array['userId'];
        $submission->formId = $array['formId'];
        $submission->createdAt = new DateTimeImmutable($array['createdAt']);
        $submission->updatedAt = new DateTimeImmutable($array['updatedAt']);
        $submission->blocData = $blocs;
        return $submission;
    }
}