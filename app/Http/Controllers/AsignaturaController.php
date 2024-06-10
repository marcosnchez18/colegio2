<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('asignaturas.index', [
            'asignaturas' => Asignatura::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'denominacion' => 'required|max:255',
            'numero_de_trimestres' => 'required|integer',
        ]);

        $asignatura = new Asignatura();
        $asignatura->denominacion = $validated['denominacion'];
        $asignatura->numero_de_trimestres = $validated['numero_de_trimestres'];
        $asignatura->save();
        session()->flash('success', 'Asignatura se ha creado correctamente.');
        return redirect()->route('asignaturas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura $asignatura, Alumno $alumno)
    {
        return view('asignaturas.show', [
            'asignatura' => $asignatura,
            'alumno' => $alumno,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignatura $asignatura)
    {
        return view('asignaturas.edit', [
            'asignatura' => $asignatura,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $validated = $request->validate([
            'denominacion' => 'required|max:255',
            'numero_de_trimestres' => 'required|integer|in:2,3',
            //'numero_de_trimestres' => 'required|integer',
        ]);

        $asignatura->denominacion = $validated['denominacion'];
        $asignatura->numero_de_trimestres = $validated['numero_de_trimestres'];
        $asignatura->save();
        session()->flash('success', 'asignatura cambiado correctamente');
        return redirect()->route('asignaturas.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        session()->flash('success', 'La asignatura se ha eliminado correctamente.');
        return redirect()->route('asignaturas.index');
    }
}
