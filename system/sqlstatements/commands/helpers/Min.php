<?php

/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates count sql string.
 *
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Min extends Clause
{

    private $column;
    private $alias;

    function getMinString()
    {
        $countPattern = " MIN({min}) AS {alias}";
        $countString = new String();

        $alias = $this->column;
        if (!empty($this->alias)) {
            $alias = $this->alias;
        }

        $sp = $countPattern;
        $sp = str_replace("{min}", $this->column, $sp);
        $sp = str_replace("{alias}", $alias, $sp);
        $countString->append($sp);

        return $countString;
    }

    function addMinClause($column, $alias)
    {
        $this->column = $column;
        $this->alias = $alias;
    }

}

?>