<?php

include "Connection.php";

class PDOInsertSTMT extends Connection {
  public function action($base, $SqlInsert, $Data) {
	$origen = new Connection();
	$conn = $origen->InsertPrepared($base);
	$origen->PreparedAAA5($conn, $SqlInsert, $Data);
  }
}

?>