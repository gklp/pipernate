<?php

class Count
{

    private $column;
    private $alias;

    function getCountString()
    {
        $countPattern = " COUNT({count}) AS {alias}";
        $countString = new String();

        $alias = $this->column;
        if (!empty($this->alias)) {
            $alias = $this->alias;
        }

        $sp = $countPattern;
        $sp = str_replace("{count}", $this->column, $sp);
        $sp = str_replace("{alias}", $alias, $sp);
        $countString->append($sp);

        return $countString;
    }

    function addCountClause($column, $alias)
    {
        $this->column = $column;
        $this->alias = $alias;
    }
}

?>