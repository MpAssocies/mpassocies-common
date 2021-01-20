<?php


namespace MpAssocies\Models\Form\Blocs;


use Exception;

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

    /**
     * @param array $array
     * @return CheckboxDto
     * @throws Exception
     */
    public static function deserializeBloc(array $array)
    {
        $items = [];
        foreach ($array['items'] as $arrayItem){
            $items[] = CheckboxItemDto::deserialize($arrayItem);
        }

        $checkbox = new CheckboxDto();
        $checkbox->fillGenericData($array);
        $checkbox->label = $array['label'];
        $checkbox->name = $array['name'];
        $checkbox->unique = $array['unique'];
        $checkbox->required = $array['required'];
        $checkbox->items = $items;
        return $checkbox;
    }
}