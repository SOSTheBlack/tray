<?php

namespace App\Services\Meli\Exceptions\Resources;

use Throwable;
use Illuminate\Support\Facades\Log;
use App\Services\Meli\Data\ExceptionData;
use App\Services\Meli\Exceptions\MeliException;

abstract class ResourceException extends MeliException implements Throwable
{
    /**
     * @param  ExceptionData  $exceptionData
     * @param  Throwable|null  $previous
     */
    public function __construct(ExceptionData $exceptionData, ?Throwable $previous = null)
    {
        Log::error($exceptionData->message, (array)$previous?->getTrace());

        parent::__construct($exceptionData->message, $exceptionData->status, $previous);
    }
}
