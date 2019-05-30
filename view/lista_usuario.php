
<table  class="table table-bordered">
	<tr>
		<td>NombreCompleto</td>
		<td>Apellido Paterno</td>
		<td>Apellido Materno</td>
		<td>Especialidad</td>
		<td>Cuenta</td>
		<td>Password</td>
	    <td></td>
		<td></td>
	</tr>
	<?php foreach($this->model_usu->Listar() as $row): ?>
	<tr>
		<td><?php echo $row->nombreCompleto ?></td>
		<td><?php echo $row->apellidoPaterno ?></td>
		<td><?php echo $row->apellidoMaterno ?></td>
		<td><?php echo $row->descripcion ?></td>
		<td><?php echo $row->cuenta ?></td>
		<td><?php echo $row->password ?></td>
		<td><a href="?c=Usuario&a=Modificar&idUsuario=<?php echo $row->idUsuario ?>">Modificar</a></td>
		<td><a href="?c=Usuario&a=Borrar&idUsuario=<?php echo $row->idUsuario ?>">Eliminar</a></td>

	</tr>	
	<?php endforeach; ?>
</table>