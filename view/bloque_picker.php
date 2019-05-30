<?php /* foreach($this->model_res->GetLast() as $row): ?>
	<p>Fecha:<?php echo $res->fecha?> </p>
	<p>IdUsuario:<?php echo $res->idUsuario?> </p>
	<p>IdCurso:<?php echo $res->idCurso?></p>
	<p>idReserva:<?php echo $row->idReserva?></p>
	<p>IdLaboratorio:<?php echo $res->idLaboratorio?></p>
	<p>TipoReserva:<?php echo $res->tipojornada?></p>
<?php endforeach ?>

<?php*/ 

?>

	<table class="table table-hover">
		<tr>
			<td>Numero bloque</td>
			<td>Hora inicio</td>
			<td>Hora termino</td>
			<td>Fecha</td>
			<td>Id bloque</td>
			<td>Acción</td>
		</tr>
		<?php foreach($this->model_res->ListarEspecificos($res->fecha, $res->tipojornada) as $row): ?>
		<tr>
			<td><?php echo $row->numerobloque ?></td>
			<td><?php echo $row->horaInicio ?></td>
			<td><?php echo $row->horaTermino ?></td>
			<td><?php echo $row->fecha ?></td>
			<td><?php echo $row->idBloque ?></td>
			<td><a href="?c=Reserva&a=Guardar&idBloque=<?php echo $row->idBloque ?>">Agregar</a></td>
		</tr>	
		<?php endforeach; ?>
	</table>

