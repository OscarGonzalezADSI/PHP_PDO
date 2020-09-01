<?php
include "../Connection/PDOInsertSTMT.php";

try {
    $base = "myDBPDO";
	
    $SqlInsertPrepared = "INSERT INTO MyGuests (firstname, lastname, email)
                                        VALUES (:firstname, :lastname, :email)";
	$firstname = "oscar";
	$lastname = "wwww";
	$email = "eeee";
	
	$Data =[
	   [$firstname,$lastname,$email],
	   ["jorge","buitrago","ddd@eee.com"]
	];
	
	$origen = new PDOInsertSTMT();
	$origen->action($base, $SqlInsertPrepared, $Data);
	$origen = null;
	echo "OK. Insert Prepared Statements.";
} catch(PDOException $e) {
	echo $SqlInsert . "<br>" . $e->getMessage();
}
?>