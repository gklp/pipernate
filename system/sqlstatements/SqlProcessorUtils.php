<?php

/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * This class includes general sql command utils
 *
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
class SqlProcessorUtils
{
    /**
     * For escape string like '
     *
     * @param $unescapedString
     * @return mixed
     */
    public function cleanUnescapedString($unescapedString)
    {
        $patterns = array('/\'/', '/"/');
        $replaces = array('\\\'', '\\"');
        $escapedString = preg_replace($patterns, $replaces, $unescapedString);
        return $escapedString;
    }
}

?>