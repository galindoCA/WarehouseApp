<?php

require_once 'conect-example.inc.php';
ConectExample::openConect();
$conection = ConectExample::getConect();

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	try {
		$sql = 'DELETE FROM tasks where id = :id';
		$sentencia = $conection -> prepare($sql);
		$sentencia -> bindParam(':id', $id, PDO::PARAM_STR);

		$delete = $sentencia -> execute();
	} catch (PDOException $ex) {
		print 'ERROR'. $ex -> getMessage();
	}
}

header('location:../index.php');