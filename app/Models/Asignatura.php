<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'notas');
    }

    public function nombres_alumnos()
    {
        $registros = Nota::where('asignatura_id', $this->id)->get();
        $nombres_alumnos = [];
        foreach ($registros as $registro) {
            $cod = $registro->alumno_id;
            $n = Alumno::find($cod);

            if (!in_array($n->nombre, $nombres_alumnos)) {
                    $nombres_alumnos[] = $n->nombre;
                }

        }
        // Construir la lista de nombres de álbumes
        $lista_nombres_alumnos = '';
        foreach ($nombres_alumnos as $r) {
            $lista_nombres_alumnos .= '<li>' . $r . '</li>';
        }
        return $lista_nombres_alumnos ? '<ul>' . $lista_nombres_alumnos . '</ul>' : 'Sin alumnos';
    }


    public function notas_primer_trimestre()
    {
        $canciones = Nota::where('asignatura_id', $this->id)
                           ->where('trimestre', '1')
                           ->get();

        $nombres_canciones = '';
        foreach ($canciones as $cancion) {
            $nombre = $cancion->nota;
            $nombres_canciones .= '<li>' . $nombre . '</li>';
        }
        return $nombres_canciones ? '<ul>' . $nombres_canciones . '</ul>' : 'Sin calificar';
    }

    public function notas_segun_trimestre()
    {
        $canciones = Nota::where('asignatura_id', $this->id)
                           ->where('trimestre', '1')
                           ->get();

        $nombres_canciones = '';
        foreach ($canciones as $cancion) {
            $nombre = $cancion->nota;
            $nombres_canciones .= '<li>' . $nombre . '</li>';
        }
        return $nombres_canciones ? '<ul>' . $nombres_canciones . '</ul>' : 'Sin calificar';
    }







}
