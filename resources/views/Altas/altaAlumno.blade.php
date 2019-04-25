@include('Menus.menuAdmin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>
<title>Alta Alumnos</title>
<div class="contenido">
    <fieldset>
        <legend>Alta Alumno</legend>
        @if(session()->has('message')) 
            {{ session()->get('message') }} 
        @endif 
        <form role="form" name="form" method="post" action="{{ url('/Altas/Alumnos/altaAlumno') }}">
            {!! csrf_field() !!}
                    <table border="1" id="tab" style="display:inline-block;">
                        <tr id="cabecera">
                            <td class="tds">No. Control</td>
                            <td class="tds">Nombre</td>
                            <td class="tds">Apellido Paterno</td>
                            <td class="tds">Apellido Materno</td>
                            <td class="tds">No. Semestre</td>
                            <td class="tds">Eliminar</td>
                        </tr>
                        <tr>
                            <td class="tds"><input class="inputs" type="number" name="NoControl[]" maxlength = "13" placeholder="No. de Control" required></td>
                            <td class="tds"><input class="inputs" type="text" name="nombre[]" maxlength = "20" placeholder="Nombre" required></td>
                            <td class="tds"><input class="inputs" type="text" name="apellidoP[]" maxlength="30" placeholder="Nombre Paterno" required></td>
                            <td class="tds"><input class="inputs" type="text" name="apellidoM[]" maxlength="25" placeholder="Nombre Materno" required></td>
                            <td class="tds"><input class="inputs" type="number" name="semestre[]" maxlength="2" placeholder="No de Semestre" required></td>
                            <td class="tds"><input class="inputs" type="reset" class="noEliminar" value="Eliminar" /></td>
                        </tr>
            
                    </table>
                    <button id="add" type="button" ><b>Añadir registro</b></button>
                    <button id="aceptar" name="aceptar" type="submit"><b>Insertar registros</b></button>
                </form>
            </fieldset>
</div>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/tablaAlumno.js') }}"></script>
</body>
@include('Menus.footer')
</html>