<?php
		include_once "controller/db.php";
		//datos estudiante
		$idestudiante = trim($_POST["idestudiante1"]);
        $estadomatricula = trim($_POST["estadomatricula"]);
                
		$sqlupdate="UPDATE estudiante SET matriculaestado_idestado='".$estadomatricula."' WHERE IdEstudiante=".$idestudiante.";";
		
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