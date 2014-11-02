<?php

require_once 'PipernateException.php';

class PipernateIllegalArgumentException extends PipernateException
{

    private $error = Array(
        9000 => "Unknown exception",
        9006 => "Where missing parameter exception,it gives two param",
        9007 => "Limit missing parameter exception,it gives two param",
        9008 => "Orderby missing parameter exception,it gives two param, these parameters
 		 are column and orderType, order type default value 'ASC', probably column not found.",
        9009 => "Distinc missing parameter exception,it gives two param, these parameters
 		 are column and alias, alias default value 'null', probably column not found.",
        9010 => "Count missing parameter exception,it gives two param, these parameters
 		 are column and alias, alias default value 'null', probably column not found.",
        9011 => "Sum missing parameter exception,it gives two param, these parameters
 		 are column and alias, alias default value 'null', probably column not found.",
        9012 => "Fields missing parameter exception,it gives two param, these parameters
 		 are columns and alias, alias default value 'null', probably columns not found.",
        9013 => "In missing parameter exception,it gives two param, these parameters
 		 are columnName and inParameters, these parameters not found",
        9014 => "Like missing parameter exception,it gives two param, these parameters
 		 are columnName and likeParameter, these parameters not found"
    );

    public function __construct($errorCode = 9000)
    {
        parent::__construct($this->error[$errorCode], $errorCode);
    }
}

?>