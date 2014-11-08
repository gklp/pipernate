<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class generates insert sql string.
 *
 * @see SqlCommand
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class Insert extends SqlProcessor
{

    function __construct($model)
    {
        parent::__construct();

        $this->addToQuery("INSERT INTO " . $model->getClassName() . "(");
        $this->addToQuery($this->getParameterString($model));
        $this->addToQuery(") VALUES(");
        $this->addToQuery($this->getValuesString($model));
        $this->addToQuery(");");
    }

    function getParameterString($model)
    {
        $parameters = new String();
        foreach ($model->getFilledVariables() as $variableName) {
            $parameters->append("`" . $variableName . "`, ");
        }
        if ($parameters != "") {
            $parameters->trimRight(2);
        }
        return $parameters;
    }

    function getValuesString($model)
    {
        $variables = new String();
        foreach ($model->getFilledVariables() as $variableName) {
            $value = $this->utils->cleanUnescapedString($model->$variableName);
            $variables->append("'" . $value . "', ");
        }
        if ($variables != "") {
            $variables->trimRight(2);
        }
        return $variables;
    }
}

?>