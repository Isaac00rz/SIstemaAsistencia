@include('Menus.menuAdmin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>
<title>Alta Semestre</title>
<div class="contenido">
    <fieldset>
        <legend>Alta Semestre</legend>
        @if(session()->has('message')) 
            {{ session()->get('message') }} 
        @endif 
        <form role="form" name="form" method="post" action="{{ url('/Altas/Semestre/altaSemestre') }}">
            {!! csrf_field() !!}
                    <table border="1" id="tab" style="display:inline-block;">
                        <tr id="cabecera">
                            <td class="tds">Fecha Iniciol</td>
                            <td class="tds">Fecha Final</td>
                            <td class="tds">Agregar Alumnos</td>
                        </tr>
                        <tr>
                            <td class="tds"><input class="inputs" type="date" name="fechaI" required></td>
                            <td class="tds"><input class="inputs" type="date" name="fechaF" required></td>
                            <td class="tds"><input class="inputs" type="checkbox" checked name="agregar" value="si"></td>
                        </tr>
            
                    </table>
                    <button id="aceptar" name="aceptar" type="submit"><b>Iniciar Semestre</b></button>
                </form>
            </fieldset>
</div>
</body>
@include('Menus.footer')
</html>