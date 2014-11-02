<?php

class Like
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