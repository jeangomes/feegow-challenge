<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiFeegow
{

    private string $url;
    private string $token;
    private array $headers;
    private const GET_SPECIALTIES = '/specialties/list';
    private const GET_PROFESSIONALS = '/professional/list';
    private const GET_SOURCES = '/patient/list-sources';

    public function __construct()
    {
        $this->url = config('feegow.api_url');
        $this->token = config('feegow.api_token');
        $this->headers = ['x-access-token' => $this->token];
    }

    public function getSpecialties(): string
    {
        $response = Http::withHeaders($this->headers)->get($this->url . self::GET_SPECIALTIES);
        return $response->body();
    }

    public function getProfessionalsBySpecialty($specialty_id)
    {
        $response = Http::withHeaders($this->headers)->get($this->url . self::GET_PROFESSIONALS, [
            'ativo' => true,
            'especialidade_id' => $specialty_id,
        ]);
        $response = $response->json();
        if ($response['success']) {
            return $response['content'];
        }
        abort(400, 'Ocorreu alguma falha no retorno da api, tente novamente em outro momento!');
    }

    public function getSources()
    {
        $response = Http::withHeaders($this->headers)->get($this->url . self::GET_SOURCES);
        $response = $response->json();
        if ($response['success']) {
            return $response['content'];
        }
        abort(400, 'Ocorreu alguma falha no retorno da api, tente novamente em outro momento!');
    }
}
