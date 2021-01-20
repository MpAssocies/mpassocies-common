<?php


namespace MpAssocies\Models\Form\Blocs;


class BlocCalendarDto extends BlocDto {

    /**
     * @param array $array
     * @return BlocCalendarDto
     */
    public static function deserializeBloc(array $array)
    {
        $blocCalendar = new BlocCalendarDto();
        $blocCalendar->fillGenericData($array);
        return $blocCalendar;
    }
}