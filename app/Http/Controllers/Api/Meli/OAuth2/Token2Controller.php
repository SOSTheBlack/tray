<?php

namespace App\Http\Controllers\Api\Meli\OAuth2;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Services\Meli\Exceptions\OAuth2Exception;

final class Token2Controller extends OAuth2Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $responseBody = $this->meliService->oauth()->token();
            $responseStatusCode = Response::HTTP_CREATED;
        } catch (Throwable $exception) {
            $logMessage = $exception->getMessage();
            $logTrace = $exception->getTrace();

            $responseBody = ['error' => $exception->getMessage()];
            $responseStatusCode = $exception instanceof OAuth2Exception ? Response::HTTP_BAD_REQUEST : Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            if (isset($logMessage, $logTrace)) {
                Log::error($logMessage, $logTrace);
            }

            return response()->json($responseBody, $responseStatusCode);
        }
    }
}
