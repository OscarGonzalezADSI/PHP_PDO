<?php

include "../Connection/PDOInsertSTMT.php";

$origen = new PDOInsertSTMT();

$base = "pruebaw2";

$SqlInsertPrepared = "INSERT INTO MyGuestsok (firstname, lastname, email)
									VALUES (:firstname, :lastname, :email)";
$firstname = "oscar";
$lastname = "wwww";
$email = "eeee";

$Data =[
   [$firstname, $lastname, $email],
   ["jorge","buitrago","ddd@eee.com"]
];
	
try {
	$origen->action($base, $SqlInsertPrepared, $Data);
	$origen = null;
	echo "OK. Insert Prepared Statements.";
} catch(PDOException $e) {
	echo $SqlInsert . "<br>" . $e->getMessage();
}
?>