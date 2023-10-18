<?php

namespace App\Services\Meli\Exceptions;

use Throwable;
use App\Services\Meli\Data\ExceptionData;

final class OAuth2Exception extends MeliException
{
    public function __construct(ExceptionData $exceptionData, ?Throwable $previous = null)
    {
        parent::__construct($exceptionData->message, $exceptionData->status, $previous);
    }
}
