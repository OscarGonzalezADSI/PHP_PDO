<?php

include "../Connection/PDOConnectionValidation.php";

try {
  $origen = new PDOConnectionValidation();
  $dbname ="pruebaw";
  $origen->action($dbname);
  $origen = null;
  echo "Conexion estable.";
} catch(PDOException $e) {
  echo "Conexion fallida: " . $e->getMessage();
}
?>






























