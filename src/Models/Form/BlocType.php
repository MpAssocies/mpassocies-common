<?php


namespace MpAssocies\Models\Form;


use MyCLabs\Enum\Enum;

class BlocType extends Enum
{
    const TITLE = 'TITLE';
    const BLOC_INPUT = 'BLOC_INPUT';
    const CALENDAR = 'CALENDAR';
    const BLOC_MARITAL = 'BLOC_MARITAL';
    const BLOC_ARRAY = 'BLOC_ARRAY';
    const BLOC_WORKDAYS = 'BLOC_WORKDAYS';
    const CHECKBOX = 'CHECKBOX';
}