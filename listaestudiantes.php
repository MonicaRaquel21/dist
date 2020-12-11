<?php
	include_once "controller/db.php";
	
	$sql="SELECT codigoestudiante, concat_ws(' ', nombres, apellidos) as nombre,(select grado from grados where Idgrado=grados_IdGrado) as grado,edad,telefonoEstudiante,correoEncargado,IdEstudiante FROM estudiante;";
	$result=mysqli_query($con,$sql);
	$tabla="";
	while( $row=mysqli_fetch_array($result,MYSQLI_NUM))
		{
			$tabla.='{
				"codigo":"'.$row[0].'",
				"nombre":"'.$row[1].'",
				"grado":"'.$row[2].'",
				"edad":"'.$row[3].'",
				"telefono":"'.$row[4].'",
				"email":"'.$row[5].'",
				"editar":"<a class="editar" id="'.$row[6].'" data-toggle="modal" data-target="#con-close-modal"><img src="view/img/editar.jpg" style="cursor:pointer"></a>",
				"estado":"<a class="borrar" id="'.$row[6].'" data-toggle="modal" data-target="#con-close-modal1"><img src="view/img/estado.jpg" style="cursor:pointer"></a>"
				},';	
		}	
	$tabla =substr($tabla,0,strlen($tabla) -1);	
	echo '{"data":['.$tabla.']}';	
mysqli_close($con);
?>