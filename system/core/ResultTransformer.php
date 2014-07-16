<?php
	class pipernate_temporary_model{}

	class ResultTransformer{
		private $result = null;
		private $dataset = null;
		private $returnType = null;
		private $modelName = null;
		private $driver = null;
		
		function __construct(){
			
		}
		
		public function setData($data){
			$this->dataset = $data;
		}
		
		public function setReturnType($returnType){
			$this->returnType = $returnType;
		}
		
		public function setModelName($modelName){
			$this->modelName = $modelName;
		}
		
		public function setDriver($driver){
			$this->driver = $driver;
		}
		
		public function transformData(){
			$resultCount = $this->driver->getResultCount($this->dataset);
			if($this->returnType == ReturnType::AsArray){
				$this->transformAsNotModel($resultCount);
			}else{
				if($this->returnType == ReturnType::AsNone){
					$this->modelName = "pipernate_temporary_model";
				}
				$this->transformAsModel($resultCount);
			}
			return $this->result;
		}
		
		private function transformAsNotModel($resultCount){
			while($buffer = $this->driver->getFetchArray($this->dataset)){
				if($resultCount>1){
					$this->result[] = $buffer;
				}else{
					$this->result = $buffer;
				}
			}
		 }
		
		private function transformAsModel($resultCount){
			$this->result = new ArrayList();
//			if($resultCount > 1){
				for($i = 0; $i < $resultCount; $i++){
					$this->result->add($this->getTransformedModel($i));
				}
//			}else{
//				$this->result = $this->getTransformedModel(0);
//			}
		}
		
		private function getTransformedModel($queue){
			$tableInstance = new $this->modelName;
			foreach($this->driver->getColumnNames($this->dataset) as $fieldName){
				$tableInstance->$fieldName = $this->driver->getCellValue($this->dataset, $queue, $fieldName);
			}
			return $tableInstance;
		}
	}
?>