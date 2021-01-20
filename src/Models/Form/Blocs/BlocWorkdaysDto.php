<?php


namespace MpAssocies\Models\Form\Blocs;


class BlocWorkdaysDto extends BlocDto
{
    /**
     * @var integer
     */
    public $year;

    public function serialize()
    {
        return array_merge(parent::serialize(), [
            'year' => $this->year,
        ]);
    }

    /**
     * @param array $array
     * @return BlocWorkdaysDto
     */
    public static function deserializeBloc(array $array)
    {
        $blocWorkdays = new BlocWorkdaysDto();
        $blocWorkdays->fillGenericData($array);
        $blocWorkdays->year = $array['year'];
        return $blocWorkdays;
    }
}