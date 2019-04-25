@include('Menus.menuAdmin')
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<title>Baja/Mod Usuario</title>
<section class="contenido">
<fieldset>
<legend>Modificar/Baja Alumnos</legend>
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>ID</th>
        <th>Nombre</th>
		<th>Correo</th>	
		<th>Rol</th>
        <th>Acción</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($users as $user)
		<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->rol}}</td>
		<td>
			<a href="{{ URL('Admin/Usuario/Administracion/Editar',$user->id) }}">Editar</a>
			<a href="{{ URL('Admin/Usuario/Administracion/Eliminar',$user->id) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
</fieldset>
<br>
{{ $users->links('paginacion.paginacion') }}
</section> 
</body>
@include('Menus.footer')
</html>