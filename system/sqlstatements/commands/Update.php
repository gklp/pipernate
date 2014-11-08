<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates update sql string.
 *
 * @see SqlCommand
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Update extends SqlProcessor
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