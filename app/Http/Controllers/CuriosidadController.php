<?php

namespace App\Http\Controllers;

use App\Models\Curiosidad;
use Illuminate\Http\Request;

class CuriosidadController extends Controller
{
    // Mostrar la lista de curiosidades
    public function index()
    {
        $curiosidades = Curiosidad::all();
        return view('curiosidades.index', compact('curiosidades'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('curiosidades.create');
    }

    // Guardar una nueva curiosidad en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $curiosidad = new Curiosidad();
        $curiosidad->titulo = $request->titulo;
        $curiosidad->descripcion = $request->descripcion;

        if ($request->hasFile('imagen')) {
            $curiosidad->imagen = $request->file('imagen')->store('imagenes', 'public');
        }

        $curiosidad->save();

        return redirect()->route('curiosidades.index')->with('success', 'Curiosidad creada correctamente.');
    }

    // Mostrar una curiosidad específica
    public function show(Curiosidad $curiosidad)
    {
        return view('curiosidades.show', compact('curiosidad'));
    }

    // Mostrar el formulario de edición
    public function edit(Curiosidad $curiosidad)
    {
        return view('curiosidades.edit', compact('curiosidad'));
    }

    // Actualizar una curiosidad
    public function update(Request $request, Curiosidad $curiosidad)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $curiosidad->titulo = $request->titulo;
        $curiosidad->descripcion = $request->descripcion;

        if ($request->hasFile('imagen')) {
            $curiosidad->imagen = $request->file('imagen')->store('imagenes', 'public');
        }

        $curiosidad->save();

        return redirect()->route('curiosidades.index')->with('success', 'Curiosidad actualizada correctamente.');
    }

    // Eliminar una curiosidad
    public function destroy(Curiosidad $curiosidad)
    {
        $curiosidad->delete();
        return redirect()->route('curiosidades.index')->with('success', 'Curiosidad eliminada correctamente.');
    }
}
