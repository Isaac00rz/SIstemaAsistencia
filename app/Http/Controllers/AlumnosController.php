<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlumnosController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('Alumnos/alumno');

        }else{
            return redirect('/login');
        }
    }

    public function formulario(){
        if(Auth::check()){
            return view('Altas/altaAlumno');

        }else{
            return redirect('/login');
        }
    }

    public function store(Request $request){
        if(Auth::check()){
            $array_NoControl = $request->input('NoControl');
            $array_Nombre = $request->input('nombre');
            $array_ApellidoP = $request->input('apellidoP');
            $array_ApellidoM = $request->input('apellidoM');
            $id = Auth::id();
            $contador = 0;
            $registros = count($array_NoControl);

            foreach($array_NoControl as $i=>$t) {
                $consulta = DB::table('alumnos')
                ->insert(['id_alumno'=>$array_NoControl[$i],'nombre'=> $array_Nombre[$i],
                'apellidoP'=>$array_ApellidoP[$i],'apellidoM' => $array_ApellidoM[$i],
                'id'=>$id]);
                $contador++;
            }
            if($registros==$contador){
                return redirect('Admin/Alumnos/Alta')->with('message', 'Datos Insertados'); ;
            }

            return view('Altas/altaAlumno');

        }else{
            return redirect('/login');
        }

    }

    public function busqueda(){
        if(Auth::check()){
            $consulta = DB::table('alumnos')
            ->select(DB::raw("id_alumno, nombre as nombreC,apellidoP,apellidoM")) 
            ->paginate(10);
            return view('/Busquedas/busquedaAlumnos')->with('alumnos',$consulta);

        }else{
            return redirect('/login');
        }
        
    }

    public function editar($id_alumno){
        if(Auth::check()){
            $consulta = DB::table('alumnos')
            ->select(DB::raw("id_alumno, nombre as nombreC,apellidoP,apellidoM")) 
            ->Where('id_alumno','=',$id_alumno)
            ->get();
            return view('/Modificaciones/editarAlumno')->with('alumno',$consulta);

        }else{
            return redirect('/login');
        }
    }

    public function editarAlumno(Request $request){
        if(Auth::check()){
            $NoControl = $request->input('NoControl');
            $Nombre = $request->input('nombre');
            $ApellidoP = $request->input('apellidoP');
            $ApellidoM = $request->input('apellidoM');
            $NoControlA = $request->input('NoControlA');
            $id = Auth::id();

                $consulta = DB::table('alumnos')
                ->Where('id_alumno','=',$NoControlA)
                ->update(['id_alumno'=>$NoControl,'nombre'=> $Nombre,
                'apellidoP'=>$ApellidoP,'apellidoM' => $ApellidoM,
                'id'=>$id]);

                return redirect('Admin/Alumnos/ModBaja');
            

            return view('Altas/altaAlumno');

        }else{
            return redirect('/login');
        }
    }
    public function eliminar($id_alumno){
        if(Auth::check()){
            $consulta = DB::table('alumnos')
            ->Where('id_alumno','=',$id_alumno)
            ->delete();
            return redirect('Admin/Alumnos/ModBaja');

        }else{
            return redirect('/login');
        }
    }
}
