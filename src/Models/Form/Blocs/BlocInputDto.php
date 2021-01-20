<?php


namespace MpAssocies\Models\Form\Blocs;


use MpAssocies\Models\Form\InputType;

class BlocInputDto extends BlocDto
{
    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $name;

    /**
     * @var InputType
     */
    public $inputType;

    /**
     * @var boolean
     */
    public $required;

    public function serialize()
    {
        return array_merge(parent::serialize(), [
            'label' => $this->label,
            'name' => $this->name,
            'inputType' => $this->inputType,
            'required' => $this->required,
        ]);
    }
}