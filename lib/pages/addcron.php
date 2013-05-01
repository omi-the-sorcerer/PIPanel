<?
/*------------------------------------------------------------------------------
  Función para agregar tarea al cron
------------------------------------------------------------------------------*/

/*---- Cargar Funciones ----*/
require_once(FUNCTIONS.'cron.php');


if(isset($_POST['add']))
{
	go_to("cron", commands::add());
}

?>