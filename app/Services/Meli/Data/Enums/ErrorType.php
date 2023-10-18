<?php

namespace App\Services\Meli\Data\Enums;

enum ErrorType: string
{
    case invalid_grant = 'invalid_grant';

    case too_many_requests = 'too_many_requests';
}
