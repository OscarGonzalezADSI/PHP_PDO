<?php

class Connection {
	private $motor;	
    private $servername;
    private $dbname;
    private $formatPDO;
    private $username;
    private $password;
	private $sql;
	private $Data;
	
    public function __construct() {
		$this->motor = "mysql";
		$this->servername = "host=localhost";
		$this->dbname = "dbname=myDBPDO";
		$this->username = "root";
		$this->password = "";
    }
//----------------------------------------------------------------------------------------
    //Formato para acceder a la base de datos por defecto	
	public function IntroBase() {
		return $this->formatPDO = "{$this->motor}".":".
							      "{$this->servername}".";".
							      "{$this->dbname}"; 
	}
	//Formato para validar la existencia de una base de datos	
	public function IntroBaseEspecific($dbname) {
		$this->dbname = "dbname=$dbname";
		return $this->formatPDO = "{$this->motor}".":".
							      "{$this->servername}".";".
							      "{$this->dbname}"; 
	}
    //Formato para acceder al servidor
	public function IntroHost() {
		return $this->formatPDO = "{$this->motor}".":".
							      "{$this->servername}"; 
	}	
	/** --------------------------------------------------------------------------------------
	 *  validar la existencia de una base de datos
	 *  --------------------------------------------------------------------------------------*/
	public function ActionIntroBase($dbname) {
		$this->dbname = $this->IntroBaseEspecific($dbname);
		$conn = new PDO("{$this->dbname}","{$this->username}","{$this->password}");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	public function ActionIntroHost() {
		$this->dbname = $this->IntroHost();	// Requiere acceso total // $this->IntroHost()
		$conn = new PDO("{$this->dbname}","{$this->username}","{$this->password}");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	/** --------------------------------------------------------------------------------------
	 *  Crear base de datos
	 *  --------------------------------------------------------------------------------------*/
	public function ActionCreateBase($dbname) {
		$conn = $this->ActionIntroHost();
		$this->dbname = $dbname;
		$sql = "CREATE DATABASE " . "{$this->dbname}";
		$conn->exec($sql);
		$conn = null;	
	}
	/** --------------------------------------------------------------------------------------
	 *  Crear tablas
	 *  --------------------------------------------------------------------------------------*/
	public function ActionCreateTable($dbname, $SqlCreateTable) {
		$this->dbname = $dbname;
		$this->sql = $SqlCreateTable;
		$conn = $this->ActionIntroBase("{$this->dbname}");
		$conn->exec("{$this->sql}");
		$conn = null;
	}  
	/** --------------------------------------------------------------------------------------
	 *  Update - Delete - poseen el mismo cuerpo
	 *  --------------------------------------------------------------------------------------*/
	public function ActionUpdate($dbname, $SqlUpdate) {

		$this->dbname = $dbname;
		$this->sql = $SqlUpdate;

		$conn = $this->ActionIntroBase("{$this->dbname}");
		$stmt = $conn->prepare("{$this->sql}");

		$stmt->execute();// execute the query

		// echo a message to say the UPDATE succeeded
		echo $stmt->rowCount() . " records UPDATED successfully";

		$conn = null;
	}  
	/** --------------------------------------------------------------------------------------
	 *  InsertPreparedSTMT
	 *  --------------------------------------------------------------------------------------*/
	public function InsertSTMT($dbname, $sql, $Data) {
		
		$this->dbname = $dbname;
		$this->sql = $sql;
		$this->Data = $Data;

		$conn = $this->ActionIntroBase("{$this->dbname}");
		$stmt = $conn->prepare("{$this->sql}");
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':email', $email);
		
		//insert a row
		for($i=0;count($this->Data)>$i;$i++){
			$firstname = $Data[$i][0];
			$lastname = $Data[$i][1];
			$email = $Data[$i][2];
			$stmt->execute();		
		}
		
		$conn = null;
	}
}
?>

































