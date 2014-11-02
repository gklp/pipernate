<?php
if (!defined('ORMPATH')) {
    define("ORMPATH", str_replace('system', '', dirname(__FILE__)));
}
require_once ORMPATH . 'system/PathIncluder.php';

class DbService
{

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function connectionClose()
    {
        $this->database->connectionClose();
    }

    public function executeQuery($query)
    {
        return $this->database->executeQuery($query);
    }

    protected function transformResults($results, $criteria)
    {
        $resultTransformer = new ResultTransformer();
        $resultTransformer->setDriver($this->database->getDriver());
        $resultTransformer->setData($results);
        $resultTransformer->setReturnType($criteria->getReturnType());
        $resultTransformer->setModelName($criteria->getModel()->getClassName());
        return $resultTransformer->transformData();
    }

    public function getQueryResultFetchArray()
    {
        return $this->database->getQueryResultFetchArray();
    }

    public function getQueryResultAssocArray()
    {
        return $this->database->getQueryResultAssocArray();
    }

    public function resultCount()
    {
        return $this->database->getResultCount();
    }

    public function getQueryAffectedRows()
    {
        return $this->database->getQueryAffectedRows();
    }

    public function setRealEscapeString($unescaped_string)
    {
        return $this->database->setRealEscapeString($unescaped_string);
    }

    public function getInsertId($table)
    {
        return $this->database->getNextInsertId($table);
    }

    public function getLastInsertId()
    {
        return $this->database->getLastInsertId();
    }

    /* base sql process */
    public function select($criteria)
    {
        $selectObject = new Select($criteria);
        $this->database->executeQuery($selectObject->getSqlQuery());
        return $this->transformResults($this->database->getQueryResult(), $criteria);
    }

    public function uniqueResult($criteria)
    {
        $queryResults = $this->select($criteria);

        $returnResult = null;
        if ($queryResults->size() > 0) {
            $returnResult = $queryResults->get(0);
        }
        return $returnResult;
    }

    public function save($model, $returnInsertId = false)
    {
        $insertObject = new Insert($model);
        $returnResult = $this->database->executeQuery($insertObject->getSqlQuery());
        if ($returnResult && $returnInsertId) {
            $returnResult = $this->database->getLastInsertId();
        }
        return $returnResult;
    }

    public function update($criteria)
    {
        $updateObject = new Update($criteria);
        return $this->database->executeQuery($updateObject->getSqlQuery());
    }

    public function delete($criteria)
    {
        $deleteObject = new Delete($criteria);
        return $this->database->executeQuery($deleteObject->getSqlQuery());
    }

}
$dbservice = new DbService();
?>