<form method="GET" action="app/edit.php">
<td><?php echo $result_unique['id']; ?></td>
<td>
	<select name="status">
		<option value="done" <?php if ($result_unique['status'] == 1) echo "selected"; ?>>
			Done
		</option>
		<option value="pending" <?php if ($result_unique['status'] == 2) echo "selected"; ?>>
			Pending
		</option>
		<option value="stagnat" <?php if ($result_unique['status'] == 3) echo "selected"; ?>>
			Stagnat
		</option>
	</select>
</td>
<td>
	<input type="text" name="person" value="<?php echo $result_unique['person']; ?>">
</td>
<td>
	<textarea name="description" rows="3" cols="60">
		<?php echo nl2br($result_unique['description']); ?>
	</textarea>
	<input type="hidden" name="id" value="<?php echo $result_unique['id']; ?>">
</td>
<td>
	<button type="submit" name="guardar" style="none">
		<i class="fas fa-edit" style="color: blue; font-size: 1.5em; margin-right: 5px;"></i>
	</button>
</td>
</form>