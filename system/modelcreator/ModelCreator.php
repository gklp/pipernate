<?php
	require_once '../Functions.php';
	require_once '../../modules/String.php';
	require_once '../core/drivers/interfaces/IDriver.php';
	requirePath('../core/drivers');
	require_once '../Config.php';
	require_once '../core/Database.php';
	require_once 'ModelFileBuilder.php';
	requirePath('../core/exceptions');
	
	class ModelCreator {
	
		private $tableNames = array();
		private $db;
		private $modelFileBuilder;
	
		public function ModelCreator(){
			$this->db = new Database();
			$this->modelFileBuilder = new ModelFileBuilder();
		}
	
		public function addTable($tableName){
			$this->tableNames[] = $tableName;
		}
	
		public function mapTables(){
			if(count($this->tableNames)>0){
				foreach($this->tableNames as $tableName){
					$dataset = $this->db->executeQuery('SELECT * FROM ' . $tableName . ' LIMIT 0 , 1');
					$columns = $this->db->getDriver()->getColumnNames($dataset);
					$this->modelFileBuilder->createModel($tableName, $columns);
				}
			}
			else{
				echo "Modellemek için tablo ekleyiniz.";
			}
		}
	
		public function mapDatabase(){
			$dataset = $this->db->executeQuery('SHOW TABLES');
			$this->tableNames = $this->db->getDriver()->getTableNames($dataset);
			$this->mapTables();
		}
	}
	
	$m = new ModelCreator();
	$m->addTable("bookmark");
	$m->mapTables();
	//$m->mapDatabase();
	
?>