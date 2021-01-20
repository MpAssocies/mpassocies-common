<?php


namespace MpAssocies\Models\Form\Blocs;


class CheckboxDto extends BlocDto
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
     * @var boolean
     */
    public $unique;

    /**
     * @var boolean
     */
    public $required;

    /**
     * @var CheckboxItemDto[]
     */
    public $items;

    public function serialize()
    {
        $itemArray = [];
        foreach ($this->items as $item){
            $itemArray[] = $item->serialize();
        }

        return array_merge(parent::serialize(), [
            'label' => $this->label,
            'name' => $this->name,
            'unique' => $this->unique,
            'required' => $this->required,
            'items' => $itemArray,
        ]);
    }
}