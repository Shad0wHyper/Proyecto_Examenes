<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
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
        // Para retornar las relaciones se utiliza el metodo all()
        $examens = Examen::all();
        return view('docente.examenDocente', compact('examens'));
    }

    public function reporteDocente()
    {
        $resultados = Resultado::all()->where('idDocente', Auth::user()->id);
        $calificaciones = Calificacion::all()->where('idDocente', Auth::user()->id);
        return view('docente.reporteDocente', compact('resultados','calificaciones'));
    }

    public function examenAlumno()
    {
        $examens =  Examen::all();
        return view('alumno.examenAlumno', compact('examens'));
    }

    public function reporteAlumno()
    {
        $resultados = Resultado::all()->where('idAlumno', Auth::user()->id);
        $calificaciones = Calificacion::all()->where('idAlumno', Auth::user()->id);
        return view('alumno.reporteAlumno', compact('resultados', 'calificaciones'));
    }

    public function respuestaAlumno()
    {
        $preguntas = Pregunta::all();
        return view('alumno.respuestaAlumno')
            ->with('id', $_GET['id'])
            ->with('nombre', $_GET['nombre'])
            ->with('maestro', $_GET['maestro'])
            ->with('preguntas', $preguntas);
    }

    public function crearExamen()
    {
        return view('docente.crearExamen');
    }

    public function guardarExamen()
    {
        // if($_POST['nombre']=='') {
        //     return back()->withErrors([
        //         'message' => 'El nombre del examen no puede estar vacio',
        //     ]);
        // }

            // Realizamos una isntancia del modelo
        $dato = new Examen();
            
        // Seleccionamos los datos a guardar
        $dato->id_usuario = Auth::user()->id;
        $dato->nombre = $_POST['nombre'];
        $dato->categoria = $_POST['categoria'];
        // Guardamos los datos
        $dato->save();
        return redirect()->to('/examenDocente');
    }

    public function eliminarExamen()
    {
        $examenes = Examen::all();
        return view('docente.eliminarExamen', compact('examenes'));
    }

    public function eliminarExamenFinal()
    {
        // En la version 8 de laravel
        // ejecutamos el where y seguido de ello, ejecutamos la sentencia
        // eliminar de otro modo no funciona
        $query = DB::table('examens')
            ->where([
                ['id', $_POST['mi_select']],
                ['id_usuario', Auth::user()->id]
            ])->delete();
        return redirect()->to('/examenDocente');
    }

    public function crearPreguntas()
    {
        return view('docente.preguntasDocente')->with('examen', $_GET['examen'])->with('nombre', $_GET['nombre']);
    }
//nueva validacion de tipo
    public function crearPreguntasFinal(Request $request)
    {


        $pregunta = new Pregunta();
        $pregunta->id_usuario = Auth::user()->id;
        $int = (int)$_POST['examen'];
        $pregunta->id_examen = (int)$_POST['examen'];;
        $pregunta->pregunta = $_POST['pregunta'];
        $pregunta->opcion1 = $_POST['opcion1'];
        $pregunta->opcion2 = $_POST['opcion2'];
        $pregunta->opcion3 = $_POST['opcion3'];
        $respcorrecta = "";
        
        $pregunta -> tipoP = $_POST['tipoP'];

        // Verificar que el valor seleccionado es válido
        

        if($request -> correcta1=="1"){
            $respcorrecta = $respcorrecta.$request -> opcion1;
        }

        if($request -> correcta2=="2"){
            $respcorrecta = $respcorrecta.$request -> opcion2;
        }

        if($request -> correcta3=="3"){
            $respcorrecta = $respcorrecta.$request -> opcion3;
        }

        $pregunta->correcta = $respcorrecta;
        $pregunta->save();
        return back();


    }

    public function resultados(Request $request)
    {

        $pregunta2 = new Pregunta();
        

        $correctas = 0;
        $calificaciones = 0;
        // for ($i=0; $i < 5; $i++) {
        //     if($_POST['pregunta1' . $i]==NULL){
        //         $p1 =$_POST['pregunta1' . $i];
        //     }
        //     if($_POST['pregunta2' . $i]==NULL){
        //         $p2 =$_POST['pregunta2' . $i];
        //     }

        //     if($_POST['pregunta3' . $i]==NULL){
        //         $p3 =$_POST['pregunta3' . $i];
        //     }
        //         echo $general = $p1.$p2.$p3;
        // }
        $respuestasCorrectas = 0;
        $cal = 0;
        // pregunta1
        // echo $request->pregunta10;
        // echo $request->pregunta20;
        // echo $request->pregunta30;
        // echo $request->correcta0;

       /* if(){

        }*/

        if($request->kendra0 == "input"){
                $respuestasCorrectas++;
        }else{
            if($request->correcta0 == $request->pregunta10.$request->pregunta20.$request->pregunta30){
                $respuestasCorrectas++;
             }
        }


        if($request->kendra1 == "input"){
            $respuestasCorrectas++;
        }else{
            if($request->correcta1 == $request->pregunta11.$request->pregunta21.$request->pregunta31){
                $respuestasCorrectas++;
            }
        }
        

        if($request->kendra2 == "input"){
            $respuestasCorrectas++;
        }else{
            if($request->correcta2 == $request->pregunta12.$request->pregunta22.$request->pregunta32){
                $respuestasCorrectas++;
            }
        }
       

        if($request->kendra3 == "input"){
            $respuestasCorrectas++;
        }else{
            if($request->correcta3 == $request->pregunta13.$request->pregunta23.$request->pregunta33){
                $respuestasCorrectas++;
            }
        }
        
        if($request->kendra4 == "input"){
            $respuestasCorrectas++;
        }else{
            if($request->correcta4 == $request->pregunta14.$request->pregunta24.$request->pregunta34){
                $respuestasCorrectas++;
            }
        }


        echo $respuestasCorrectas;
        
       
        // for ($i = 0; $i < 5; $i++) {
        //     if ($_POST['pregunta' . $i] == $_POST['correcta' . $i]) {
        //         $correctas++;
        //     }      
        // }

        $puntaje = $respuestasCorrectas*20;

        $idExamen = $_POST['idExamen'];
        $idAlumno = Auth::user()->id;
        $alumno = Auth::user()->nombre;
        $idDocente = $_POST['idDocente'];
        $nombreExamen = $_POST['nombreExamen'];

        // Si el usuario ya ha realizado varios intentos true o false
        if (Resultado::where('idExamen', $idExamen)->where('idAlumno', $idAlumno)->exists()) {
            // Comparamos para observar si ya se ha contestado ese mismo examen y traera todo el registro completo 
            $resultado = Resultado::where('idExamen', $idExamen)->where('idAlumno', $idAlumno)->get();
            foreach ($resultado as $value) {
                $intento = $value->intentos;
                $idResultado = $value->id;
            }


            $calificaciones = new Calificacion();
            $calificaciones->idResultado = $idResultado;
            $calificaciones->idAlumno = $idAlumno;
            $calificaciones->idDocente = $idDocente;
            $calificaciones->calificacion = $puntaje;
            $calificaciones->save();

            $comparar = Calificacion::where('idResultado', $idResultado)->get();

            $totalCalificaciones = 0;
            $contador = 0;

            foreach ($comparar as $value) {
                $totalCalificaciones = $totalCalificaciones + $value->calificacion;
                $contador++;
            }

            // Sacamos el promedio
            $promedio = $totalCalificaciones / $contador;
            // Incrementamos el intento
            $intento = $intento + 1;
            // Buscamos este resultado
            $searchResult = Resultado::find($idResultado);
            $searchResult->idAlumno = $idAlumno;
            $searchResult->alumno = $alumno;
            $searchResult->idDocente = $idDocente;
            $searchResult->idExamen = $idExamen;
            $searchResult->tituloExamen = $nombreExamen;
            $searchResult->intentos = $intento;
            $searchResult->promedio = $promedio;
            $searchResult->save();
        } else {
            $resultado = new Resultado();
            $resultado->idAlumno = $idAlumno;
            $resultado->alumno = $alumno;
            $resultado->idDocente = $idDocente;
            $resultado->idExamen = $idExamen;
            $resultado->tituloExamen = $nombreExamen;
            $resultado->intentos = 1;
            $resultado->promedio = $puntaje;
            $resultado->save();

            // Obtenemos el id del primer resulatdo
            $idResultado = $resultado->id;

            $calificaciones = new Calificacion();
            $calificaciones->idResultado = $idResultado;
            $calificaciones->idAlumno = $idAlumno;
            $calificaciones->idDocente = $idDocente;
            $calificaciones->calificacion = $puntaje;
            $calificaciones->save();
        }

        return view('alumno.resultadoExamen')
            ->with('correctas', $puntaje);
    }

    public function haciaEditar()
    {
        $examenes = Examen::all();
        return view('docente.editarPregunta')
            ->with(compact('examenes'));
    }

    public function listarPreguntas()
    {
        $examenes = Examen::all();
        $preguntas = Pregunta::all();
        $idExamen = $_POST['mi_select'];

        return view('docente.listarPreguntas')
            ->with(compact('examenes'))
            ->with(compact('preguntas'))
            ->with('examenBuscar', $idExamen);
    }

    public function update()
    {
        $preguntas = Pregunta::all()->where('id', $_GET['pregunta']);
        return view('docente.formularioEditar', compact('preguntas'));
    }

    public function updatePregunta()
    {
        $pregunta = Pregunta::where('id', $_POST['id'])->first();
        $pregunta->pregunta = $_POST['pregunta'];
        $pregunta->opcion1 = $_POST['opcion1'];
        $pregunta->opcion2 = $_POST['opcion2'];
        $pregunta->opcion3 = $_POST['opcion3'];
        $pregunta->correcta = $_POST['correcta'];
        $pregunta->save();
        return back();
    }

    public function eliminarPregunta()
    {
        $pregunta = Pregunta::where('id', $_POST['id'])->first();
        $pregunta->delete();
        return back();
    }

    public function verPdf(){
        $resultados = Resultado::all()->where('idAlumno', Auth::user()->id);
        $calificaciones = Calificacion::all()->where('idAlumno', Auth::user()->id);
        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("alumno.pdfAlumno", compact('resultados','calificaciones'))->setOptions(['defaultFont' => 'sans-serif']);
        return $dompdf->download("ReporteAlumno.pdf");
    }

    public function verPdfDocente(){
        $resultados = Resultado::all()->where('idDocente', Auth::user()->id);
        $calificaciones = Calificacion::all()->where('idDocente', Auth::user()->id);
        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("docente.pdfDocente", compact('resultados','calificaciones'))->setOptions(['defaultFont' => 'sans-serif']);
        return $dompdf->download("ReporteDocente.pdf");
    }

    public function verPdfPreguntas(){
        $preguntas = Pregunta::all();
        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("docente.pdfPregunta", compact('preguntas'))->setOptions(['defaultFont' => 'sans-serif']);
        return $dompdf->download("Siiii.pdf");
    }

}
