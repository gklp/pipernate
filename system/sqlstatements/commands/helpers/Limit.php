<?php

class Limit
{
    private $limitParam;

    function Limit()
    {

    }

    function getLimitString()
    {
        return $this->limitParam;
    }

    function addLimitClause($limitFrom, $limitCount)
    {
        $this->limitParam = " LIMIT $limitFrom, $limitCount";
    }
}

?>