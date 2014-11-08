<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates like sql string.
 *
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Like extends Clause
{

    private $likeBy = Array();
    private $likeParams = Array();

    function getLikeString()
    {
        $likeString = new String();
        if (isset($this->likeBy)) {
            $i = 0;
            foreach ($this->likeBy as $likeByItem) {
                $likeString->append("`" . $likeByItem . "`" . " LIKE ");
                $likeString->append("'" . $this->likeParams[$i] . "', ");
                $likeString->trimRight(2);
                $likeString->append(" AND ");
                $i++;
            }
        }
        return $likeString;
    }

    function addLikeClause($column, $likeParameter)
    {
        if (trim($column) != "" && trim($likeParameter) != "") {
            $this->likeBy[] = $column;
            $this->likeParams[] = $likeParameter;
        }
    }
}

?>