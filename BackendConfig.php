<?php
/**
 * Created by PhpStorm.
 * User: Gokalp Kuscu a.k.a gklp
 * Date: 11/2/14
 * Time: 4:03 PM
 *
 * While you was setting database properties for database connection.
 * You must set this file for simple managing for services.
 *
 * Readable code and imports
 *
 * @see Config.php
 * @version 1.0
 * @author gklp
 * @since 2.0
 * @category core
 *
 */

ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

//set your local variables
//this is pipernate core path
define("ORM_PATH", dirname(__FILE__) . "/");

//do not change ORM_PATH knows it.
define("MODEL_PATH", ORM_PATH . 'models/');

//do not change ORM_PATH knows it.
define("SYSTEM_PATH", ORM_PATH . 'system/');

//do not change SYSTEM_PATH knows it.
define("DRIVER_PATH", SYSTEM_PATH . "core/drivers/");

//automatic imports
require_once SYSTEM_PATH . 'Importer.php';

require_once SYSTEM_PATH . 'Connector.php';

?>