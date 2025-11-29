<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    /**
     * Listar todos los superhéroes.
     */
    public function index()
    {
        $superheroes = Superhero::all();
        return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Mostrar formulario para crear un superhéroe.
     */
    public function create()
    {
        return view('superheroes.create');
    }

    /**
     * Guardar un nuevo superhéroe.
     */
    public function store(Request $request)
    {
        $request->validate([
            'real_name' => 'required',
            'hero_name' => 'required',
            'photo_url' => 'required|url',
            'info' => 'required'
        ]);

        Superhero::create($request->all());

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe registrado correctamente');
    }

    /**
     * Mostrar un superhéroe por ID.
     */
    public function show($id)
    {
        $superhero = Superhero::findOrFail($id);
        return view('superheroes.show', compact('superhero'));
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit($id)
    {
        $superhero = Superhero::findOrFail($id);
        return view('superheroes.edit', compact('superhero'));
    }

    /**
     * Actualizar la información del superhéroe.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'real_name' => 'required',
            'hero_name' => 'required',
            'photo_url' => 'required|url',
            'info' => 'required'
        ]);

        $superhero = Superhero::findOrFail($id);
        $superhero->update($request->all());

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe actualizado correctamente');
    }

    /**
     * Eliminar un superhéroe.
     */
    public function destroy($id)
    {
        $superhero = Superhero::findOrFail($id);
        $superhero->delete();

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe eliminado correctamente');
    }
}
