<h1>Modificar Curso</h1>
<form action="?c=Curso&a=Modifica" method="post">
<table>
<input type="hidden" name="txtidUsuario" value="<?php echo $cur->idCurso; ?>"/>
<tr>
	<td>Nombre Curso:</td><td><input type="text" name="txtnombre" value="<?php echo $cur->nombre; ?>" /></td>
</tr>
<tr>
	<td>Grado:</td><td><input type="text" name="txtgrado" value="<?php echo $cur->grado; ?>"/></td>
</tr>
<tr>
	<td>Cantidad alumnos:</td><td><input type="text" name="txtcantidadAlumnos" value="<?php echo $cur->cantidadAlumnos; ?>"/></td>
</tr>

<tr>
	<td></td><td><input type="submit" value="Modificar"/></td>
</tr>
</table>
</form>