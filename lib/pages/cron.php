<?
/*----------------------------------------------------------------------------
	Cargar el contenido para cron
----------------------------------------------------------------------------*/

/*---- Cargar funciones ---*/
require FUNCTIONS.'cron.php';

if(isset($_POST['edit']))
	go_to('cron/', $_POST['id']);

$pages["whilecron"] = new commands();
$pages["editcron"] = new commands();
$pages["editid"] = @$args[0];
$content .= view("modules/cron", $pages);
