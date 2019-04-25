@include('Menus.menuAdmin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>
<title>Alta Alumnos</title>
<div class="contenido">
    <fieldset>
        <legend>Editar Hijos</legend>
        @if(session()->has('message')) 
            {{ session()->get('message') }} 
        @endif 
        <form role="form" name="form" method="post" action="{{ url('/Altas/Usuario/altaUsuarioHijo') }}">
            {!! csrf_field() !!}
                    <table border="1" id="tab" style="display:inline-block;">
                        <tr id="cabecera">
                            <td class="tds">Alumno</td>
                            <td class="tds">Eliminar</td>
                        </tr>
                        @foreach ($hijos as $hijo)
                        <tr>
                            <td class="tds"><select name="alumnos[]" required>
                                @foreach ($alumnos as $alumno)
                                    @if ($hijo->id_alumno==$alumno->id_alumno)
                                        <option value="{{$alumno->id_alumno}}" selected> {{$alumno->nombreC}}</option>
                                    @else
                                        <option value="{{$alumno->id_alumno}}"> {{$alumno->nombreC}}</option>
                                    @endif
                                    
                                @endforeach
                            </select></td>
                            <td class="tds"><input class="inputs" type="reset" class="noEliminar" value="Eliminar" /></td>
                        </tr>
                        @endforeach
                        <input type="hidden" name="id" value="{{$id}}">
                    </table>
                    <button id="add" type="button" onClick="agregar();" ><b>Añadir registro</b></button>
                    <button id="aceptar" name="aceptar" type="submit"><b>Insertar registros</b></button>
                </form>
            </fieldset>
</div>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script>
    function agregar() {
    var tds = '<tr>';
    tds += '<td class="tds"><select name="alumnos[]" required> @foreach ($alumnos as $alumno)<option value="{{$alumno->id_alumno}}"> {{$alumno->nombreC}}</option>@endforeach</select></td>'         
    tds += '<td style="width: 11%; min-width: 11%"><input type="button" class="borrar" value="Eliminar" style="min-width: 100%; width:100%;"/></td>'
    tds += '</tr>'
    $("#tab").append(tds);
}

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
</script>
</body>
@include('Menus.footer')
</html>