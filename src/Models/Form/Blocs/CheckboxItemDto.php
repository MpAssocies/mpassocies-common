<?php


namespace MpAssocies\Models\Form\Blocs;


use DateTimeImmutable;

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
}