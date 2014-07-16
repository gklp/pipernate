<?php	
	class Select extends SqlCommand{
		private $selectStructure = "SELECT";
		public function __construct($criteria){
			parent::__construct($criteria);
			$this->addToQuery("SELECT ");
			if($this->criteria->getFieldsObject() != null){
				$this->addToQuery($this->criteria->getFieldsObject()->getFieldsString());
			}elseif($this->criteria->getDistinctObject() != null){
				$this->addToQuery($this->criteria->getDistinctObject()->getDistinctString());
			}elseif($this->criteria->getCountObject() != null){
				$this->addToQuery($this->criteria->getCountObject()->getCountString());
			}elseif($this->criteria->getSumObject() != null){
				$this->addToQuery($this->criteria->getSumObject()->getSumString());
			}else{
				$this->addToQuery(" *");
			}
			$this->addToQuery(" FROM " . $this->criteria->getModel()->getClassName());
			
			parent::addWhereTail();
			parent::addOrderTail();
			parent::addLimitTail();
			
			$this->addToQuery(";");
		}
	}
?>