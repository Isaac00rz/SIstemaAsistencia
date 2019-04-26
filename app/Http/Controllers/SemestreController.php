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

}