<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates limit sql string.
 *
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Limit extends Clause
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