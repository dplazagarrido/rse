<h1>Nuevo Usuario</h1>
<form action="?c=Usuario&a=Guardar" method="post">
<table class="table table-hover">


<tr>
	<td>Nombre completo</td><td><input type="text" name="txtnombreCompleto" /></td>
</tr>

<tr>
	<td>Apellido Paterno</td><td><input type="text" name="txtapellidoPaterno" /></td>
</tr>

<tr>
	<td>Apellido Materno</td><td><input type="text" name="txtapellidoMaterno" /></td>
</tr>

<tr>
	<td>Correo electronico</td><td><input type="email" name="txtcorreo" /></td>
</tr>

<tr>
	<td>Especialidad</td><td><select class="custom-select" id="txtespecialidad" name="txtespecialidad" >
		<option value="0" selected="">Seleccione especialidad</option>
				<?php foreach($this->model_usu->ListarEspecialidad() as $row): ?>
					<option value="<?php echo $row->idEspecialidad?>"><?php echo $row->Descripcion?></option>
				<?php endforeach?>
		</select>
	</td>
</tr>
<tr>
	<td>Cuenta</td><td><input type="text" name="txtcuenta" /></td>
</tr>

<tr>
	<td>Password</td><td><input type="text" name="txtpassword" /></td>
</tr>
<tr>
	<td></td><td><input type="submit" value="Grabar"/></td>
</tr>
</table>
</form>