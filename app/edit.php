<?php

require_once 'conect-example.inc.php';
ConectExample::openConect();
$conection = ConectExample::getConect();

if(isset($_GET)) {
	try {
		$person = $_GET['person'];
		$description = $_GET['description'];
		$id = $_GET['id'];
		switch ($_GET['status']) {
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
		$sql = 'UPDATE tasks SET status=:status, person=:person, description=:description where id = :id';
		$sentencia = $conection -> prepare($sql);
		$sentencia -> bindParam(':status', $status, PDO::PARAM_STR);
		$sentencia -> bindParam(':person', $person, PDO::PARAM_STR);
		$sentencia -> bindParam(':description', $description, PDO::PARAM_STR);
		$sentencia -> bindParam(':id', $id, PDO::PARAM_STR);

		$edit = $sentencia -> execute();
	} catch (PDOException $ex) {
		print 'ERROR'. $ex -> getMessage();
	}
}

header('location:../index.php');