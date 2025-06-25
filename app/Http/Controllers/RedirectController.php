<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class RedirectController extends Controller
{
    public function alumno()
    {
        return view('dashboardAlumno');
    }

    public function maestro()
    {
        return view('dashboardMaestro');
    }

    public function examenDocente()
    {
        $examens = Examen::all();
        return view('docente.examenDocente', compact('examens'));
    }

    public function reporteDocente()
    {
        $resultados     = Resultado::where('idDocente', Auth::id())->get();
        $calificaciones = Calificacion::where('idDocente', Auth::id())->get();
        return view('docente.reporteDocente', compact('resultados','calificaciones'));
    }

    public function examenAlumno()
    {
        $examens = Examen::all();
        return view('alumno.examenAlumno', compact('examens'));
    }

    public function reporteAlumno()
    {
        $resultados     = Resultado::where('idAlumno', Auth::id())->get();
        $calificaciones = Calificacion::where('idAlumno', Auth::id())->get();
        return view('alumno.reporteAlumno', compact('resultados','calificaciones'));
    }

    public function respuestaAlumno(Request $request)
    {
        $id        = $request->query('id');
        $nombre    = $request->query('nombre');
        $maestro   = $request->query('maestro');
        $preguntas = Pregunta::where('id_examen', $id)->get();

        return view('alumno.respuestaAlumno', compact('id','nombre','maestro','preguntas'));
    }

    public function crearExamen()
    {
        return view('docente.crearExamen');
    }

    public function guardarExamen(Request $request)
    {
        $dato = new Examen();
        $dato->id_usuario = Auth::id();
        $dato->nombre     = $request->post('nombre');
        $dato->categoria  = $request->post('categoria');
        $dato->save();

        return redirect()->route('examen.docente');
    }

    public function eliminarExamen()
    {
        $examenes = Examen::all();
        return view('docente.eliminarExamen', compact('examenes'));
    }

    public function eliminarExamenFinal(Request $request)
    {
        Examen::where('id', $request->post('mi_select'))
            ->where('id_usuario', Auth::id())
            ->delete();

        return redirect()->route('examen.docente');
    }

    public function crearPreguntas(Request $request)
    {
        $examen = $request->query('examen');
        $nombre = $request->query('nombre');
        return view('docente.preguntasDocente', compact('examen','nombre'));
    }

    public function crearPreguntasFinal(Request $request)
    {
        $pregunta = new Pregunta();
        $pregunta->id_usuario = Auth::id();
        $pregunta->id_examen  = (int) $request->post('examen');
        $pregunta->pregunta   = $request->post('pregunta');
        $pregunta->opcion1    = $request->post('opcion1');
        $pregunta->opcion2    = $request->post('opcion2');
        $pregunta->opcion3    = $request->post('opcion3');
        $pregunta->tipoP      = $request->post('tipoP');

        $correctas = [];
        if ($request->has('correcta1')) $correctas[] = $pregunta->opcion1;
        if ($request->has('correcta2')) $correctas[] = $pregunta->opcion2;
        if ($request->has('correcta3')) $correctas[] = $pregunta->opcion3;
        $pregunta->correcta = implode(',', $correctas);

        $pregunta->save();
        return back();
    }

    public function resultados(Request $request)
    {
        // Recupera preguntas del examen
        $idExamen  = $request->input('idExamen');
        $preguntas = Pregunta::where('id_examen', $idExamen)->get();
        $aciertos  = 0;

        foreach ($preguntas as $i => $pregunta) {
            $campo     = "respuesta{$i}";
            $user      = $request->input($campo);
            $tipo      = $pregunta->tipoP;
            $correctas = explode(',', $pregunta->correcta);

            if (in_array($tipo, ['chechbox','checkbox'])) {
                $userArr = is_array($user) ? $user : [];
                sort($userArr);
                sort($correctas);
                if ($userArr === $correctas) {
                    $aciertos++;
                }
            } elseif ($tipo === 'radio') {
                if (in_array($user, $correctas, true)) {
                    $aciertos++;
                }
            } else {
                if (trim(strtolower((string)$user)) === trim(strtolower($correctas[0] ?? ''))) {
                    $aciertos++;
                }
            }
        }

        // Calcula puntaje basado en número de preguntas
        $totalPreguntas = count($preguntas);
        $porPregunta    = $totalPreguntas > 0 ? 100 / $totalPreguntas : 0;
        $puntaje        = round($aciertos * $porPregunta, 2);

        // Datos para guardar
        $idAlumno  = Auth::id();
        $idDocente = $request->input('idDocente');
        $nombreEx  = $request->input('nombreExamen');

        // Verifica intento previo
        $existing = Resultado::where('idExamen', $idExamen)
            ->where('idAlumno', $idAlumno)
            ->first();

        if ($existing) {
            $existing->intentos++;
            $existing->promedio = ($existing->promedio * ($existing->intentos - 1) + $puntaje) / $existing->intentos;
            $existing->save();
            $idResultado = $existing->id;
        } else {
            $resultado = Resultado::create([
                'idAlumno'     => $idAlumno,
                'alumno'       => Auth::user()->nombre,
                'idDocente'    => $idDocente,
                'idExamen'     => $idExamen,
                'tituloExamen' => $nombreEx,
                'intentos'     => 1,
                'promedio'     => $puntaje,
            ]);
            $idResultado = $resultado->id;
        }

        // Guarda calificación individual
        Calificacion::create([
            'idResultado' => $idResultado,
            'idAlumno'    => $idAlumno,
            'idDocente'   => $idDocente,
            'calificacion'=> $puntaje,
        ]);

        return view('alumno.resultadoExamen', ['correctas' => $puntaje]);
    }

    public function haciaEditar()
    {
        $examenes = Examen::all();
        return view('docente.editarPregunta', compact('examenes'));
    }

    public function listarPreguntas()
    {
        $examenes  = Examen::all();
        $preguntas = Pregunta::all();
        $idExamen  = request()->post('mi_select');

        return view('docente.listarPreguntas', compact('examenes','preguntas','examenBuscar'));
    }

    public function update()
    {
        $preguntas = Pregunta::where('id', request()->query('pregunta'))->get();
        return view('docente.formularioEditar', compact('preguntas'));
    }

    public function updatePregunta(Request $request)
    {
        $pregunta = Pregunta::findOrFail($request->post('id'));
        $pregunta->pregunta = $request->post('pregunta');
        $pregunta->opcion1  = $request->post('opcion1');
        $pregunta->opcion2  = $request->post('opcion2');
        $pregunta->opcion3  = $request->post('opcion3');
        $pregunta->correcta = $request->post('correcta');
        $pregunta->save();
        return back();
    }

    public function eliminarPregunta(Request $request)
    {
        Pregunta::findOrFail($request->post('id'))->delete();
        return back();
    }

}
