@include('Menus.menuAdmin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>
<title>Alta Alumnos</title>
<div class="contenido">
    <fieldset>
        <legend>Alta Usuario Administrativo</legend>
        @if(session()->has('message')) 
            {{ session()->get('message') }} 
        @endif 
        <form role="form" name="form" method="post" action="{{ url('/Altas/Usuario/altaAlumnoAdmin') }}">
            {!! csrf_field() !!}
                    <table border="1" id="tab" style="display:inline-block;">
                        <tr id="cabecera">
                            <td class="tds">Nombre Completo</td>
                            <td class="tds">Correo Electronico</td>
                            <td class="tds">Telefono</td>
                            <td class="tds">Contraseña</td>
                            <td class="tds">Tipo</td>
                            <td class="tds">Eliminar</td>
                        </tr>
                        <tr>
                            <td class="tds"><input class="inputs" type="text" name="nombre[]" maxlength = "100" placeholder="Nombre Completo" required></td>
                            <td class="tds"><input class="inputs" type="email" name="correo[]" maxlength="30" placeholder="Correo Electronico" required></td>
                            <td class="tds"><input class="inputs" type="text" name="telefono[]" maxlength="10" placeholder="Telefono" required></td>
                            <td class="tds"><input class="inputs" type="password" name="contra[]" maxlength="40" placeholder="Contraseña" required></td>
                            <td class="tds"><select name="tipo[]" required>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Personal">Personal</option>
                            </select></td>
                            <td class="tds"><input class="inputs" type="reset" class="noEliminar" value="Eliminar" /></td>
                        </tr>
            
                    </table>
                    <button id="add" type="button" ><b>Añadir registro</b></button>
                    <button id="aceptar" name="aceptar" type="submit"><b>Insertar registros</b></button>
                </form>
            </fieldset>
</div>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/tablaUsuarioAdmin.js') }}"></script>
</body>
@include('Menus.footer')
</html>