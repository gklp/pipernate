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

    function startsWith($needle)
    {
        $length = strlen($needle);
        return (substr($this->sqlQuery, 0, $length) === $needle);
    }

    function endsWith($needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($this->sqlQuery, -$length) === $needle);
    }

    function __toString()
    {
        return $this->sqlQuery;
    }

}

?>