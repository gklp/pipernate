<?php

/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * Isolate users from each other with driver. Abstraction for user.
 * The user must not know what the driver or pipernate is doing.
 *
 * TODO: i think this class two object support. Two object; NativeAPI object and CriteriaAPI object.
 * We must divide this!!!! (gklp)
 *
 * @see Database, Criteria, Select
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Connector
{

    private $database;

    /**
     * Database driver initialize
     */
    public function __construct()
    {
        $this->database = new Database();
    }

    /**
     * Criteria Processor, when you define criteria, SELECT interpreters criteria
     * parameters.
     *
     * @param $criteria
     * @return mixed
     */
    public function select($criteria)
    {
        $selectObject = new Select($criteria);
        echo $selectObject->getSqlQuery();
        $this->database->executeQuery($selectObject->getSqlQuery());
        return $this->transformResults($this->database->getQueryResult(), $criteria);
    }

    /**
     * Criteria Processor, when you define criteria, uniqueResult interpreters criteria
     * parameters with SELECT. And then always one single result.
     *
     * @param $criteria
     * @return mixed
     */
    public function uniqueResult($criteria)
    {
        $queryResults = $this->select($criteria);
        $returnResult = null;
        if ($queryResults->size() > 0) {
            $returnResult = $queryResults->get(0);
        }
        return $returnResult;
    }

    /**
     * Model save.
     *
     * @param $model
     * @param bool $returnInsertId
     * @return mixed
     */
    public function save($model, $returnInsertId = false)
    {
        $insertObject = new Insert($model);
        $returnResult = $this->database->executeQuery($insertObject->getSqlQuery());
        if ($returnResult && $returnInsertId) {
            $returnResult = $this->database->getLastInsertId();
        }
        return $returnResult;
    }

    /**
     * Model update.
     *
     * @param $criteria
     * @return mixed
     */
    public function update($criteria)
    {
        $updateObject = new Update($criteria);
        return $this->database->executeQuery($updateObject->getSqlQuery());
    }

    /**
     * Model delete.
     *
     * @param $criteria
     * @return mixed
     */
    public function delete($criteria)
    {
        $deleteObject = new Delete($criteria);
        return $this->database->executeQuery($deleteObject->getSqlQuery());
    }

    /**
     * Database connection close
     */
    public function connectionClose()
    {
        $this->database->connectionClose();
    }

    /**
     * This is important method. This method renders your sql query results according to your choice.
     *
     * @see ReturnType
     * @param $results
     * @param $criteria
     * @return mixed
     */
    protected function transformResults($results, $criteria)
    {
        $resultTransformer = new ResultTransformer();
        $resultTransformer->setDriver($this->database->getDriver());
        $resultTransformer->setData($results);
        $resultTransformer->setReturnType($criteria->getReturnType());
        $resultTransformer->setModelName($criteria->getModel()->getClassName());
        return $resultTransformer->transformData();
    }

    /**
     * You can execute native sql query. executeQuery("select 1 from dual");
     *
     * @param $query
     * @return mixed
     */
    public function executeQuery($query)
    {
        return $this->database->executeQuery($query);
    }

    /**
     * For results of executeQuery
     * @return mixed
     */
    public function getQueryResultFetchArray()
    {
        return $this->database->getQueryResultFetchArray();
    }

    /**
     * For results of executeQuery
     * @return mixed
     */
    public function getQueryResultAssocArray()
    {
        return $this->database->getQueryResultAssocArray();
    }

    /**
     * Query result count
     * @return mixed
     */
    public function resultCount()
    {
        return $this->database->getResultCount();
    }

    /**
     * Query affected rows
     * @return mixed
     */
    public function getQueryAffectedRows()
    {
        return $this->database->getQueryAffectedRows();
    }

    /**
     * You can set unescaped_string like '.
     *
     * @param $unescaped_string
     * @return mixed
     */
    public function setRealEscapeString($unescaped_string)
    {
        return $this->database->setRealEscapeString($unescaped_string);
    }

    /**
     * Returns next insert id of table
     *
     * @param $table
     * @return mixed
     */
    public function getInsertId($table)
    {
        return $this->database->getNextInsertId($table);
    }

    /**
     * Returns last insert id of table
     *
     * @return mixed
     */
    public function getLastInsertId()
    {
        return $this->database->getLastInsertId();
    }
}

?>