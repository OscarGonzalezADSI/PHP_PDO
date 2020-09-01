<?php

include "Connection.php";
include "TableRowsW3S.php";

class PDOSelectSTMT {
	public function action($dbname, $SqlSelect) {
		$origen = new Connection();
		$conn = $origen->ActionIntroBase($dbname);
		//$stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
		$stmt = $conn->prepare($SqlSelect);
		$stmt->execute();

		// set the resulting array to associative
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		$Rows = new RecursiveArrayIterator($result);
		$Recorrer = new TableRowsW3S($Rows);
		foreach($Recorrer as $k=>$v) {
			echo $v;
		}
		$conn = null;
	}
}

?>