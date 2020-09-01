<?php

include "../Connection/Connection.php";

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pruebaw2";

try {
  $conn = new Connection();
  $SqlUpdate = "DELETE FROM MyGuestsok WHERE id=1";
  $conn->ActionUpdate($dbname, $SqlUpdate);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>