<?php 
require_once 'templates/open-document.inc.php';
require_once 'templates/nav.inc.php';
require_once 'app/conect-example.inc.php';
ConectExample::openConect();
$conection = ConectExample::getConect();
$sql_read = 'SELECT * FROM tasks';
$read = $conection -> prepare($sql_read);
$read -> execute();
$result = $read -> fetchAll();

if (isset($_GET['id'])) {
	$id = $_GET['id']; 
	$sql_unique = "SELECT * FROM tasks WHERE id=:id";
	$sentencia = $conection -> prepare($sql_unique);
	$sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
	$sentencia -> execute();
	$result_unique = $sentencia -> fetch();
}

ConectExample::closeConect();

?> 

<div class="row">
	<div class="column side"><!-- -->
		<div id="sign">
			<h2>Welcome</h2>
			<p>This app will help you make and manage a "to-do" list <!--please for a better experience sign up for a free account since this is just an example-->. </p>
			<hr>
			<!--<p id="go">
				<button id="signup" href="#">Sign up</button>
			</p>-->
		</div>
	</div>
	<div class="column main">
		<table class="table" style="width: 100%;">
		  <tr>
		  	<th style="border: none;"></th>
		  	<th style="border: none;"></th>
		  	<th style="border: none;"></th>
		  	<th style="border: none;">
		  		<h3>
		  			<?php 
		  			if (!isset($_GET['id'])) {
		  				echo "NEW TASK";
		  			} else {
		  				echo "EDIT TASK  " . $_GET['id'];
		  			}
		  		 	?>			
	  		 	</h3>
		  	</th>
		  	<th style="border: none;"></th>
		  </tr>
		 	<?php if(isset($_GET['id'])){
		 		require_once 'templates/edit-task-form.inc.php';
		 	} else {
		 		require_once 'templates/empty-task-form.inc.php';
		 	}
		 	?>
		  <tr>
		  	<th>ID</th>
		    <th>Status</th>
		    <th>Person</th> 
		    <th>Description</th>
		    <th></th>
		  </tr>
		  <?php foreach ($result as $data):?>
			<tr>
				<?php
			    $color = '';
				$stat = '';
				switch ($data['status']) {
					case 1:
						$color = 'green'; 
						$stat = 'Done'; 
						break;
					case 2:
						$color = 'yellow'; 
						$stat = 'Pending';
						break;
					case 3:
						$color = 'red'; 
						$stat = 'Stagnat';
						break;
				}
				?>
			    	<td style="width: 6px"><?php echo $data['id']; ?></td>
			    	<td style="width: 26px"><i class="fas fa-circle" style="color: <?php echo $color;?>"><?php echo $stat ?></i></td>
					<td  style="width: 26px"><?php echo $data['person']; ?></td> 
					<td><?php echo $data['description']; ?></td>
					<td  style="width: 22px">
						<a href="index.php?id=<?php echo $data['id'] ?>">
							<i class="fas fa-edit" style="color: blue; font-size: 1.5em; margin-right: 5px;"></i>
						</a>edit
						<a href="controler/delete.php?id=<?php echo $data['id'] ?>">
							<i class="far fa-trash-alt" style="color: red; font-size: 1.5em;"></i>
						</a>delete
					</td>
			</tr>	
		  <?php endforeach; ?>
		</table>
	</div>
</div>


<?php require_once 'templates/close-document.inc.php'; ?>