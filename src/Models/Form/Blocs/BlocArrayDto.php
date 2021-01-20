<?php


namespace MpAssocies\Models\Form\Blocs;


use Exception;

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

    /**
     * @param array $array
     * @return BlocArrayDto
     * @throws Exception
     */
    public static function deserializeBloc(array $array)
    {
        $columns = [];
        foreach ($array['columns'] as $arrayColumn){
            $columns[] = ColumnDto::deserialize($arrayColumn);
        }

        $blocArray = new BlocArrayDto();
        $blocArray->fillGenericData($array);
        $blocArray->prefix = $array['prefix'];
        $blocArray->columns = $columns;
        return $blocArray;
    }
}