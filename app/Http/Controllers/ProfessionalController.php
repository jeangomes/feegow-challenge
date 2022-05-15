<?php

namespace App\Http\Controllers;

use App\Services\ApiFeegow;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param $specialty_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $specialty_id)
    {
        $feegow = new ApiFeegow();
        $professionals = $feegow->getProfessionalsBySpecialty($specialty_id);
        return response()
            ->json($professionals);
    }
}
