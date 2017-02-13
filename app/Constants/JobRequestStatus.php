<?php

namespace App\Constants;


interface JobRequestStatus
{
    const PENDING   =   'pending';
    const ACCEPTED  =   'accepted';
    const REJECTED  =   'rejected';
    const CLOSED    =   'closed';
}