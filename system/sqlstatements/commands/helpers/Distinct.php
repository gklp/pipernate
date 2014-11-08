<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates distinct sql string.
 *
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Distinct extends Clause
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