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
 * Insert Prepared Statements
 */ 
  public function InsertPrepared($dbname, $Sql) {
	$origen = new Connection();
	$dbn = $origen->IntroBaseEspecific($dbname);
	return $respuesta = $origen->PreparedConn($dbn, $Sql);
  }

  public function PreparedConn($dbname) {
	$conn = new PDO($dbname,"{$this->username}","{$this->password}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $conn;
  }
   public function PreparedAAA($conn, $Sql, $firstname, $lastname, $email) {
    $stmt = $conn->prepare($Sql);
	$stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
	// insert a row
	$firstname = "John";
	$lastname = "Doe";
	$email = "john@example.com";
	$stmt->execute();
  }



  
}
?>

































