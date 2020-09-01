<?php

include "PDOSelectSTMT.php";

?>
<table style='border: solid 1px black;'>
<tr>
	<th>Id</th>
	<th>Firstname</th>
	<th>Lastname</th>
</tr>
<?php
$dbname = "myDBPDO";
$SqlSelect = "SELECT * FROM MyGuests";
try {
  $origen = new PDOSelectSTMT();
  $origen -> action($dbname, $SqlSelect);
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$origen = null;

?>
</table>