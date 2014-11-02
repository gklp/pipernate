<?php

class Distinct
{

    private $column;
    private $alias;

    function getDistinctString()
    {
        $distinctPattern = " DISTINCT({distinct}) AS {alias}";
        $distinctString = new String();

        $alias = $this->column;
        if (!empty($this->alias)) {
            $alias = $this->alias;
        }

        $dp = $distinctPattern;
        $dp = str_replace("{distinct}", $this->column, $dp);
        $dp = str_replace("{alias}", $alias, $dp);
        $distinctString->append($dp);

        return $distinctString;
    }

    function addDistinctClause($column, $alias)
    {
        $this->column = $column;
        $this->alias = $alias;
    }
}

?>