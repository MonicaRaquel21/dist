<?php
include_once "controller/db.php";

$respuesta = new stdClass();

$idestudiante = $_POST['idestudiante'];
$x=$_POST['control'];
//$idestudiante=12;

if($x==1)
	$consulta = "SELECT nombres,apellidos,codigoestudiante,edad,institucionproviene,poseefacebook,nombrecuentaFB,nombrerecomienda,telefonoEstudiante,direccion,grados_IdGrado From estudiante WHERE IdEstudiante=".$idestudiante.";";
else
	$consulta = "SELECT matriculaestado_idestado From estudiante WHERE IdEstudiante=".$idestudiante.";";
//$result = mysqli_query($con,$consulta);

if($result=mysqli_query($con,$consulta))
	{
	$fila=mysqli_fetch_array($result,MYSQLI_NUM);
	if($x==1) {
		$respuesta->nombres = $fila[0];
		$respuesta->apellidos = $fila[1];
		$respuesta->codigoestudiante = $fila[2];
		$respuesta->edad = $fila[3];
		$respuesta->institucionproviene = $fila[4];
		$respuesta->poseefacebook = $fila[5];
		$respuesta->nombrecuentaFB = $fila[6];
		$respuesta->nombrerecomienda = $fila[7];
		$respuesta->telefonoestudiante = $fila[8];
		$respuesta->direccion = $fila[9];
		$respuesta->grado = $fila[10];
		}else{
			$respuesta->estadomatricula=$fila[0];
		}
	}
else
	$respuesta->codigoestudiante=0;

mysqli_close($con);

echo json_encode($respuesta);
?>