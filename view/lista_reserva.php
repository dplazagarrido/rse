
<table  class="table table-hover">
	<tr>
		<td>Id Reserva</td>
		<td>Usuario</td>
		<td>Curso</td>
		<td>Laboratorio</td>
		<td>Tipo de Reserva</td>
		<td>Accion</td>		

	</tr>
	<?php foreach($this->model_res->ListaReservaDocente($res->idReserva) as $row): ?>
	<tr>
		<td><?php echo $row->idReserva ?></td>
		<td><?php echo $row->nombre ?></td>
		<td><?php echo $row->curso ?></td>
		<td><?php echo $row->laboratorio_idlaboratorio ?></td>
		<td><?php echo $row->descripcion ?></td>
		<td><a href="?c=Reserva&a=Borrar&idReserva=<?php echo $row->idReserva ?>">Eliminar</a>
	</tr>	
	<?php endforeach; ?>
</table>