<?php

class MySqlDriver implements IDriver{

	private $connection;
	private $config;

	public function __construct($config){
		$this->config = $config;
	}

	public function connect(){
		$this->connection = @mysql_connect($this->config->dburl, $this->config->dbusername,$this->config->dbpassword);
		if (!$this->connection){
			throw new PipernateDatabaseException(9015);
		}
		$this->selectDatabase();
	}
	
	public function selectDatabase(){
		if (!@mysql_select_db($this->config->dbname, $this->connection)){
			throw new PipernateDatabaseException(9016);
		}
		$this->executeQuery("SET NAMES '" . $this->config->dbCharset . "'");
	}
	
	public function executeQuery($query){
		$queryResult = @mysql_query($query);
		if(!$queryResult){
			throw new PipernateDatabaseException(9017);
		}
		return $queryResult;
	}
	
	public function getResultCount($dataset){
		$numRows = @mysql_num_rows($dataset);
		return $numRows;
	}
	
	public function getCellValue($dataset, $i, $columnName){
		try{
			return @mysql_result($dataset, $i, $columnName);
		}catch (exception $e){
			die("{$e->getMessage()}");
		}
	}
	
	public function getFetchAssoc($dataset){
		try{
			return @mysql_fetch_assoc($dataset);
		}
		catch (exception $e){
			die("{$e->getMessage()}");
		}
	}
	
	public function getFetchArray($dataset){
		try{
			return @mysql_fetch_array($dataset);
		}
		catch (exception $e){
			die("{$e->getMessage()}");
		}
	}

	public function getTableNames($dataset){
		$tableNames = array();
		while ($row = mysql_fetch_array($dataset, MYSQL_NUM)) {
			$tableNames[] = $row[0];
		}
		return $tableNames;
	}
	
	public function getColumnNames($dataset){
		try{
			$fieldNames = array();
			for($i=0; $i < @mysql_num_fields($dataset); $i++){
				$field = @mysql_fetch_field($dataset, $i);
				$fieldNames[] = $field->name;
			}
			return $fieldNames;
		}catch (exception $e){
			die("{$e->getMessage()}");
		}
	}
	
	public function getAffectedRows(){
		try{
			return @mysql_affected_rows($this->connection);
		}
		catch (exception $e){
			die("{$e->getMessage()}");
		}
	}
	
	public function getEscapedString($unescaped_string){
		try{
			return @mysql_real_escape_string($unescaped_string, $this->connection);
		}
		catch (exception $e){
			die("{$e->getMessage()}");
		}
	}
	
	public function getLastInsertId(){
		return mysql_insert_id();
	}
	
	public function getNextInsertId($table){
		try{
			$sql = " SELECT LAST_INSERT_ID() FROM $table ";
			return $this->getResultCount($this->executeQuery($sql));
		}
		catch (exception $e){
			die("{$e->getMessage()}");
		}
	}
	
	public function close(){
		try{
			@mysql_close($this->connection);
		}catch (exception $e){
			die("{$e->getMessage()}");
		}
	}
}

?>