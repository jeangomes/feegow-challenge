<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitationRequest;
use App\Http\Requests\UpdateSolicitationRequest;
use App\Models\Solicitation;

class SolicitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreSolicitationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreSolicitationRequest $request)
    {
        $validatedData = $request->validated();
        $solicitation = new Solicitation();
        $solicitation->specialty_id = $validatedData['specialty_id'];
        $solicitation->professional_id = $validatedData['professional_id'];
        $solicitation->name = $validatedData['name'];
        $solicitation->cpf = preg_replace("/[^0-9]/", "", $validatedData['cpf']);
        $solicitation->source_id = $validatedData['source_id'];
        $solicitation->birthdate = $validatedData['birthdate'];
        if ($solicitation->save()) {
            return response()->json('Operação realizada com sucesso!', 201);
        }
        return response()->json('Operação não realizada com sucesso!', 400);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Solicitation $solicitation
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitation $solicitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSolicitationRequest $request
     * @param \App\Models\Solicitation $solicitation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSolicitationRequest $request, Solicitation $solicitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Solicitation $solicitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitation $solicitation)
    {
        //
    }
}
