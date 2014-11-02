<?php

class String
{
    private $sqlQuery = "";

    function __construct()
    {
        $this->sqlQuery = "";
    }

    function append($queryStr)
    {
        $this->sqlQuery .= (string)$queryStr;
    }

    function trimRight($length)
    {
        $this->sqlQuery = substr($this->sqlQuery, 0, strlen($this->sqlQuery) - $length);
    }

    function __toString()
    {
        return $this->sqlQuery;
    }
}

?>