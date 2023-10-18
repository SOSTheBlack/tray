<?php

namespace App\Services\Meli\Exceptions;

use Throwable;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\Meli\Data\ExceptionData;

abstract class MeliException extends Exception implements Throwable
{
    /**
     * @param  ExceptionData  $exceptionData
     * @param  Throwable|null  $previous
     */
    public function __construct(ExceptionData $exceptionData, ?Throwable $previous = null)
    {
        Log::error($exceptionData->message, (array) $previous?->getTrace());

        parent::__construct($exceptionData->message, $exceptionData->status, $previous);
    }
}
