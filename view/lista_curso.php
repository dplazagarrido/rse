
<table class="table" width="50%">
	<tr>
		<td>Nombre curso</td>
		<td>Grado</td>
		<td>Cantidad Alumnos</td>
		<td></td>
		<td></td>
		

	</tr>
	<?php foreach($this->model_cur->Listar() as $row): ?>
	<tr>
		<td><?php echo $row->nombre ?></td>
		<td><?php echo $row->grado ?></td>
		<td><?php echo $row->cantidadAlumnos ?></td>

		<td><a href="?c=Curso&a=Modificar&idCurso=<?php echo $row->idCurso ?>">Modificar</a></td>
		<td><a href="?c=Curso&a=Borrar&idCurso=<?php echo $row->idCurso ?>">Eliminar</a></td>

	</tr>	
	<?php endforeach; ?>
</table>