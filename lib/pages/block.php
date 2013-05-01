<?php
/*----------------------------------------------------------------------------
	Bloqueo de IP mediante IPTABLES
----------------------------------------------------------------------------*/


$url = "/etc/iptables";

$file = fopen($url, "a+");
fwrite($file, "iptables -A INPUT -s ".$_POST['ip']." -j DROP\n");
fclose($file);

exec("sudo iptables -L -n | grep DROP  | awk '{print \"sudo iptables -D INPUT -s \",$4,\"-j DROP\"}' | sudo sh");
exec("sudo sh /etc/iptables");

go_to("iptables");

?>