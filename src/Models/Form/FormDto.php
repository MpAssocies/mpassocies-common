<?php


namespace MpAssocies\Models\Form;


use DateTimeImmutable;

class FormDto
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
     * @var SheetDto[]
     */
    public $sheets;

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
        $sheetArray = [];
        foreach ($this->sheets as $sheet){
            $sheetArray[] = $sheet->serialize();
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'sheets' => $sheetArray,
        ];
    }
}