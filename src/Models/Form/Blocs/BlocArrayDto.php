<?php


namespace MpAssocies\Models\Form\Blocs;


class BlocArrayDto extends BlocDto
{
    /**
     * @var ColumnDto[]
     */
    public $columns;

    /**
     * @var string
     */
    public $prefix;

    public function serialize()
    {
        $columnsArray = [];
        foreach ($this->columns as $column){
            $columnsArray[] = $column->serialize();
        }
        return array_merge(parent::serialize(), [
            'prefix' => $this->prefix,
            'columns' => $columnsArray,
        ]);
    }
}