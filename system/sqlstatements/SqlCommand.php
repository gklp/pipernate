<?php
	class SqlCommand extends Criteria{
		
		protected $sqlQuery;
		protected $model;
		protected $criteria;
		protected $utils;
		
		public function __construct($criteria = null){
			$this->sqlQuery = new String();
			$this->criteria = $criteria;
			if($this->criteria != null){
				$this->model = $this->criteria->getModel();
			}
			$this->utils = new SqlCommandUtils();
		}
		
		protected function addWhereTail(){
			if($this->criteria->getWhereObject() != null){
				$this->sqlQuery->append($this->criteria->getWhereObject()->getWhereString());
			}
		}
		
		protected function addOrderTail(){
			if($this->criteria->getOrderObject() != null){
				$this->sqlQuery->append($this->criteria->getOrderObject()->getOrderString());
			}
		}
		
		protected function addLimitTail(){
			if($this->criteria->getLimitObject() != null){
				$this->sqlQuery->append($this->criteria->getLimitObject()->getLimitString());
			}
		}
		
		protected function addToQuery($adding){
			$this->sqlQuery->append($adding);
		}
		
		public function getSqlQuery(){
			return $this->sqlQuery;
		}
		
		public function getModel(){
			return $this->model;
		}
	
		public function getCriteria(){
			return $this->criteria;
		}
	}
?>