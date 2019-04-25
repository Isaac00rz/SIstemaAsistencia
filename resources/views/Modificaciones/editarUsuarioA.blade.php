@include('Menus.menuAdmin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>
<title>Editar Usuario</title>
<div class="contenido">
    <fieldset>
        <legend>Editar Usuario</legend>
        @if(session()->has('message')) 
            {{ session()->get('message') }} 
        @endif 
        <form role="form" name="form" method="post" action="{{ url('/Modificar/Usuario/editarUsuarioA') }}">
            {!! csrf_field() !!}
                    <table border="1" id="tab" style="display:inline-block;">
                        <tr id="cabecera">
                            <td class="tds">Nombre</td>
                            <td class="tds">Correo</td>
                            <td class="tds">Telefono</td>
                            <td class="tds">Contraseña</td>
                            <td class="tds">Rol</td>
                        </tr>
                        
                        @foreach ($user as $use)
                        <tr>
                                <td class="tds"><input class="inputs" type="text" name="nombre" value="{{$use->name}}" maxlength = "100" placeholder="Nombre Completo" required></td>
                                <td class="tds"><input class="inputs" type="email" name="correo" value="{{$use->email}}" maxlength="30" placeholder="Correo Electronico" required></td>
                                <td class="tds"><input class="inputs" type="text" name="telefono" value="{{$use->telefono}}"  maxlength="10" placeholder="Telefono" required></td>
                                <td class="tds"><input class="inputs" type="password" name="contra" maxlength="40" placeholder="Contraseña" required></td>
                                <td class="tds"><select name="tipo" required>
                                    @if($use->rol == 'Administrador')
                                        <option value="Administrador" selected>Administrador</option>
                                        <option value="Personal">Personal</option>
                                        <option value="Padre">Padre</option>
                                    @else
                                    <option value="Administrador" >Administrador</option>
                                    <option value="Personal" selected>Personal</option>
                                    @endif
                                </select></td>
                            </tr>
                            <input type="hidden" name="id" value="{{$id}}">
                        @endforeach
                        
            
                    </table>
                    <button id="aceptar" name="aceptar" type="submit"><b>Editar Usuario</b></button>
                </form>
            </fieldset>
</div>
</body>
@include('Menus.footer')
</html>