<?php


namespace MpAssocies\Models\Form\Submission;


use DateTimeImmutable;

class BlocDataDto
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $blocId;

    /**
     * @var integer
     */
    public $submissionId;

    /**
     * @var array
     */
    public $content;

    /**
     * @var DateTimeImmutable
     */
    public $createdAt;

    /***
     * @var DateTimeImmutable
     */
    public $updatedAt;

    /**
     * @return array
     */
    public function serialize()
    {
        return [
            'id' => $this->id,
            'blocId' => $this->blocId,
            'submissionId' => $this->submissionId,
            'content' => $this->content,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /**
     * @param array $array
     * @return BlocDataDto
     * @throws \Exception
     */
    public static function deserialize( array $array)
    {
        $blocData = new BlocDataDto();
        $blocData->id = $array['id'];
        $blocData->blocId = $array['blocId'];
        $blocData->submissionId = $array['submissionId'];
        $blocData->content = $array['content'];
        $blocData->createdAt = new DateTimeImmutable($array['createdAt']);
        $blocData->updatedAt = new DateTimeImmutable($array['updatedAt']);
        return $blocData;
    }
}