<?php
	class Delete extends SqlCommand{
		function __construct($criteria){
			parent::__construct($criteria);
			$this->addToQuery("DELETE FROM " . $this->getModel()->getClassName());
			parent::addWhereTail();
			$this->addToQuery(";");
		}
	}
?>