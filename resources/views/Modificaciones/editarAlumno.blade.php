@include('Menus.menuAdmin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>
<title>Editar Alumno</title>
<div class="contenido">
    <fieldset>
        <legend>Editar Alumno</legend>
        @if(session()->has('message')) 
            {{ session()->get('message') }} 
        @endif 
        <form role="form" name="form" method="post" action="{{ url('/Modificar/Alumnos/editarAlumno') }}">
            {!! csrf_field() !!}
                    <table border="1" id="tab" style="display:inline-block;">
                        <tr id="cabecera">
                            <td class="tds">No. Control</td>
                            <td class="tds">Nombre</td>
                            <td class="tds">Apellido Paterno</td>
                            <td class="tds">Apellido Materno</td>
                        </tr>
                        <tr>
                        @foreach ($alumno as $alum)
                            <td class="tds"><input class="inputs" type="number" name="NoControl" maxlength = "13" placeholder="No. de Control"  value = "{{$alum->id_alumno}}" required></td>
                            <td class="tds"><input class="inputs" type="text" name="nombre" maxlength = "20" placeholder="Nombre" value = "{{$alum->nombreC}}" required></td>
                            <td class="tds"><input class="inputs" type="text" name="apellidoP" maxlength="30" placeholder="Nombre Paterno" required value = "{{$alum->apellidoP}}"></td>
                            <td class="tds"><input class="inputs" type="text" name="apellidoM" maxlength="25" placeholder="Nombre Materno" required value = "{{$alum->apellidoM}}"></td>
                            <input type="hidden" name="NoControlA" value="{{$alum->id_alumno}}">
                        @endforeach
                        </tr>
            
                    </table>
                    <button id="aceptar" name="aceptar" type="submit"><b>Editar Alumno</b></button>
                </form>
            </fieldset>
</div>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/tablaAlumno.js') }}"></script>
</body>
@include('Menus.footer')
</html>