<?
/*------------------------------------------------------------------------------
  Función para eliminar tarea del cron
------------------------------------------------------------------------------*/

/*---- Cargar funciones ---*/
require FUNCTIONS.'cron.php';

if(isset($_POST['m']) && isset($_POST['h']) && isset($_POST['monthday']) && isset($_POST['month']) && isset($_POST['weekday']) && isset($_POST['command']) && isset($_POST['id']) && isset($_POST['lastid']))
{
	commands::edit($_POST['m'], $_POST['h'], $_POST['monthday'], $_POST['month'], $_POST['weekday'], $_POST['command'], $_POST['id'], $_POST['lastid']);
	go_to("cron");
}
?>