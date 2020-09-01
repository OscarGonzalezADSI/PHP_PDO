<?php

include "Connection.php";

// solo para validar existencia de base de datos
class PDOConnectionValidation extends Connection {
  public function action($dbname) {
	$origen = new Connection();
	$origen->ActionIntroBase($dbname);
	$origen = null;
  }
}

?>