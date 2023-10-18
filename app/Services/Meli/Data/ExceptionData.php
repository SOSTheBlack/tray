<?php

namespace App\Services\Meli\Data;

use Spatie\LaravelData\Data;
use App\Services\Meli\Data\Enums\ErrorType;

class ExceptionData extends Data
{
    public string $message;

    public ErrorType $error;
    public int $status;
}
