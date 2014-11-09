<?php

/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This file automatically creates the sql queries and manages components of criteria api.
 * If you will write sql extension, you must define in here and CriteriaBase for method chaining.
 *
 * Hold base object and then add clause it.
 *
 * @see sqlstatements directory
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Criteria extends CriteriaBase
{
    /**
     * Model initialize for Criteria. So if model is null, it will throws a exception.
     *
     * @param null $model
     */
    public function __construct($model = null)
    {
        CriteriaBase::__construct($model);
    }

    /**
     * Where clause statement.
     *
     * @param $column
     * @param $value
     * @throws PipernateIllegalArgumentException
     */
    public function where($column, $value)
    {
        if (empty($column) || !isset($value)) {
            throw new PipernateIllegalArgumentException(9006);
        } else {
            if ($this->whereObject == null) {
                $this->whereObject = new Where();
            }
            $this->whereObject->addWhereClause($column, $value);
        }
    }

    /**
     * Limit clause statement
     *
     * @param $limitFrom
     * @param $limitCount
     * @throws PipernateIllegalArgumentException
     */
    public function limit($limitFrom, $limitCount)
    {
        if (!isset($limitFrom) || !isset($limitCount)) {
            throw new PipernateIllegalArgumentException(9007);
        } else {
            if ($this->limitObject == null) {
                $this->limitObject = new Limit();
            }
            $this->limitObject->addLimitClause($limitFrom, $limitCount);
        }
    }

    /**
     * Order by clause statement. Order type default value is "ascending -> ASC".
     * TODO: I think order by parameter must be enum (gklp)
     *
     * @param $column
     * @param string $orderType
     * @throws PipernateIllegalArgumentException
     */
    public function orderBy($column, $orderType = "ASC")
    {
        if (empty($column)) {
            throw new PipernateIllegalArgumentException(9008);
        } else {
            if ($this->orderObject == null) {
                $this->orderObject = new Order();
            }
            $this->orderObject->addOrderClause($column, $orderType);
        }
    }

    /**
     * Distinct clause statement
     *
     * @param $column
     * @param null $alias
     * @throws PipernateIllegalArgumentException
     */
    public function distinct($column, $alias = null)
    {
        if (empty($column)) {
            throw new PipernateIllegalArgumentException(9009);
        } else {
            if ($this->distinctObject == null) {
                $this->distinctObject = new Distinct();
            }
            $this->distinctObject->addDistinctClause($column, $alias);
        }
    }

    /**
     * Count clause statement
     *
     * @param $column
     * @param null $alias
     * @throws PipernateIllegalArgumentException
     */
    public function count($column, $alias = null)
    {
        if (empty($column)) {
            throw new PipernateIllegalArgumentException(9010);
        } else {
            if ($this->countObject == null) {
                $this->countObject = new Count();
            }
            $this->countObject->addCountClause($column, $alias);
        }
    }

    /**
     * Max clause statement
     *
     * @param $column
     * @param null $alias
     * @throws PipernateIllegalArgumentException
     */
    public function max($column, $alias = null)
    {
        if (empty($column)) {
            throw new PipernateIllegalArgumentException(9015);
        } else {
            if ($this->maxObject == null) {
                $this->maxObject = new Max();
            }
            $this->maxObject->addMaxClause($column, $alias);
        }
    }

    /**
     * Min clause statement
     *
     * @param $column
     * @param null $alias
     * @throws PipernateIllegalArgumentException
     */
    public function min($column, $alias = null)
    {
        if (empty($column)) {
            throw new PipernateIllegalArgumentException(9016);
        } else {
            if ($this->minObject == null) {
                $this->minObject = new Min();
            }
            $this->minObject->addMinClause($column, $alias);
        }
    }

    /**
     * Sum clause statement
     *
     * @param $column
     * @param null $alias
     * @throws PipernateIllegalArgumentException
     */
    public function sum($column, $alias = null)
    {
        if (empty($column)) {
            throw new PipernateIllegalArgumentException(9011);
        } else {
            if ($this->sumObject == null) {
                $this->sumObject = new Sum();
            }
            $this->sumObject->addSumClause($column, $alias);
        }
    }

    /**
     * if you want to take same columns, you must define in here.
     * TODO: parameters must be string array, do not use string parse.(gklp)
     *
     * @param $columns
     * @param null $alias
     * @throws PipernateIllegalArgumentException
     */
    public function fields($columns, $alias = null)
    {
        if (empty($columns)) {
            throw new PipernateIllegalArgumentException(9012);
        } else {
            if ($this->fieldsObject == null) {
                $this->fieldsObject = new Fields();
            }
            $this->fieldsObject->addFieldsClause($columns, $alias);
        }
    }

    /**
     * In clause statement
     *
     * @param $columnName
     * @param $inParameters
     * @throws PipernateIllegalArgumentException
     */
    public function in($columnName, $inParameters)
    {
        if (empty($columnName) || empty($inParameters)) {
            throw new PipernateIllegalArgumentException(9013);
        } else {
            if ($this->whereObject == null) {
                $this->whereObject = new Where();
            }
            $this->whereObject->addInClause($columnName, $inParameters);
        }
    }

    /**
     * Like clause statement.
     *
     * @param $columnName
     * @param $likeParameter
     * @throws PipernateIllegalArgumentException
     */
    public function like($columnName, $likeParameter)
    {
        if (empty($columnName) || empty($likeParameter)) {
            throw new PipernateIllegalArgumentException(9014);
        } else {
            if ($this->whereObject == null) {
                $this->whereObject = new Where();
            }
            $this->whereObject->addLikeClause($columnName, $likeParameter);
        }
    }

    /**
     * You can change return type. Results return two different ways.
     * Like Model or Array
     */
    public function asModel()
    {
        parent::setReturnType(ReturnType::AsModel);
    }

    /**
     * You can change return type. Results return two different ways.
     * Like Model or Array
     */
    public function asArray()
    {
        parent::setReturnType(ReturnType::AsArray);
    }

    public function returnInsertId()
    {
        parent::$returnInsertId = true;
    }
}

?>