<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates where sql string.
 *
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Where extends Clause
{

    private $whereParams = array();
    private $inObject;
    private $likeObject;

    function Where()
    {
        $this->inObject = new In();
        $this->likeObject = new Like();
    }

    function getWhereString()
    {
        $parameters = new String();
        if (count($this->whereParams) > 0) {
            $parameters->append(" WHERE (");
            foreach ($this->whereParams as $variableName) {
                $parameters->append($variableName . " AND ");
            }
            $parameters->append($this->inObject->getInString());
            $parameters->append($this->likeObject->getLikeString());
            $parameters->trimRight(5);
            $parameters->append(")");
        } else {
            $parameters->append(" WHERE (");
            $parameters->append($this->inObject->getInString());
            $parameters->append($this->likeObject->getLikeString());
            $parameters->trimRight(5);
            $parameters->append(")");
        }
        return $parameters;
    }

    function addWhereClause($column, $value)
    {
        $equality = "=";
        $equalities = array("<=", ">=", "!=", "<>", "<", ">");
        foreach ($equalities as $eq) {
            if (strstr($column, $eq)) {
                $equality = $eq;
                $column = str_replace($eq, "", $column);
                break;
            }
        }
        $this->whereParams[] = "`" . $column . "` " . $equality . " '" . $value . "'";
    }

    function addInClause($column, $inParams)
    {
        $this->inObject->addInClause($column, $inParams);
    }

    function addlikeClause($column, $likeParam)
    {
        $this->likeObject->addlikeClause($column, $likeParam);
    }
}

?>