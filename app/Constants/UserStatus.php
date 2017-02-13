<?php

namespace App\Constants;


interface UserStatus
{
    const ACTIVATED     = "activated";
    const DEACTIVATED   = "deactivated";
    const SUSPEND       = "suspend";
    const DELETED       = "deleted";
}