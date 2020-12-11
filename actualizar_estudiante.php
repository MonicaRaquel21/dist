<?php
		include_once "controller/db.php";
		//datos estudiante
		$idestudiante = trim($_POST["idestudiante"]);
        $nombres = trim($_POST["nombres"]);
        $apellidos = trim($_POST["apellidos"]);
        $edad = trim($_POST["edad"]);
		$direccion = trim($_POST["direccion"]);
		$codigo = trim($_POST["codigo"]);
		$telestudiante = trim($_POST["telestudiante"]);
		$nacademico = trim($_POST["nacademico"]);
        $institucionproviene = trim($_POST["institucionproviene"]);
		//$religion= trim($_POST["religion"]);
        $poseefacebook = trim($_POST["poseefacebook"]);
        $nombrecuentafb = trim($_POST["facebook"]);
        $nombrerecomienda = trim($_POST["recomienda"]);
		$emailencargado = trim($_POST["emailencargado"]);
		//$fechanacimiento = date("Y-m-d", strtotime(trim($_POST["fechanacimiento"])));
        //$sexo = trim($_POST["sexo"]);
        
		//datos padres
        	
		//$sqlestudiante = " VALUES ('".$nombres."','".$apellidos."',".$edad.",'".$institucionproviene."','".$poseefacebook."','".$nombrecuentafb."','".$nombrerecomienda."','".$telestudiante."','".$emailencargado."','".$direccion."',1,".$nacademico.",'".$religion."')";
        
		$sqlupdate="UPDATE estudiante SET nombres='".$nombres."',apellidos='".$apellidos."',codigoestudiante='".$codigo."',edad='".$edad."',institucionproviene='".$institucionproviene."',poseefacebook='".$poseefacebook."',nombrecuentaFB='".$nombrecuentafb."',nombrerecomienda='".$nombrerecomienda."',telefonoEstudiante='".$telestudiante."',correoEncargado='".$emailencargado."',direccion='".$direccion."',grados_IdGrado='".$nacademico."' WHERE IdEstudiante=".$idestudiante.";";
		
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