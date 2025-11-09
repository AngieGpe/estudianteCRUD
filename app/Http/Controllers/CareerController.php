<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('nombre')->get();
        return view('careers.index', compact('careers'));
    }

    public function create()
    {
        return view('careers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Career::create($data);
        return redirect()->route('careers.index')->with('success', 'Carrera creada correctamente.');
    }

    public function edit(Career $career)
    {
        return view('careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $career->update($data);
        return redirect()->route('careers.index')->with('success', 'Carrera actualizada correctamente.');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('careers.index')->with('success', 'Carrera eliminada correctamente.');
    }
}
