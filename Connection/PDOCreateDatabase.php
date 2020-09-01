<?php

include "Connection.php";

class PDOCreateDatabase extends Connection {
  public function action($base) {
	$origen = new Connection();
	$origen->ActionCreateBase($base);
	$origen = null;
  }
}

?>