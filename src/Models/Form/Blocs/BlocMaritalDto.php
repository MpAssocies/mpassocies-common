<?php


namespace MpAssocies\Models\Form\Blocs;


class BlocMaritalDto extends BlocDto{

    /**
     * @param array $array
     * @return BlocMaritalDto
     */
    public static function deserializeBloc(array $array)
    {
        $blocMarital = new BlocMaritalDto();
        $blocMarital->fillGenericData($array);
        return $blocMarital;
    }
}