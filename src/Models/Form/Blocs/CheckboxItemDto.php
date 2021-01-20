<?php


namespace MpAssocies\Models\Form\Blocs;


use DateTimeImmutable;
use Exception;

class CheckboxItemDto
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $label;

    /**
     * @var integer
     */
    public $checkboxId;

    /**
     * @var integer
     */
    public $position;

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
        return [
            'id' => $this->id,
            'label' => $this->label,
            'checkboxId' => $this->checkboxId,
            'position' => $this->position,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /**
     * @param $array
     * @return CheckboxItemDto
     * @throws Exception
     */
    public static function deserialize($array)
    {
        $item = new CheckboxItemDto();
        $item->id = $array['id'];
        $item->label = $array['label'];
        $item->checkboxId = $array['checkboxId'];
        $item->position = $array['position'];
        $item->createdAt = new DateTimeImmutable($array['createdAt']);
        $item->updatedAt = new DateTimeImmutable($array['updatedAt']);
        return $item;
    }
}