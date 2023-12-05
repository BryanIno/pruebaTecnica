<?php

namespace App\Http\Controllers;
//package para guzzlehttp
use Illuminate\Support\Facades\Http;

class PersonajesController extends Controller
{
    public function index()
    {
        $response = Http::get('https://rickandmortyapi.com/api/character');
        $data = $response->json();
    
        // Para revisar si la clave 'results' está presente
        if (isset($data['results'])) {
            $personajes = $data['results'];
    
            // Ordenamos los personajes alfabéticamente por el nombre
            usort($personajes, function ($a, $b) {
                return strcasecmp($a['name'], $b['name']);
            });
    
            // enviamos los datos usando compact
            return view('personajes.index', compact('personajes'));
        } else {
            // Si no hay datos, renderizamos la vista sin datos
            return view('personajes.index');
        }
    }    
    public function show($id)
    {
        $response = Http::get("https://rickandmortyapi.com/api/character/{$id}");
        $personaje = $response->json();

        return view('personajes.show', compact('personaje'));
    }
}
