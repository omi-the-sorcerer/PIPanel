<form method="post" action="block">
	<input type="text" name="ip" id="ip"><br />
	<input type="submit" name="block" id="block" value="Bloquear">
</form>
<table border='0'>
	<tbody>
		<tr>
			<th colspan="2">IPS Bloqueadas</th>
		</tr>

		<? foreach(blockedip() as $i => $l):?>
			<tr>
				<td><?=$l?></td>
			</tr>
		<? endforeach?>
	</tbody>
</table>