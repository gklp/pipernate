<?php
	
	class ArrayList{
		private $arrayList;
		
		public function __construct(){
			$this->arrayList = array();
		}
		
		public function add($object){
			array_push($this->arrayList, $object);
		}
		
		public function addAll($listToAdd){
			$this->arrayList = array_merge($this->arrayList, $listToAdd);
		}
		
		public function get($index){
			if($index < $this->size()){
				return $this->arrayList[$index];
			}
		}
		
		public function size(){
			return sizeof($this->arrayList);
		}
		
		public function truncate(){
			$this->arrayList = array();
		}
		
		public function asArray(){
			return $this->arrayList;
		}
	}
?>