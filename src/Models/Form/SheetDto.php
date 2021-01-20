<?php


namespace MpAssocies\Models\Form;


use DateTimeImmutable;
use Exception;
use MpAssocies\Exception\DtoDeserializationException;
use MpAssocies\Models\Form\Blocs\BlocDto;

class SheetDto
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $formId;

    /**
     * @var string
     */
    public $name;

    /**
     * @var boolean
     */
    public $clonable;

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
     * @var BlocDto[]
     */
    public $blocs;

    /**
     * @return array
     */
    public function serialize()
    {
        $arrayBlocs = [];
        foreach ($this->blocs as $bloc) {
            $arrayBlocs[] = $bloc->serialize();
        }

        return [
            'id' => $this->id,
            'formId' => $this->formId,
            'name' => $this->name,
            'clonable' => $this->clonable,
            'position' => $this->position,
            'blocs' => $arrayBlocs,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt
        ];
    }

    /**
     * @param array $array
     * @return SheetDto
     * @throws DtoDeserializationException
     * @throws Exception
     */
    public static function deserialize(array $array)
    {
        $blocs = [];
        foreach ($array['blocs'] as $arrayBloc){
            $blocs[] = BlocDto::deserialize($arrayBloc);
        }

        $sheet = new SheetDto();
        $sheet->id = $array['id'];
        $sheet->formId = $array['formId'];
        $sheet->name = $array['name'];
        $sheet->clonable = $array['clonable'];
        $sheet->position = $array['position'];
        $sheet->blocs = $blocs;
        $sheet->createdAt = new DateTimeImmutable($array['createdAt']);
        $sheet->updatedAt = new DateTimeImmutable($array['updatedAt']);
        return $sheet;
    }
}