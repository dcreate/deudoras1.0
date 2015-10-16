<?php 
function conectar()
{
	mysql_connect("localhost","*******","*******");

	mysql_select_db("aboutdcr_new");
}
function desconectar()
{
	mysql_close();
}
?>
