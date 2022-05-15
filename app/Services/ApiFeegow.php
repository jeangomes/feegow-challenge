<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiFeegow
{

    private string $url;
    private string $token;
    private const GET_SPECIALTIES = '/specialties/list';

    public function __construct()
    {
        $this->url = config('feegow.api_url');
        $this->token = config('feegow.api_token');
    }

    public function getSpecialties(): string
    {
        $response = Http::withHeaders([
            'x-access-token' => $this->token
        ])->get($this->url . self::GET_SPECIALTIES);
        return $response->body();
    }
}
