<?php

namespace App\Http\Controllers;

use App\Services\Pokemon\GetPokemon;
use App\Services\Pokemon\ListPokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $nameFilter = $request->get('name');
        $pokemons = ListPokemon::execute($nameFilter);

        if(!$pokemons){
            return response()->json([
                "message" => "Pokemon not found"
            ], 403);
        }

        return view('index')->with(compact('pokemons','nameFilter'));
    }

    public function searchPokemon(Request $request, $id)
    {

        $pokemon = GetPokemon::execute($id);

        if(!$pokemon){
            return response()->json([
                "message" => "Pokemon not found"
            ], 403);
        }

        return view('view')->with(compact('pokemon'));
    }
}
