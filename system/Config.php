<?php

class Config
{

    public $dbDriver = "MysqlDriver";
    public $dburl = "localhost";
    public $dbusername = "root";
    public $dbpassword = "";
    public $dbname = "rock_survey";
    public $dbCharset = "UTF8";

    function __construct()
    {
        if (!empty($this->dbDriver)) {
            switch ($this->dbDriver) {
                case "MysqlDriver":
                    require_once DRIVER_PATH . $this->dbDriver . ".php";
                    break;
                case "OracleDriver":
                    require_once DRIVER_PATH . $this->dbDriver . ".php";
                    break;
                default:
                    throw new PipernateDriverException(9005);
                    break;
            }
        } else {
            throw new PipernateDriverException(9004);
        }
    }
}

?>