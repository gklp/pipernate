<?php

class PipernateException extends Exception {
	 
	public function __construct($message, $code=NULL){
		parent::__construct($message, $code);
		set_exception_handler(array("PipernateException", "getPipernateException"));
	}

	public function __toString() {
		return ExceptionTemplate::GenericException($this);
	}

	public function getException(){
		print $this;
	}

	public static function getPipernateException($exception){
		$exception->getException();
	}
}
?>