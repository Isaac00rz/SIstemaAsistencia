@include('Menus.menuAdmin')
<link rel="stylesheet" href="{{ asset('css/usuarios.css')}}">
<div class="contenido">
<fieldset>
    <legend>Administrar Alumnos</legend>
    <p>Alta de alumnos</p>
    <a href="{{ url('/Admin/Alumnos/Alta')}}">Alta</a>
    <br>
    <hr>
    <p>Modificar/Baja Alumnos</p>
    <a href="{{url('/Admin/Alumnos/ModBaja')}}">ModBaja</a>
    <br>
    <hr>
    <p>Busqueda de alumnos</p>
    <a href="">Busqueda</a>
    <br>
    <hr>
</fieldset>
</div>
</body>
@include('Menus.footer')
</html>