<?php

namespace App\Constants;


interface QuoteStatus
{
    const PENDING  = 0;
    const ACCEPTED = 1;
    const REJECTED = 2;
    const WITHDRAW = 3;
}