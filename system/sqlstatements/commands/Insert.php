<?php
	class Insert extends SqlCommand{
		
		function __construct($model){
			parent::__construct();
						
			$this->addToQuery("INSERT INTO " . $model->getClassName() . "(");
			$this->addToQuery($this->getParameterString($model));
			$this->addToQuery(") VALUES(");
			$this->addToQuery($this->getValuesString($model));
			$this->addToQuery(");");
		}
		
		function getParameterString($model){
			$parameters = new String();
			foreach ($model->getFilledVariables() as $variableName){
				$parameters->append("`" . $variableName . "`, ");
			}
			if($parameters != ""){
				$parameters->trimRight(2);
			}
			return $parameters;
		}
		
		function getValuesString($model){
			$variables = new String();
			foreach ($model->getFilledVariables() as $variableName){
				$value = $this->utils->cleanUnescapedString($model->$variableName);
				$variables->append("'" . $value . "', ");
			}
			if($variables != ""){
				$variables->trimRight(2);
			}
			return $variables;
		}
	}
?>