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
        'name' => 'required',
        'superpower' => 'required',
        'photo' => 'required|image',
    ]);

    $path = $request->file('photo')->store('superheroes', 'public');

    Superhero::create([
        'name' => $request->name,
        'superpower' => $request->superpower,
        'photo' => $path,
    ]);

    return redirect()->route('superheroes.index');
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
   public function update(Request $request, Superhero $superhero)
{
    $request->validate([
        'name' => 'required',
        'superpower' => 'required',
        'photo' => 'image'
    ]);

    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('superheroes', 'public');
        $superhero->photo = $path;
    }

    $superhero->name = $request->name;
    $superhero->superpower = $request->superpower;

    $superhero->save();

    return redirect()->route('superheroes.index');
}


    /**
     * Eliminar un superhéroe.
     */
   public function destroy(Superhero $superhero)
{
    $superhero->delete();

    return redirect()->route('superheroes.index');
}
public function deleted()
{
    $heroes = Superhero::onlyTrashed()->get();

    return view('superheroes.deleted', compact('heroes'));
}
public function restore($id)
{
    $hero = Superhero::onlyTrashed()->where('id', $id)->first();
    $hero->restore();

    return redirect()->route('superheroes.deleted');
}

}
