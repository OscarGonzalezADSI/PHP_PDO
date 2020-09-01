<?php

class TableRowsW3S extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }
  function beginChildren(){
?>
<tr>
<?php
  }
  
  function current() {
?>
	<td style='width:150px;border:1px solid black;'><?php echo parent::current(); ?></td>
<?php 
  }

  function endChildren(){
?>
</tr>
<?php
  }
}

?>
