<?php

class PipernateModelException extends PipernateException
{

    private $error = Array(
        9000 => "Unknown exception",
        9001 => "Model not found expection.",
        9002 => "Model Class not found expection."
    );

    public function __construct($errorCode = 9000)
    {
        parent::__construct($this->error[$errorCode], $errorCode);
    }
}

?>