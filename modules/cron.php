<div id="prog">
	<? if(empty($editid)):?>
		<?=$whilecron->whiledatos()?>
		<form method='post' action='addcron'><input type='submit' value='+' name='add' /></form>
	<? else:?>
		<?=$editcron->recojerdatos("##".$editid)?>
		<h2>Recuerda que la ID tiene que comenzar con ##</h2>
		<table border="0">
			<tbody>
				<tr>
					<th>ID</th>
					<th>Minuto</th>
					<th>Hora</th>
					<th>Dia del mes</th>
					<th>Mes</th>
					<th>Dia de la semana</th>
					<th>Comando</th>
					<th>Accion</th>
				</tr>
				<tr>
					<form method="post" action="../editcron">
						<td><input type="text" name="id" id="id" value='<?=$editcron->id?>'></td>
						<td><input type="text" name='m' id='m' size="2" value="<?=$editcron->m?>"></td>
						<td><input type="text" name='h' id='h' size="2" value="<?=$editcron->h?>"></td>
						<td><input type="text" name='monthday' id='monthday' size="2" value="<?=$editcron->monthday?>"></td>
						<td><input type="text" name='month' id='month' size="2" value="<?=$editcron->month?>"></td>
						<td><input type="text" name='weekday' id='weekday' size="2" value="<?=$editcron->weekday?>"></td>
						<td><input type="text" name="command" id="command" size="40" value='<?=$editcron->command?>'></td>
						<td><input type="hidden" value="<?=$editcron->id?>" name="lastid" ><input type="submit" name="guardar" id="guardar" value="Guardar" /></td>
					</form>
				</tr>
			</tbody>
		</table>
	<? endif?>
</div>
