<?php

try{
	$Strconnection = 'mysql:host=localhost;dbname=powerbache';
	$pdo = new PDO ($Strconnection, 'root', '');
}
catch (PDOException $e) {
	$msg = 'ERREUR PDO dans ' . $e->getMessage();
	die ($msg);
}

?>