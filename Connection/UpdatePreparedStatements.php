<?php
include "Connection.php";

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
  $conn = new Connection();
  //$SqlUpdate = "UPDATE MyGuests SET lastname='rrrrr' WHERE id=2";
  $SqlUpdate = "DELETE FROM MyGuests WHERE id>3";
  $conn->ActionUpdate($dbname, $SqlUpdate);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>



































