<?php
include "../Connection/PDOCreateTable.php";

$base = "pruebaw2";
$nameTable = "MyGuestsok";
$SqlCreateTable  = "CREATE TABLE ".$nameTable." (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					firstname VARCHAR(30) NOT NULL,
					lastname VARCHAR(30) NOT NULL,
					email VARCHAR(50),
					reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
					)";
try {
  $origen = new PDOCreateTable();
  $origen->action($base, $SqlCreateTable);
  $origen = null;
  echo "Se creo la tabla " . $nameTable . " base de datos: " . $base;
} catch(PDOException $e) {
  echo "Create failed: ";
  echo $SqlCreateTable;
  echo $e->getMessage();
}

?>




























