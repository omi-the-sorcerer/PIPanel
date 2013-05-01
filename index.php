<?php
/*-------------------------------------------------------------------------------
	PIPanel DEFINES
------------------------------------------------------------------------------*/
define('USER', $_SERVER['REMOTE_USER']);
define('BASE', '/var/www/');
define('LIB', BASE.'lib/');
define('MODULES', BASE.'modules/');
define('PAGES', LIB.'pages/');
define('ERROR', LIB.'error/');
define('FUNCTIONS', LIB.'functions/');
define('SETTINGS', LIB.'settings/');


/*------------------------------------------------------------------------------
	Iniciar las sesiones
------------------------------------------------------------------------------*/
session_start();

/*------------------------------------------------------------------------------
	Cargar configuraciones y funciones
------------------------------------------------------------------------------*/
require_once LIB.'mainfunctions.php';
require_once SETTINGS.'modules.php';
require_once SETTINGS.'config.php';

$argv = explode('/', $_SERVER["SERVER_NAME"].$_SERVER['PATH_INFO']);
$args = $argv;
$exec = array_shift($args);
$exec .= $_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT'] : '';

if($args[0] == '')
	go_to("home");

$pages["content"] = call_user_func_array('command', $args);
$pages["menu"] = $menu;
$pages["modname"] = $modname;
$pages["sel"] = $argv[1];
echo view("lib/html", $pages);
?>
