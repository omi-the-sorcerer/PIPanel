<?
/*------------------------------------------------------------------------------
  Función para eliminar tarea del cron
------------------------------------------------------------------------------*/

/*---- Cargar Funciones ----*/
require_once(FUNCTIONS.'cron.php');



if(isset($_POST['id']))
{
	commands::delete("##".$_POST['id']);
	go_to("cron");
}
?>