<?php


namespace MpAssocies\Models\Form\Blocs;


use DateTimeImmutable;
use Exception;

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

    /**
     * @param array $array
     * @return ColumnDto
     * @throws Exception
     */
    public static function deserialize(array $array)
    {
        $column = new ColumnDto();
        $column->id = $array['id'];
        $column->name = $array['name'];
        $column->arrayId = $array['arrayId'];
        $column->position = $array['position'];
        $column->createdAt = new DateTimeImmutable($array['createdAt']);
        $column->updatedAt = new DateTimeImmutable($array['updatedAt']);
        return $column;
    }
}