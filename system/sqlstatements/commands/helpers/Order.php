<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates order sql string.
 *
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Order extends Clause
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