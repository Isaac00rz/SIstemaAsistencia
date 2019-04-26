@include('Menus.menuAdmin')
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<title>Baja/Mod Alumnos Semestre</title>
<section class="contenido">
    <fieldset>
        <legend>Modificar/Baja Alumnos Semestre</legend>
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>No. Control</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>	
        <th>Acción</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($alumnos as $alumno)
		<tr>
		<td>{{$alumno->id_alumno}}</td>
		<td>{{$alumno->nombre}}</td>
        <td>{{$alumno->apellidoP}}</td>
        <td>{{$alumno->apellidoM}}</td>
		<td>
			<a href="{{ URL('/Admin/Semestre/Alumnos/Eliminar/'.$id_semestre,$alumno->id_alumno) }}">Eliminar</a>
		</td>
		</tr>
    @endforeach
</table>
</fieldset>
<br>
{{ $alumnos->links('paginacion.paginacion') }}
</section> 
</body>
@include('Menus.footer')
</html>