<?php
	define("MODELPATH", ORMPATH . 'models/');
	
	require_once ORMPATH . 'system/Functions.php';
	
	requirePath(ORMPATH . 'system/core/drivers/interfaces');
	requirePath(ORMPATH . 'system/core/exceptions');
	requirePath(ORMPATH . 'system/core/drivers');
	requirePath(ORMPATH . 'system/core');
	requirePath(ORMPATH . 'system');
	requirePath(ORMPATH . 'system/sqlstatements');
	requirePath(ORMPATH . 'system/sqlstatements/commands');
	requirePath(ORMPATH . 'system/sqlstatements/commands/helpers');
	requirePath(ORMPATH . 'modules');
	requirePath(ORMPATH . 'services');
?>