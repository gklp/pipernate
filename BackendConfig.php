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

//set your local variables
//this is pipernate core path
define("ORM_PATH", dirname(__FILE__)."/");

//do not change ORM_PATH knows it.
define("MODEL_PATH", ORM_PATH . 'models/');

//do not change ORM_PATH knows it.
define("SYSTEM_PATH", ORM_PATH .'system/');

//automatic imports
require_once SYSTEM_PATH.'Importer.php';

require_once SYSTEM_PATH.'Connector.php';

?>