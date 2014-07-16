<?php

class Config{
	
	public $dbDriver	= "MysqlDriver";
	public $dburl 		= "localhost";
	public $dbusername 	= "root";
	public $dbpassword 	= "";
	public $dbname 		= "";
	public $dbCharset	= "UTF8";
	
	private $driverPath = "core/drivers/";
	
	function __construct(){
		
	 if(!empty($this->dbDriver)){
	  if($this->dbDriver == "MysqlDriver" || $this->dbDriver == "OracleDriver"){
	 	switch ($this->dbDriver) {
			case "MysqlDriver":
				require_once $this->driverPath . "MysqlDriver.php";
				break;
			case "OracleDriver":
				require_once $this->driverPath . "OracleDriver.php";
				break;
			default:
				die("driver problem");
				break;
		}
	     }else{
	   	   throw new PipernateDriverException(9005);
	      } //name
	  }else{
	    throw new PipernateDriverException(9004);
	  }
	}
}
?>