<?php
		include_once "controller/db.php";
		//datos padre
		$idmaestro = trim($_POST["idmaestro"]);
        $nombre = trim($_POST["nombre"]);
        $apellido = trim($_POST["apellido"]);
        $codigo = trim($_POST["codigo"]);
		$edad = trim($_POST["edad"]);
		$telefono = trim($_POST["telefono"]);
		$correo = trim($_POST["correo"]);
		$tipomaestro = trim($_POST["tipomaestro"]);
		$grado = trim($_POST["grado"]);
        
		$sqlupdate="UPDATE maestros SET nombre='".$nombre."',apellido='".$apellido."',codigo='".$codigo."',edad='".$edad."',telefono='".$telefono."',correo='".$correo."',tipomaestro_IdTipo='".$tipomaestro."',grados_IdGrado='".$grado."' WHERE IdMaestro=".$idmaestro.";";
		
		if($result =mysqli_query($con,$sqlupdate))
                {
                       echo $message="SI";
						     
                    }
                    else
                    {
                        echo $message="NO";
                    }

         return $message;
					
		mysqli_close($con);
	?>