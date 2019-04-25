<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class usuariosController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('Usuarios/usuarios');

        }else{
            return redirect('/login');
        }
    }

    public function formulario(){
        if(Auth::check()){
            return view('Altas/usuarioAdmin');

        }else{
            return redirect('/login');
        }
    }
    public function formularioP(){
        if(Auth::check()){
            return view('Altas/usuarioPadre');

        }else{
            return redirect('/login');
        }
    }

    public function storeA(Request $request){
        if(Auth::check()){
            $array_Nombre = $request->input('nombre');
            $array_correo = $request->input('correo');
            $array_telefono = $request->input('telefono');
            $array_tipo = $request->input('tipo');
            $array_contra = $request->input('contra');
            $id = Auth::id();
            $contador = 0;
            $registros = count($array_Nombre);

            foreach($array_Nombre as $i=>$t) {
                $consulta = DB::table('users')
                ->insertGetId(['name'=>$array_Nombre[$i],'email'=> $array_correo[$i],
                'password'=> bcrypt($array_contra[$i]) ]);

                $consulta2 = DB::table('roles')
                ->insert(['id'=>$consulta,'rol'=> $array_tipo[$i],
                'telefono'=>$array_telefono[$i]]);
                $contador++;
            }
            if($registros==$contador){
                return redirect('Admin/Usuarios')->with('message', 'Datos Insertados'); ;
            }

            return view('Altas/altaAlumno');

        }else{
            return redirect('/login');
        }

    }
    public function storeP(Request $request){
        if(Auth::check()){
            $Nombre = $request->input('nombre');
            $correo = $request->input('correo');
            $telefono = $request->input('telefono');
            $contra = $request->input('contra');

            $consulta = DB::table('users')
                ->insertGetId(['name'=>$Nombre,'email'=> $correo,
                'password'=> bcrypt($contra)]);

            $consulta2 = DB::table('roles')
                ->insert(['id'=>$consulta,'rol'=> 'Padre',
                'telefono'=>$telefono]);               
      
            $consulta3 = DB::table('alumnos')
            ->select(DB::raw("id_alumno, CONCAT(id_alumno,'-',nombre,' ',apellidoP,' ',apellidoM) as nombreC"))->get();

            return view('Altas/altaHijos')->with('id', $consulta)->with('alumnos',$consulta3);

        }else{
            return redirect('/login');
        }

    }

    public function storeH(Request $request){
        if(Auth::check()){
            $array_alumnos = $request->input('alumnos');
            $idP = $request->input('id');
            $id = Auth::id();
            $contador = 0;
            $registros = count($array_alumnos);

            foreach($array_alumnos as $i=>$t) {
                $consulta = DB::table('hijos')
                ->insert(['id'=>$idP,'id_Alumno'=> $array_alumnos[$i]]);
                $contador++;
            }
            if($registros==$contador){
                return redirect('Admin/Usuarios')->with('message', 'Datos Insertados'); ;
            }

            return view('Altas/altaAlumno');

        }else{
            return redirect('/login');
        }

    }

    public function busquedaA(){
        if(Auth::check()){
            $consulta = DB::table('users')
            ->join('roles','roles.id','=','users.id')
            ->select(DB::raw("users.id, rol,name,email")) 
            ->paginate(10);
            return view('/Busquedas/busquedaUsuario')->with('users',$consulta);

        }else{
            return redirect('/login');
        }
        
    }
    
    public function busquedaP(){
        if(Auth::check()){
            $consulta = DB::table('users')
            ->join('roles','roles.id','=','users.id')
            ->select(DB::raw("users.id,name,email")) 
            ->where('rol','=','Padre')
            ->paginate(10);
            return view('/Busquedas/busquedaUsuarioP')->with('users',$consulta);

        }else{
            return redirect('/login');
        }
        
    }
    public function editarA($id_usuario){
        if(Auth::check()){
            $consulta = DB::table('users')
            ->join('roles','roles.id','=','users.id')
            ->select(DB::raw("users.id, rol,name,email,telefono")) 
            ->where('users.id','=',$id_usuario)
            ->get();
            return view('/Modificaciones/editarUsuarioA')->with('user',$consulta)->with('id',$id_usuario);

        }else{
            return redirect('/login');
        }
    }

    public function editarP($id_usuario){
        if(Auth::check()){
            $consulta = DB::table('users')
            ->join('roles','roles.id','=','users.id')
            ->join('hijos','users.id','=','hijos.id')
            ->join('alumnos','alumnos.id_alumno','=','hijos.id_alumno')
            ->select(DB::raw("alumnos.id_alumno, CONCAT(alumnos.id_alumno,'-',nombre,' ',apellidoP,' ',apellidoM) as nombreC")) 
            ->where('users.id','=',$id_usuario)
            ->get();
            $consulta3 = DB::table('alumnos')
            ->select(DB::raw("id_alumno, CONCAT(id_alumno,'-',nombre,' ',apellidoP,' ',apellidoM) as nombreC"))->get();
            return view('/Modificaciones/editarUsuarioP')->with('hijos',$consulta)->with('id',$id_usuario)->with('alumnos',$consulta3);

        }else{
            return redirect('/login');
        }
    }

    public function editarUsuarioA(Request $request){
        if(Auth::check()){
            $nombre = $request->input('nombre');
            $correo = $request->input('correo');
            $telefono = $request->input('telefono');
            $contra = $request->input('contra');
            $tipo = $request->input('tipo');
            $id = $request->input('id');

                $consulta = DB::table('users')
                ->Where('id','=',$id)
                ->update(['name'=>$nombre,'email'=> $correo,
                'password'=>bcrypt($contra)]);

                $consulta = DB::table('roles')
                ->Where('id','=',$id)
                ->update(['rol'=>$tipo,'telefono'=> $telefono]);

                return redirect('Admin/Usuario/ModBaja');
            

            return view('Altas/altaAlumno');

        }else{
            return redirect('/login');
        }
    }

    public function editarUsuarioP(Request $request){
        if(Auth::check()){
            $array_alumnos = $request->input('alumnos');
            $idP = $request->input('id');
            $id = Auth::id();
            $contador = 0;
            $registros = count($array_alumnos);

            $consulta = DB::table('hijos')
            ->Where('id','=',$idP)
            ->delete();


            foreach($array_alumnos as $i=>$t) {
                $consulta2 = DB::table('hijos')
                ->insert(['id'=>$idP,'id_Alumno'=> $array_alumnos[$i]]);
                $contador++;
            }
            if($registros==$contador){
                return redirect('Admin/Usuario/Padre/ModBaja')->with('message', 'Datos Insertados');
            }
                

        }else{
            return redirect('/login');
        }
    }

    public function eliminarA($id_usuario){
        if(Auth::check()){
            $consulta = DB::table('roles')
            ->Where('id','=',$id_usuario)
            ->delete();
            return redirect('Admin/Usuario/ModBaja');

        }else{
            return redirect('/login');
        }
    }

}
