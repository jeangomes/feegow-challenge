<?php

namespace App\Http\Controllers;

use App\Services\ApiFeegow;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SourcesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $feegow = new ApiFeegow();
        $sources = $feegow->getSources();
        return response()
            ->json($sources);
    }
}
