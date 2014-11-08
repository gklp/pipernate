<?php

/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates sql string.
 * It will process criteria so must know CriteriaBase.
 *
 * @see SqlCommandUtils, CriteriaBase, String
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class SqlProcessor extends CriteriaBase
{

    protected $sqlQuery;
    protected $model;
    protected $criteria;
    protected $utils;

    /**
     * If Connector has criteria, initialize it.
     *
     * @param null $criteria
     */
    public function __construct($criteria = null)
    {
        $this->sqlQuery = new String();
        $this->criteria = $criteria;
        if ($this->criteria != null) {
            $this->model = $this->criteria->getModel();
        }
        $this->utils = new SqlProcessorUtils();
    }

    /**
     * if has, where tail adding!
     */
    protected function addWhereTail()
    {
        if ($this->criteria->getWhereObject() != null) {
            $this->sqlQuery->append($this->criteria->getWhereObject()->getWhereString());
        }
    }

    /**
     * if has, order tail adding!
     */
    protected function addOrderTail()
    {
        if ($this->criteria->getOrderObject() != null) {
            $this->sqlQuery->append($this->criteria->getOrderObject()->getOrderString());
        }
    }

    /**
     *  if has, limit tail adding!
     */
    protected function addLimitTail()
    {
        if ($this->criteria->getLimitObject() != null) {
            $this->sqlQuery->append($this->criteria->getLimitObject()->getLimitString());
        }
    }

    /**
     * if you want add to sql tail, you can add with this.
     *
     * @param $adding
     */
    protected function addToQuery($adding)
    {
        $this->sqlQuery->append($adding);
    }

    /**
     * if you want add to sql tail, you can add with this.
     *
     * @param $adding
     */
    protected function addToQueryWithComma($adding)
    {
        $this->sqlQuery->append($adding . ",");
    }

    /**
     * Last Query
     *
     * @return String
     */
    public function getSqlQuery()
    {
        return $this->sqlQuery;
    }

    /**
     * if not null, return model.
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * if not null, return model.
     *
     * @return mixed
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
?>