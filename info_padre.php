<?php
include_once "controller/db.php";

$respuesta = new stdClass();

$idpadre = trim($_POST['idpadre']);

$consulta = "SELECT nombre,telefono,correo,trabajo,dui From padres WHERE IdPadre=".$idpadre.";";


if($result=mysqli_query($con,$consulta))
	{
	$fila=mysqli_fetch_array($result,MYSQLI_NUM);
		$respuesta->nombre = $fila[0];
		$respuesta->telefono = $fila[1];
		$respuesta->email = $fila[2];
		$respuesta->trabajo = $fila[3];
		$respuesta->dui = $fila[4];
		$respuesta->res=1;
	}
else
	$respuesta->res=0;

mysqli_close($con);

echo json_encode($respuesta);
?>