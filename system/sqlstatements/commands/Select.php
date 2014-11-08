<?php

/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates select sql string.
 *
 * @see SqlCommand
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Select extends SqlProcessor
{
    public function __construct($criteria)
    {
        parent::__construct($criteria);
        $this->addToQuery("SELECT ");
        $this->addBeforeTail();
        $this->addToQuery(" FROM " . $this->criteria->getModel()->getClassName());

        parent::addWhereTail();
        parent::addOrderTail();
        parent::addLimitTail();

        $this->addToQuery(";");
    }

    private function addBeforeTail()
    {
        var_dump($this->criteria->isFullyColumns());
        if ($this->criteria->isFullyColumns() == true) {
            $this->addToQueryWithComma("*");
        }

        echo parent::isFullyColumns();

        if ($this->criteria->getFieldsObject() != null) {
            $this->addToQueryWithComma($this->criteria->getFieldsObject()->getFieldsString());
        }

        if ($this->criteria->getDistinctObject() != null) {
            $this->addToQueryWithComma($this->criteria->getDistinctObject()->getDistinctString());
        }

        if ($this->criteria->getCountObject() != null) {
            $this->addToQueryWithComma($this->criteria->getCountObject()->getCountString());
        }

        if ($this->criteria->getSumObject() != null) {
            $this->addToQueryWithComma($this->criteria->getSumObject()->getSumString());
        }

        if ($this->getSqlQuery()->endsWith(",")) {
            $this->getSqlQuery()->trimRight(1);
        }
    }
}

?>