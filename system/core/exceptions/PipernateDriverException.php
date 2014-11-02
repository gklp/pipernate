<?php
require_once 'PipernateException.php';

class PipernateDriverException extends PipernateException
{

    private $error = Array(
        9000 => "Unknown exception",
        9004 => "Driver not found expection,choose connection driver.",
        9005 => "Wrong driver name expection,choose right driver name.",
    );

    public function __construct($errorCode = 9000)
    {
        parent::__construct($this->error[$errorCode], $errorCode);
    }
}

?>