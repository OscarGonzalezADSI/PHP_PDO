<?php
include "Connection.php";
$origen = new Connection();
try {
	$SqlCreateTable = "CREATE TABLE MyGuests2 (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";
	$origen->ActionCreateTable("myDBPDO", $SqlCreateTable);
	echo "Table MyGuests created successfully";
} catch(PDOException $e) {
	echo $SqlCreateTable . "<br>" . $e->getMessage();
}
$conn = null;
?>