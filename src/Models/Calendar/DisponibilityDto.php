<?php
namespace MpAssocies\Models\Calendar;

use Exception;

class DisponibilityDto extends EventDto
{

    /**
     * @param array $array
     * @return DisponibilityDto
     * @throws Exception
     */
    public static function deserialize(array $array){
        $dispo = new DisponibilityDto();
        $dispo->fillGenericEventDto($array);
        return $dispo;
    }
}