<?php 
function conectar()
{
	mysql_connect("localhost","aboutdcr","kahodC1817");

	mysql_select_db("aboutdcr_new");
}
function desconectar()
{
	mysql_close();
}
?>
