<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//package para guzzlehttp
use Illuminate\Support\Facades\Http;

class PersonajesController extends Controller
{  
    public function index(Request $request)
    {
        $response = Http::get('https://rickandmortyapi.com/api/character');
        $data = $response->json();
    
        // Aplicar filtros si se proporcionan en la solicitud
        if ($request->filled('species')) {
            $species = $request->input('species');
            $data['results'] = array_filter($data['results'], function ($personaje) use ($species) {
                return $personaje['species'] === $species;
            });
        }
    
        if ($request->filled('status')) {
            $status = $request->input('status');
            $data['results'] = array_filter($data['results'], function ($personaje) use ($status) {
                return $personaje['status'] === $status;
            });
        }
    
        // Ordenar los personajes alfabéticamente por el nombre
        usort($data['results'], function ($a, $b) {
            return strcasecmp($a['name'], $b['name']);
        });
    
        // Enviar los datos usando compact
        return view('personajes.index', compact('data'));
    }
    
    
    
    
//funcion que consume api de un personaje en especifico con el id y retorna el json a la vista
    public function show($id)
    {
        
        $response = Http::get("https://rickandmortyapi.com/api/character/{$id}");
        $personaje = $response->json();

        return view('personajes.show', compact('personaje'));
    }
}
