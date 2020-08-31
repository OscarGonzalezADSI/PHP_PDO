<?php
include "Connection.php";
$origen = new Connection();
try {
  $origen->ActionIntroHost("redredbullHHHH");
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>