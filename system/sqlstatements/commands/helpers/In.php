<?php

class In
{

    private $inBy = Array();
    private $inParams = Array();

    function getInString()
    {
        $inString = new String();
        if (isset($this->inBy)) {
            $i = 0;
            foreach ($this->inBy as $inByItem) {
                $inString->append("`" . $inByItem . "`" . " IN (");
                $params = $this->inParams[$i];
                foreach ($params as $param) {
                    $inString->append("'" . $param . "', ");
                }
                $inString->trimRight(2);
                $inString->append(") AND ");
                $i++;
            }
        }
        return $inString;
    }

    function addInClause($column, $inParameters = array())
    {
        if ($column != "" && sizeof($inParameters) > 0) {
            $this->inBy[] = $column;
            $this->inParams[] = $inParameters;
        }
    }
}

?>