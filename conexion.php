<?php 
function conectar()
{
	mysql_connect("localhost","*******","*******");

	mysql_select_db("table");
}
function desconectar()
{
	mysql_close();
}
?>
