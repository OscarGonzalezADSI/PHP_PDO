<?php
include "Connection.php";
  $origen = new Connection();
try {
  $origen->ActionIntroBase();
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

/**/

?>