<?php
		include_once "controller/db.php";
		//datos padre
		$idpadre = trim($_POST["idpadre"]);
        $nombre = trim($_POST["nombre"]);
        $telefono = trim($_POST["telefono"]);
        $email = trim($_POST["email"]);
		$trabajo = trim($_POST["trabajo"]);
		$dui = trim($_POST["dui"]);
        
		$sqlupdate="UPDATE padres SET nombre='".$nombre."',telefono='".$telefono."',correo='".$email."',trabajo='".$trabajo."',dui='".$dui."' WHERE IdPadre=".$idpadre.";";
		
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