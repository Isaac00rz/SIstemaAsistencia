<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SemestreController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('Semestre/semestre');

        }else{
            return redirect('/login');
        }
    }

    public function formulario(){
        if(Auth::check()){
            $consulta = DB::table('semestre')
                ->select('id_semestre')
                ->where('actual','=',true)
                ->get();
            if(!(count($consulta)>0)){
                return view('Altas/altaSemestre');
            }else{
                return redirect('Admin/Semestre');
            }
            

        }else{
            return redirect('/login');
        }
    }

    public function formularioA(){
        if(Auth::check()){
            $consulta = DB::table('semestre')
                ->select('id_semestre')
                ->where('actual','=',true)
                ->get();
            if((count($consulta)>0)){
                $alumnos[] = 0;
                foreach($consulta as $semestre){
                    $id_semestre = $semestre->id_semestre;
                }
                $consulta2 = DB::table('alumnossemestre')
                ->select('id_alumno')
                ->where('id_semestre','=',$id_semestre)
                ->get();
                foreach($consulta2 as $alumno){
                    $alumnos[] = $alumno->id_alumno;
                }
                $consulta3 = DB::table('alumnos')
                ->select(DB::raw("id_alumno, CONCAT(id_alumno,'-',nombre,' ',apellidoP,' ',apellidoM) as nombreC")) 
                ->whereNotIn('id_alumno',$alumnos)
                ->get();

                
                return view('Altas/altaAlumnoSemestre')->with('alumnos',$consulta3)->with('id_semestre',$id_semestre);
            }else{
                return redirect('Admin/Semestre');
            }
            

        }else{
            return redirect('/login');
        }
    }

    public function formularioB(){
        if(Auth::check()){
            $consulta = DB::table('semestre')
                ->select('id_semestre')
                ->where('actual','=',true)
                ->get();
            if((count($consulta)>0)){
                $alumnos[] = 0;
                foreach($consulta as $semestre){
                    $id_semestre = $semestre->id_semestre;
                }
                $consulta2 = DB::table('alumnossemestre')
                ->select('id_alumno')
                ->where('id_semestre','=',$id_semestre)
                ->get();
                foreach($consulta2 as $alumno){
                    $alumnos[] = $alumno->id_alumno;
                }
                $consulta3 = DB::table('alumnos')
                ->select(DB::raw("id_alumno, nombre,apellidoP,apellidoM")) 
                ->whereIn('id_alumno',$alumnos)
                ->paginate(10);

                
                return view('Busquedas/busquedaAlumnoSemestre')->with('alumnos',$consulta3)->with('id_semestre',$id_semestre);
            }else{
                return redirect('Admin/Semestre');
            }
            

        }else{
            return redirect('/login');
        }
    }

    public function store(Request $request){
        if(Auth::check()){
            $fechaI = $request->input('fechaI');
            $fechaF = $request->input('fechaF');
            $agregar = $request->input('agregar');
            $id = Auth::id();
            $veces = 0;

                $consulta = DB::table('semestre')
                ->insertGetId(['fecha_inicio'=>$fechaI,'fecha_fin'=> $fechaF,
                'actual'=> true,'id' => $id]);
            
            if($agregar){
                $consulta2 = DB::table('alumnos')
                ->select('id_alumno','semestre')
                ->get();

                $veces = count($consulta2);

                foreach($consulta2 as $alumnos) {
                    $consulta = DB::table('alumnossemestre')
                    ->insert(['id_alumno'=>$alumnos->id_alumno,'id_semestre'=> $consulta,
                    'nosemestre'=>($alumnos->semestre + 1)]);
                }

            }   
                return redirect('Admin/Semestre');

        }else{
            return redirect('/login');
    }
}

public function storeAlumno(Request $request){
    if(Auth::check()){
        $array_alumnos = $request->input('alumnos');
        $idS = $request->input('id_semestre');
        $id = Auth::id();
        $contador = 0;
        $registros = count($array_alumnos);

        $consulta2 = DB::table('alumnos')
        ->select('id_alumno','semestre')
        ->whereIn('id_alumno',$array_alumnos)->get();

        foreach($consulta2 as $i=>$t) {
            $consulta = DB::table('alumnossemestre')
            ->insert(['id_alumno'=>$array_alumnos[$i],'id_semestre'=> $idS,
            'nosemestre'=>($t->semestre + 1)]);
            $contador++;
        }
        if($registros==$contador){
            return redirect('Admin/Semestre')->with('message', 'Datos Insertados'); ;
        }

        

    }else{
        return redirect('/login');
    }

}

    public function finalizar(){
        if(Auth::check()){
            $consulta = DB::table('semestre')
            ->where('actual','=',true)
            ->update(['actual'=>false]);
            return redirect('Admin/Semestre');

        }else{
            return redirect('/login');
        }
    }

    public function eliminarA($id_semestre,$id_alumno){
        if(Auth::check()){
            $consulta = DB::table('alumnossemestre')
            ->where('id_semestre','=',$id_semestre)
            ->where('id_alumno','=',$id_alumno)
            ->delete();
            return redirect('Admin/Semestre/Baja/Alumno');

        }else{
            return redirect('/login');
        }
    }

}