<?php


namespace MpAssocies\Models\Auth;


use MyCLabs\Enum\Enum;

class UserStatus extends Enum
{
    const ACTIVE = "ACTIVE";
    const PENDING = "PENDING";
    const DELETED = "DELETED";
}