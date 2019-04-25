@include('Menus.menuAdmin')
<link rel="stylesheet" href="{{ asset('css/usuarios.css')}}">
<div class="contenido">
<fieldset>
    <legend>Administrar Semestre</legend>
    <p>Nuevo Semestre</p>
    <a href="">Alta</a>
    <br>
    <hr>
    <p>Informacion Semestre Actual</p>
    <a href="">Actual</a>
    <br>
    <hr>
    <p>Finalizar Semestre</p>
    <a href="">Finalizar</a>
    <br>
    <hr>
    <p>Historial Semestres</p>
    <a href="">Historial</a>
    <br>
    <hr>
</fieldset>
</div>
</body>
@include('Menus.footer')
</html>