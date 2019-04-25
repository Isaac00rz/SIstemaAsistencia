@include('Menus.menuAdmin')
<link rel="stylesheet" href="{{ asset('css/usuarios.css')}}">
<div class="contenido">
<fieldset>
    <legend>Administrar Usuarios</legend>
    <p>Alta de usuarios</p>
    <a href="{{url('/Admin/Usuario/Administrativo/Alta')}}">Administrativo</a>
    <a href="{{url('/Admin/Usuario/Padre/Alta')}}">Padre de Familia</a>
    <br>
    <hr>
    <p>Modificar/Baja Usuario</p>
    <a href="{{url('/Admin/Usuario/ModBaja')}}">Administrativo</a>
    <a href="{{url('/Admin/Usuario/Padre/ModBaja')}}">Hijos</a>
    <br>
    <hr>
    <p>Busqueda de Usuarios</p>
    <a href="">Busqueda</a>
    <br>
    <hr>
</fieldset>
</div>
</body>
@include('Menus.footer')
</html>