<?php
	class Sum{
		
		private $column;
		private $alias;
		
		function getSumString(){
			$sumPattern = " SUM({sum}) AS {alias}";
			$sumString = new String();
			
			$alias = $this->column;
			if(!empty($this->alias)){
				$alias = $this->alias;
			}
			
			$sp = $sumPattern;
			$sp = str_replace("{sum}", $this->column, $sp);
			$sp = str_replace("{alias}", $alias, $sp);
			$sumString->append($sp);
			
			return $sumString;
		}
		
		function addSumClause($column, $alias){
			$this->column = $column;
			$this->alias = $alias;
		}
	}
?>