<?php

class Database{

	private $config;
	private $driver;
	private $dataset;
	private $results;


	function __construct(){
		$this->config = new Config();
		$this->driver = new $this->config->dbDriver($this->config);
	}
	
	function executeQuery($query){
		$this->dataset = null;
		$this->driver->connect();
		$this->dataset = $this->driver->executeQuery($query);
		return $this->dataset;
	}

	function connectionClose(){
		 $this->driver->close();
	}
	
	function getQueryResultFetchArray(){
		return $this->driver->getFetchArray($this->dataset);
	}
	
	function getQueryResultAssocArray(){
		return $this->driver->getFetchAssoc($this->dataset);
	}
		
	function getQueryAffectedRows(){
		return $this->driver->getAffectedRows();
	}
	
    function setRealEscapeString($unescaped_string){
		return $this->driver->getEscapedString($unescaped_string);
	}
	
	public function getLastInsertId(){
		return $this->driver->getLastInsertId();
	}
	
    function getNextInsertId($table){
		return $this->driver->getNextInsertId($table);
	}
	
	function getDriver(){
		return $this->driver;
	}
	
	function getResultCount(){
		$resultCount = $this->driver->getResultCount($this->dataset);
		return $resultCount;
	}
	
	function getQueryResult(){
		$resultCount = $this->driver->getResultCount($this->dataset);
		$this->driver->close();
		return $this->dataset;
	}
}
?>