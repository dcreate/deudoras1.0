<?php
if(isset($_POST['enviar']))
{
	if(!empty($_POST['nombre']) && !empty($_POST['deuda']))
	{
		include "conexion.php";
		$nombre=$_POST['nombre'];
		$debe=$_POST['deuda'];
		conectar();
		$bus=mysql_query("select *from operaciones where nombre='$nombre'") or die("error: ".mysql_error());
		$identi=mysql_query("select *from operaciones order by id_operacion desc") or die ("consulta id: ".mysql_error());
		desconectar();
		$conta=mysql_num_rows($bus);
		if($conta>0)
		{
			header("location:index.php?msj=AMOR YA ESTA DEBIENDO ".$nombre);
			exit();
		}
		else
		{
		    $iden=mysql_fetch_array($identi);
		    $auxiliar=$iden['id_operacion'];
		    $ide=$auxiliar+1;
   			$fecha=date("Y-m-d");
			conectar();
			$op=mysql_query("INSERT INTO operaciones(id_operacion,nombre,debe,fecha)VALUE('$ide','$nombre','$debe','$fecha')") or die ("error ingreso: ".mysql_error());
			
			//prueba
			$ne=mysql_query("INSERT INTO adeudos(id_abono,id_op,saldo,agrego,fecha_op,estado)VALUE('','$ide','0','$debe','$fecha','2')")or die("error guardar op: ".mysql_error());
			desconectar();
			if($op)
			{
				header("location:index.php?msj=INGRESO CON EXITO");
				exit();
			}
			else
			{
				header("location:index.php?msj=OCURRIO ALGUN ERROR EN LO QUE GUARDABA, INTENTE DE NUEVO");
				exit();
			}
		}
	}
	else
	{
		header("location:index.php?msj=AMOR FALTA NOMBRE O CANTIDAD, NO SE GUARDA SI FALTA");
		exit();
	}
}
else
{
	header("location:index.php?msj=DEBE INGRESAR ALGO");
	exit();
}
?>