<h1>Modificar Usuario</h1>
<form action="?c=Usuario&a=Modifica" method="post">
<table>
<input type="hidden" name="txtidUsuario" value="<?php echo $usu->idUsuario; ?>"/>
<tr>
	<td>Nombre Completo</td><td><input type="text" name="txtnombreCompleto" value="<?php echo $usu->nombreCompleto; ?>" /></td>
</tr>
<tr>
	<td>Apellido Paterno</td><td><input type="text" name="txtapellidoPaterno" value="<?php echo $usu->apellidoPaterno; ?>"/></td>
</tr>
<tr>
	<td>Apellido Materno</td><td><input type="text" name="txtapellidoMaterno" value="<?php echo $usu->apellidoMaterno; ?>"/></td>
</tr>
<tr>
	<td>Especialidad</td><td><input type="text" name="txtespecialidad" value="<?php echo $usu->especialidad; ?>"/></td>
</tr>
<tr>
	<td>Cuenta</td><td><input type="text" name="txtcuenta" value="<?php echo $usu->cuenta; ?>"/></td>
</tr>
<tr>
	<td>Password</td><td><input type="text" name="txtpassword" value="<?php echo $usu->password; ?>"/></td>
</tr>
<tr>
	<td></td><td><input type="submit" value="Modificar"/></td>
</tr>
</table>
</form>