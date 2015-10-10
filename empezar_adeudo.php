<?php
if (isset($_POST['enviar']))
{
	if(!empty($_POST['adeudar']) && !empty($_POST['id_op']))
	{
		include "conexion.php";
		$oper=$_POST['adeudar'];
		$id=$_POST['id_op'];
		conectar();
		$bus=mysql_query("select *from operaciones where id_operacion='$id'") or die ("error: ".mysql_error());
		desconectar();
		$contar=mysql_num_rows($bus);
		if($contar>0)
		{
			$con=mysql_fetch_array($bus);
			$idnw=$con['id_operacion'];
			$nombre=$con['nombre'];
			$debe=$con['debe'];
			$deuda=$debe+$oper;
			$fecha=date("Y-m-d");
			$estado="2";//1 es abono y 2 es deuda
			conectar();
			$checa=mysql_query("INSERT INTO adeudos(id_abono,id_op,saldo,agrego,fecha_op,estado)VALUE('','$idnw','$debe','$oper','$fecha','$estado')") or die ("error guardado: ".mysql_error());
			$checa1=mysql_query("UPDATE operaciones SET debe='$deuda' where id_operacion='$idnw'") or die ("error guardado1: ".mysql_error());
			desconectar();
			if($checa && $checa1)
			{
				header("location:abono.php?msj=OPERACION REALIZADA CON EXITO");
				exit();
			}
			else
			{
				header("location:abono.php?msj=ALGO SALIO MUY MAL, CHECA SI SE ABONO ALGO");
				exit();
			}
		}
		else
		{
			header("location:abono.php?msj=NO SE ENCONTRARON DATOS Y NO PUDO TERMINAR, VUELVE A INTENTAR");
			exit();	
		}
	}
	else
	{
		header("location:abono.php?msj=ALGO PASO, NO SE PUDO REALIZAR LA OPERACION");
		exit();
	}
}
else
{
	header("location:abono.php?msj=OCCURRIO PROBLEMA VUELVE A INTENTAR LO PASADO");
	exit();
}
?>