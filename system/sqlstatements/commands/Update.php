<?php

class Update extends SqlCommand
{

    function __construct($criteria)
    {
        parent::__construct($criteria);

        $this->addToQuery("UPDATE " . $this->model->getClassName() . " SET ");
        $this->addToQuery($this->getParameterString());
        parent::addWhereTail();
        $this->addToQuery(";");
    }

    function getParameterString()
    {
        $parameters = new String();
        foreach ($this->model->getFilledVariables() as $variableName) {
            $value = $this->utils->cleanUnescapedString($this->model->$variableName);
            $parameters->append("`" . $variableName . "` = '" . $value . "', ");
        }
        if ($parameters != "") {
            $parameters->trimRight(2);
        }
        return $parameters;
    }
}

?>