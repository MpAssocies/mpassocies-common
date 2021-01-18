<?php


namespace MpAssocies\Models\Auth;


use MyCLabs\Enum\Enum;

class UserProfile extends Enum
{
    const ADMIN = "ADMIN";
    const EMPLOYEE = "EMPLOYEE";
    const EMPLOYER = "EMPLOYER";
}