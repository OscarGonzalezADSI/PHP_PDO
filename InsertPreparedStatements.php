<?php
include "Connection.php";
$origen = new Connection();
try {
	$Sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES (:firstname, :lastname, :email)";
	$conn = $origen->InsertPrepared("myDBPDO", $Sql);
	
	$firstname = "qqqq";
	$lastname = "wwww";
	$email = "eeee";
	$origen->PreparedAAA($conn, $Sql, $firstname, $lastname, $email);
	
	echo "OK. Insert Prepared Statements.";
} catch(PDOException $e) {
	echo $SqlCreateTable . "<br>" . $e->getMessage();
}
$conn = null;
$origen = null;
?>