<?php

include "Connection.php";

class PDOCreateTable extends Connection {
  public function action($base, $SqlCreateTable) {
	$origen = new Connection();
	$origen->ActionCreateTable($base, $SqlCreateTable);
	$conn = null;
  }
}

?>