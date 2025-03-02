<?php
namespace App\Http\Controllers;

use App\Models\Curiosidad;
use Illuminate\Http\Request;

class CuriosidadController extends Controller
{
    public function index()
    {
        $curiosidades = Curiosidad::all();
        return view('curiosidades.index', compact('curiosidades'));
    }

    public function create()
    {
        return view('curiosidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/imagenes');
        }

        Curiosidad::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $path ?? null
        ]);

        return redirect()->route('curiosidades.index');
    }

    public function show(Curiosidad $curiosidad)
    {
        return view('curiosidades.show', compact('curiosidad'));
    }

    public function edit(Curiosidad $curiosidad)
    {
        return view('curiosidades.edit', compact('curiosidad'));
    }

    public function update(Request $request, Curiosidad $curiosidad)
    {
        $curiosidad->update($request->all());
        return redirect()->route('curiosidades.index');
    }

    public function destroy(Curiosidad $curiosidad)
    {
        $curiosidad->delete();
        return redirect()->route('curiosidades.index');
    }
}
