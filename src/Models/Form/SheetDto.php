<?php


namespace MpAssocies\Models\Form;


use DateTimeImmutable;
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
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt
        ];
    }
}