<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates sum sql string.
 *
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Sum extends Clause
{

    private $column;
    private $alias;

    function getSumString()
    {
        $sumPattern = " SUM({sum}) AS {alias}";
        $sumString = new String();

        $alias = $this->column;
        if (!empty($this->alias)) {
            $alias = $this->alias;
        }

        $sp = $sumPattern;
        $sp = str_replace("{sum}", $this->column, $sp);
        $sp = str_replace("{alias}", $alias, $sp);
        $sumString->append($sp);

        return $sumString;
    }

    function addSumClause($column, $alias)
    {
        $this->column = $column;
        $this->alias = $alias;
    }
}

?>