<?php
	class ModelFileBuilder{
		private $tablename;
		private $columns;
		public function __construct(){
			
		}
		
		public function createModel($tableName, $columns){
			$this->tablename 	= $tableName;
			$this->columns		= $columns;
			
			$modelString = $this->createModelString($this->columns);
			$this->createModelFile($modelString);
		}
		
		private function createModelFile($modelString){
			$file = '../../models/' . $this->tablename . '.php';
			$handle = fopen($file, 'w');
			$data = $modelString;
			fwrite($handle, $data);
			fclose($handle);
			print "Model olusturuldu: <b>" . $this->tablename . "</b><br>";
		}
		
		private function createModelString($columns){
			$modelString = new String();
	
			$modelString->append('<?php');
			$modelString->append("\r\n");
			$modelString->append("\t" . 'class ' . $this->tablename . ' extends Model{');
			$modelString->append("\r\n\r\n");
	
			foreach($columns as $column){
				$modelString->append("\t\t");
				$modelString->append('public $' . $column . ';');
				$modelString->append("\r\n");
			}
			$modelString->append("\r\n");
			$modelString->append("\t\t");
			$modelString->append('function ' . $this->tablename . '(){');
			$modelString->append("\r\n");
			$modelString->append("\t\t\t");
			$modelString->append('parent::Model();');
			$modelString->append("\r\n");
			$modelString->append("\t\t");
			$modelString->append('}');
			$modelString->append("\r\n");
			$modelString->append("\t");
			$modelString->append('}');
			$modelString->append("\r\n");
			$modelString->append('?>');
			return $modelString;
		}
	}
?>