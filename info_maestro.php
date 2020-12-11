<?php
include_once "controller/db.php";

$respuesta = new stdClass();

$idmaestro = trim($_POST['idmaestro']);

$consulta = "SELECT nombre,apellido,codigo,edad,telefono,correo,tipomaestro_IdTipo,grados_IdGrado From maestros WHERE IdMaestro=".$idmaestro.";";


if($result=mysqli_query($con,$consulta))
	{
	$fila=mysqli_fetch_array($result,MYSQLI_NUM);
		$respuesta->nombre = $fila[0];
		$respuesta->apellido = $fila[1];
		$respuesta->codigo = $fila[2];
		$respuesta->edad = $fila[3];
		$respuesta->telefono = $fila[4];
		$respuesta->correo=$fila[5];
		$respuesta->tipomaestro = $fila[6];
		$respuesta->grado=$fila[7];
		$respuesta->res=1;
	}
else
	$respuesta->res=0;

mysqli_close($con);

echo json_encode($respuesta);
?>