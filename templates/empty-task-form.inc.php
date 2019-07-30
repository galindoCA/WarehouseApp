<form method="POST" action="app/create.php">
	<tr>
		<td></td>
		<td>
			<select name="status">
				<option value="done">Done</option>
				<option value="pending">Pending</option>
				<option value="stagnat">Stagnat</option>
			</select>
		</td>
		<td>
			<input type="text" name="person">
		</td>
		<td>
			<textarea name="description" rows="3" cols="60"></textarea>
		</td>
		<td>
			<button type="submit" name="guardar" style="none"><i class="fas fa-plus"></i></button>
		</td>
	</tr>
</form>