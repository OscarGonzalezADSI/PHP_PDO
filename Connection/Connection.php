<?php

class Connection {
	private $motor;	
    private $servername;
    private $dbname;
    private $formatPDO;
    private $username;
    private $password;
	private $sql;
	
  public function __construct() {
	$this->motor = "mysql";
	$this->servername = "host=localhost";
	$this->dbname = "dbname=myDBPDO";
    $this->username = "root";
    $this->password = "";
  }



 
 /**
  * Validar existencia de base de datos
  */ 
  public function ActionIntroBase() {
	$conn = new PDO("{$this->IntroBase()}","{$this->username}","{$this->password}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn = null;// close Connection
  }
  public function IntroBase() {
      return $this->formatPDO = "{$this->motor}".":"."{$this->servername}".";"."{$this->dbname}"; 
  }




 /**
  * Crear base de datos
  */ 
  public function ActionIntroHost($dbname) {
	$conn = new PDO("{$this->IntroHost()}","{$this->username}","{$this->password}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$this->dbname = $dbname;
    $sql = "CREATE DATABASE " . "{$this->dbname}";
	$conn->exec($sql);
	$conn = null;	
  }
  public function IntroHost() {
      return $this->formatPDO = "{$this->motor}".":"."{$this->servername}"; 
  }




/**
 * Formato especifico
 */ 
  public function IntroBaseEspecific($dbname) {
	  $this->dbname = "dbname=$dbname";
      return $this->formatPDO = "{$this->motor}".":".
								"{$this->servername}".";".
								"{$this->dbname}"; 
  }




/**
 * Crear tablas
 */ 
  public function ActionCreateTable($dbname, $SqlCreateTable) {
	$origen = new Connection();
	$dbn = $origen->IntroBaseEspecific($dbname);
	$origen->CreateTable($dbn, $SqlCreateTable);
  }
  public function CreateTable($dbname, $SqlCreateTable) {
	$conn = new PDO($dbname,"{$this->username}","{$this->password}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec($SqlCreateTable);
	$conn = null;
  }

/**
 * Update
 */ 
  public function ActionUpdate($dbname, $SqlUpdate) {
	$origen = new Connection();
	$dbn = $origen->IntroBaseEspecific($dbname);
	$origen->UpdateExecute($dbn, $SqlUpdate);
  }
  
  public function UpdateExecute($dbn, $SqlUpdate) {
	$conn = new PDO($dbn,"{$this->username}","{$this->password}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Prepare statement
	$stmt = $conn->prepare($SqlUpdate);

	// execute the query
	$stmt->execute();

	// echo a message to say the UPDATE succeeded
	echo $stmt->rowCount() . " records UPDATED successfully";
	$conn = null;
  }



/**
 * Insert Prepared Statements
 */ 
  public function InsertPrepared($dbname) {
	$origen = new Connection();
	$dbn = $origen->IntroBaseEspecific($dbname);
	return $respuesta = $origen->PreparedConn($dbn);
  }

  public function PreparedConn($dbname) {
	$conn = new PDO($dbname,"{$this->username}","{$this->password}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $conn;
  }

   public function PreparedAAA($conn, $Sql, $firstnameR, $lastnameR, $emailR) {
    $stmt = $conn->prepare($Sql);
	$stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
	//insert a row
	$firstname = $firstnameR;
	$lastname = $lastnameR;
	$email = $emailR;
	$stmt->execute();
  }

   public function PreparedAAA5($conn, $Sql, $Data) {
    $stmt = $conn->prepare($Sql);
	$stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
	//insert a row
	for($i=0;count($Data)>$i;$i++){
		$firstname = $Data[$i][0];
		$lastname = $Data[$i][1];
		$email = $Data[$i][2];
		$stmt->execute();		
	}
	$stmt = null;
	$Sql = null;
	$Data = null;
	$conn = null;
  }
}

?>

































