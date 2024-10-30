<?php

namespace App\Services\Pokemon;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetPokemon
{
    public static function execute($pokemonId)
    {
        try {

            $responseAPI = Http::timeout(30)
            ->get(env('ROUTE_BASE_API_POKEMON')."/api/v2/pokemon/{$pokemonId}/")
            ->object();

            $returnToBe = [
                "name" => $responseAPI->name,
                "type" => $responseAPI->types,
                "height" => $responseAPI->height * 10,
                "weight" => $responseAPI->weight * 10
            ];

            return $returnToBe;

        } catch (\Throwable $th) {
            Log::error($th);
            return false;
        }
    }
}
