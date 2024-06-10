<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function insertar(Request $request)
     {
         // Valida los datos del formulario
         $request->validate([
             'alumno_id' => 'required|exists:alumnos,id',
             'asignatura_id' => 'required|exists:asignaturas,id',
             'trimestre' => 'required|integer|in:1,2,3',
             'nota' => 'required|integer|between:0,10',
         ]);

         // Verifica si ya existe una nota para el trimestre especificado
         $existe_nota = Nota::where('alumno_id', $request->alumno_id)
             ->where('asignatura_id', $request->asignatura_id)
             ->where('trimestre', $request->trimestre)
             ->exists();

         if ($existe_nota) {
             return redirect()->route('alumnos.inserta')->with('error', 'La nota para este trimestre ya ha sido registrada.');
         }

         // Obtiene el número de trimestres de la asignatura
         $asignatura = Asignatura::findOrFail($request->asignatura_id);
         $cant_trimestres = $asignatura->numero_de_trimestres;

         // Verifica si el trimestre es válido para la asignatura
         if ($request->trimestre > $cant_trimestres) {
             return redirect()->route('alumnos.inserta')->with('error', 'El trimestre especificado no es válido para esta asignatura.');
         }

         // Inserta la nota en la base de datos
         DB::table('notas')->insert([
             'alumno_id' => $request->alumno_id,
             'asignatura_id' => $request->asignatura_id,
             'trimestre' => $request->trimestre,
             'nota' => $request->nota,
         ]);

         return redirect()->route('alumnos.inserta')->with('success', 'La nota se ha registrado correctamente.');
     }



    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
