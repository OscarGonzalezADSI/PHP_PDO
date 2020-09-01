<?php

include "../Connection/PDOConnectionValidation.php";

try {
  $origen = new PDOConnectionValidation();
  $origen->action();
  $origen = null;
  echo "Conexion estable.";
} catch(PDOException $e) {
  echo "Conexion fallida: " . $e->getMessage();
}
?>






























