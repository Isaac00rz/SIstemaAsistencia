$("#add").click(function () {
    var tds = '<tr>';
    tds += '<td style="width: 7.0%; min-width: 7.0%;"><input type="text" name="nombre[]" maxlength = "100" placeholder="Nombre Completo" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 7.0%; min-width: 7.0%;"><input type="email" name="correo[]" maxlength="100" placeholder="Correo Electronico" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 7.0%; min-width: 7.0%;"><input type="text" name="telefono[]" maxlength="10" placeholder="Telefono" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 7.0%; min-width: 7.0%;"><input type="password" name="contra[]" maxlength="40" placeholder="Contraseña" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 7.0%; min-width: 7.0%;"><select name="tipo[]" required style="text-align: center; min-width: 100%; width:100%;">  <option value="Administrador">Administrador</option> <option value="Personal">Personal</option> </select></td>'
    tds += '<td style="width: 7.0%; min-width: 7.0%;"><input type="button" class="borrar" value="Eliminar" style="min-width: 100%; width:100%;"/></td>'
    tds += '</tr>';

    $("#tab").append(tds);
});

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});