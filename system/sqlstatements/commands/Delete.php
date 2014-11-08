<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates delete sql string.
 *
 * @see SqlCommand
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Delete extends SqlProcessor
{
    function __construct($criteria)
    {
        parent::__construct($criteria);
        $this->addToQuery("DELETE FROM " . $this->getModel()->getClassName());
        parent::addWhereTail();
        $this->addToQuery(";");
    }
}
?>