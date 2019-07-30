<?php

class ConectExample {
	private static $conect;

	public static function openConect() {
		if(!isset(self::$conect)){
			try {
				require_once 'config.inc.php';
				self::$conect = new PDO($link, $user, $password);
			} catch (PDOException $ex) {
				print 'Data Base connection failed' . $ex -> getMessage() . "<br>";
			}
		}
	}

	public static function closeConect() {
		if(isset(self::$conect)){
			self::$conect = null;
		}
	}

	public static function getConect() {
		return self::$conect;
	}
}