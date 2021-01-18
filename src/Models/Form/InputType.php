<?php


namespace MpAssocies\Models\Form;


use MyCLabs\Enum\Enum;

class InputType extends Enum
{
    const TEXT = "text";
    const NUMBER = "number";
    const DATE = "date";
    const TIME = "time";
    const MAIL = "mail";
    const FILE = "file";
}