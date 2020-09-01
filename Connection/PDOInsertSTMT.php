<?php

include "Connection.php";

class PDOInsertSTMT extends Connection {
  public function action($dbname, $SqlInsert, $Data) {
	$origen = new Connection();
	$origen->InsertSTMT($dbname, $SqlInsert, $Data);
  }
}

?>