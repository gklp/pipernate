<?php
class Criteria extends CriteriaBase{
	public function __construct($model = null){
		CriteriaBase::__construct($model);
	}

	public function where($column, $value){
		if(empty($column) || !isset($value)){
			throw new PipernateIllegalArgumentException(9006);
		}else{
			if($this->whereObject == null){
				$this->whereObject = new Where();
			}
			$this->whereObject->addWhereClause($column, $value);
		}
	}

	public function limit($limitFrom, $limitCount){
		if(!isset($limitFrom) || !isset($limitCount)){
			throw new PipernateIllegalArgumentException(9007);
		}else{
			if($this->limitObject == null){
				$this->limitObject = new Limit();
			}
			$this->limitObject->addLimitClause($limitFrom, $limitCount);
		}
	}

	public function orderBy($column, $orderType = "ASC"){
		if(empty($column)){
			throw new PipernateIllegalArgumentException(9008);
		}else{
			if($this->orderObject == null){
				$this->orderObject = new Order();
			}
			$this->orderObject->addOrderClause($column, $orderType);
		}
	}

	public function distinct($column, $alias = null){
		if(empty($column)){
			throw new PipernateIllegalArgumentException(9009);
		} else{
			if($this->distinctObject == null){
				$this->distinctObject = new Distinct();
			}
			$this->distinctObject->addDistinctClause($column, $alias);
		}
	}

	public function count($column, $alias = null){
		if(empty($column)){
			throw new PipernateIllegalArgumentException(9010);
		} else{
			if($this->countObject == null){
				$this->countObject = new Count();
			}
			$this->countObject->addCountClause($column, $alias);
		}
	}

	public function sum($column, $alias = null){
		if(empty($column)){
			throw new PipernateIllegalArgumentException(9011);
		} else{
			if($this->sumObject == null){
				$this->sumObject = new Sum();
			}
			$this->sumObject->addSumClause($column, $alias);
		}
	}

	public function fields($columns, $alias = null){
		if(empty($columns)){
			throw new PipernateIllegalArgumentException(9012);
		} else{
			if($this->fieldsObject == null){
				$this->fieldsObject = new Fields();
			}
			$this->fieldsObject->addFieldsClause($columns, $alias);
		}
	}

	public function in($columnName, $inParameters){
		if(empty($columnName) || empty($inParameters) ){
			throw new PipernateIllegalArgumentException(9013);
		}else{
			if($this->whereObject == null){
				$this->whereObject = new Where();
			}
			$this->whereObject->addInClause($columnName, $inParameters);
		}
	}

	public function like($columnName, $likeParameter){
		if(empty($columnName) || empty($likeParameter) ){
			throw new PipernateIllegalArgumentException(9014);
		}else{
			if($this->whereObject == null){
				$this->whereObject = new Where();
			}
			$this->whereObject->addLikeClause($columnName, $likeParameter);
		}
	}

	public function asModel(){
		parent::setReturnType(ReturnType::AsModel);
	}

	public function asArray(){
		parent::setReturnType(ReturnType::AsArray);
	}
	
	public function returnInsertId(){
		parent::$returnInsertId = true;
	}
}
?>