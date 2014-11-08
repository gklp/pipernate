<?php
/**
 * Created by PhpStorm.
 * Users: Gokalp Kuscu a.k.a gklp, Mikail Ozel a.k.a mike
 * Date: 11/2/12
 * Time: 4:03 PM
 *
 * Magic import code. This file will automatically install the necessary components
 *
 * @see ModelCreator.php
 * @version 1.4
 * @author gklp, mike
 * @since 1.0
 * @category core
 *
 */
imports(ORM_PATH . 'system/core/drivers/interfaces');
imports(ORM_PATH . 'system/core/exceptions');
imports(ORM_PATH . 'system/core/drivers');
imports(ORM_PATH . 'system/core');
imports(ORM_PATH . 'system');
imports(ORM_PATH . 'system/sqlstatements');
imports(ORM_PATH . 'system/sqlstatements/commands');
imports(ORM_PATH . 'system/sqlstatements/commands/clauses');
imports(ORM_PATH . 'system/sqlstatements/commands/helpers');
imports(ORM_PATH . 'modules');
imports(ORM_PATH . 'services');

/**
 * Import files.
 *
 * @param $path
 */
function imports($path)
{
    foreach (glob($path . "/*.php") as $filename) {
        require_once $filename;
    }
}

?>