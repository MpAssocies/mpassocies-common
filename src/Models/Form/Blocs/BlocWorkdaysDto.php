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
}