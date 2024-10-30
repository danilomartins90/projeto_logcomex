<?php

namespace App\Services\Pokemon;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ListPokemon
{
    public static function execute($nameFilter)
    {
        try {

            $responseAPI = Http::timeout(30)
            ->get(env('ROUTE_BASE_API_POKEMON')."/api/v2/pokemon")
            ->object();

            $returnToBe = [];

            foreach ($responseAPI->results as $value) {

                if($nameFilter){
                    if($value->name != $nameFilter){
                        continue;
                    }
                }

                $returnToBe[] = [
                    "id" => explode("/", $value->url)[6] ?? null,
                    "name" => $value->name
                ];
            }

            return $returnToBe;

        } catch (\Throwable $th) {
            Log::error($th);
            return false;
        }
    }
}
