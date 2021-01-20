<?php


namespace MpAssocies\Models\Form\Blocs;


use DateTimeImmutable;

class ColumnDto
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var integer
     */
    public $arrayId;

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

    public function serialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'arrayId' => $this->arrayId,
            'position' => $this->position,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }
}