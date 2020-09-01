<?php
include "../Connection/Connection.php";

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pruebaw2";

try {
  $conn = new Connection();
  $SqlUpdate = "UPDATE MyGuestsok SET lastname='hhh' WHERE id=2";
  $conn->ActionUpdate($dbname, $SqlUpdate);
} catch(PDOException $e) {
  echo $SqlUpdate . "<br>" . $e->getMessage();
}

$conn = null;
?>



































