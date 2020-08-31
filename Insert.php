<?php
include "Connection.php";
$origen = new Connection();
try {
	$SqlCreateTable = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')";
	$origen->ActionCreateTable("myDBPDO", $SqlCreateTable);
	echo "New record created successfully";
} catch(PDOException $e) {
	echo $SqlCreateTable . "<br>" . $e->getMessage();
}
$conn = null;
?>