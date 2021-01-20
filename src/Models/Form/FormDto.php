<?php


namespace MpAssocies\Models\Form;


use DateTimeImmutable;
use Exception;
use MpAssocies\Exception\DtoDeserializationException;

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

    /**
     * @param array $array
     * @return FormDto
     * @throws DtoDeserializationException
     * @throws Exception
     */
    public static function deserialize(array $array)
    {
        $sheets = [];
        foreach ($array['sheets'] as $arraySheet){
            $sheets[] = SheetDto::deserialize($arraySheet);
        }

        $form = new FormDto();
        $form->id = $array['id'];
        $form->name = $array['name'];
        $form->createdAt = new DateTimeImmutable($array['createdAt']);
        $form->updatedAt = new DateTimeImmutable($array['updatedAt']);
        $form->sheets = $sheets;
        return $form;
    }
}