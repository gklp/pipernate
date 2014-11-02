<?php

class Order
{

    private $orderBy;
    private $orderType;

    function Order()
    {

    }

    function getOrderString()
    {
        $orderString = new String();
        if (isset($this->orderBy)) {
            if (isset($this->orderBy)) {
                $orderString->append(" ORDER BY " . $this->orderBy . " " . $this->orderType);
            }
        }
        return $orderString;
    }

    function addOrderClause($column, $orderType)
    {
        if ($orderType != "ASC" && $orderType != "DESC" && $orderType != "asc" && $orderType != "desc")
            $orderType = "ASC";
        $this->orderBy = $column;
        $this->orderType = $orderType;
    }
}

?>