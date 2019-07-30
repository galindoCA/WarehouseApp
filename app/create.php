<?php 
require_once 'conect-example.inc.php';
ConectExample::openConect();
$conection = ConectExample::getConect();

if (isset($_POST['guardar'])) {
	try {
		switch ($_POST['status']) {
			case 'done':
				$status = 1;
				break;
			
			case 'pending':
				$status = 2;
				break;
			case 'stagnat':
				$status = 3;
				break;
			default:
				$status = 2;
				break;	
		}
		$person = $_POST['person'];
		$description = $_POST['description'];

		$sql_insert = 'INSERT INTO tasks(status, person, description) VALUES (:status, :person, :description)';
		$sentencia = $conection -> prepare($sql_insert);
		$sentencia -> bindParam(':status', $status, PDO::PARAM_STR);
		$sentencia -> bindParam(':person', $person, PDO::PARAM_STR);
		$sentencia -> bindParam(':description', $description, PDO::PARAM_STR);

		$insert_task = $sentencia -> execute();
		header('location:../index.php');
	} catch (PDOException $ex) {
		print 'ERROR' . $ex -> getMessage();
	}
}