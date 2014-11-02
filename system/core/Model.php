<?php

class Model
{

    private $className = "";
    private $classVars = Array();

    public function Model()
    {
        $this->className = get_class($this);
        $allVars = get_object_vars($this);
        $superClassVars = get_class_vars(get_parent_class($this->className));
        foreach ($allVars as $var => $val) {
            if (!in_array($var, array_keys($superClassVars))) {
                $this->classVars[] = $var;
            }
        }
    }

    public function getVariables()
    {
        return $this->classVars;
    }

    public function getFilledVariables()
    {
        $filledVariables = Array();
        foreach ($this->classVars as $variable) {
            if (!empty($this->$variable)) {
                $filledVariables[] = $variable;
            }
        }
        return $filledVariables;
    }

    public function hasVariable($variableName)
    {
        return in_array($variableName, $this->classVars);
    }

    public function getClassName()
    {
        return $this->className;
    }

}

?>