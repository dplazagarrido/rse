<h1>Nueva Reserva</h1>
<p> Su id de usuario es: <?php
  	if (isset($_SESSION['idUsuario']))
    	echo $_SESSION['idUsuario'];
  ?>
  </p>

  <?php ?>
<form action="?c=Reserva&a=Preparar" method="post">
<table class="table table-hover">
<td>Curso</td><td><select class="custom-select" id="txtcurso" name="txtcurso" >
		<option value="0" selected="">Seleccione Curso</option>
				<?php foreach($this->model_res->ListarCursos() as $row): ?>
							<option value="<?php echo $row->idCurso?>"><?php echo $row->grado?> <?php echo $row->nombre?></option>
							<?php endforeach?>
		</select>
</td>
<tr>
	<td>Fecha</td><td><input type="date" name="txtfecha" /></td>
</tr>
<tr>
	<?php /* ESTE CAMPO HIDDEN GUARDA EL ID DEL USUARIO PARA DESPUES SER ALMACENADO
	EN LA RESERVA, NO PUDE PASARLO PORQUE SOY TONTITO
	*/?>
	<input type="hidden" name="idusuario" value="<?= $_SESSION["idUsuario"]; ?>" >
</tr>
<tr>
	<td>Jornada</td><td><select id="txtjornada" name="txtjornada">
		<option value="1">Ma&ntilde;ana</option>
		<option value="2">Tarde</option>
	</select></td>
</tr>
<tr>
	<td>Tipo de reserva</td><td><select id="txttiporeserva" name="txttiporeserva">
		<option value="0" selected="">Seleccione para qu&eacute; utilizar&aacute; la sala: </option>
				<?php foreach($this->model_res->ListarTiposDeReserva() as $row): ?>
							<option value="<?php echo $row->idTipoReserva?>"><?php echo $row->descripcion?></option>
							<?php endforeach?>
		</select>
	</select></td>
</tr>
<tr>
	<td>Laboratorio</td><td><select id="txtlaboratorio" name="txtlaboratorio">
		<option value="0" selected="">Seleccione un laboratorio</option>
				<?php foreach($this->model_res->ListarLaboratorios() as $row): ?>
							<option value="<?php echo $row->idLaboratorio?>"><?php echo $row->idLaboratorio?></option>
							<?php endforeach?>
		</select>
	</select></td>
</tr>
<tr>
	<td></td><td><input type="submit" value="Seleccionar Bloques"/></td>
</tr>
</table>
</form>