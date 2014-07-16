<?php
require_once 'PipernateException.php';

class PipernateDatabaseException extends PipernateException {
 	
 	private $error = Array(
 		9000 => "Unknown exception",
 		9015 => "Couldn't connect to database. Check your Config.php file",
 		9016 => "Couldn't select database name. Check your Config.php file",
 		9017 => "Couldn't execute query.",
 		9018 => "Couldn't get result count. There can be a query error.",
 		9005 => "Wrong driver name expection,choose right driver name."
 	);
 	
 	public function __construct($errorCode = 9000){
 		parent::__construct($this->error[$errorCode], $errorCode);
 	}
}
?>