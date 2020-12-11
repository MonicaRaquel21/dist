 <?php
		include_once "controller/db.php";
		//datos estudiante
        $nombres = trim($_POST["nombres"]);
        $apellidos = trim($_POST["apellidos"]);
        $edad = trim($_POST["edad"]);
		$direccion = trim($_POST["direccion"]);
		$telestudiante = trim($_POST["telestudiante"]);
		$nacademico = trim($_POST["nacademico"]);
        $institucionproviene = trim($_POST["institucionproviene"]);
		$religion= trim($_POST["religion"]);
        $poseefacebook = trim($_POST["poseefacebook"]);
        $nombrecuentafb = trim($_POST["facebook"]);
        $nombrerecomienda = trim($_POST["recomienda"]);
		//$fechanacimiento = date("Y-m-d", strtotime(trim($_POST["fechanacimiento"])));
        //$sexo = trim($_POST["sexo"]);
        
		//datos padres y de encargado
		$nombrepadre= trim($_POST["nombrepadre"]);
		$telpadre= trim($_POST["telpadre"]);
		$lugartrabajopadre= trim($_POST["lugartrabajopadre"]);
		$nombremadre= trim($_POST["nombremadre"]);
		$telmadre= trim($_POST["telmadre"]);
		$lugartrabajomadre= trim($_POST["lugartrabajomadre"]);
        $nombreencargado= trim($_POST["nombreencargado"]);
		$emailencargado = trim($_POST["emailencargado"]);
		$telefonoencargado = trim($_POST["telefonoencargado"]);
		$vivecon = trim($_POST["vivecon"]);
		$viveconotros = trim($_POST["viveconotros"]);
        $razonestudio= trim($_POST["razon"]);
		
		//$nacionalidad = trim($_POST["nacionalidad"]);
        //$depto = trim($_POST["depto"]);
        //$zona = trim($_POST["zona"]);
        //$economia = trim($_POST["economia"]);
        

        //$sql = "INSERT INTO estudiante (IdEstudiante,nombres,apellidos,FechaNacimiento,Edad,InstitucionProviene,PoseeFacebook,NombreCuentaFB,NombreRecomienda,Sexo,telefono,Email,carnet,nacionalidad,direccion,depto,zona,ViveCon,economia,NAcademico) VALUES (:IdEstudiante,:Nombres,:Apellidos,:CodigoEstudiante,:FechaNacimiento,:Edad,:InstitucionProviene,:PoseeFacebook,:NombreCuentaFB,:NombreRecomienda,:Sexo,:telefono,:Email,:carnet,:nacionalidad,:direccion,:depto,:zona,:ViveCon,:economia,:NAcademico)";
		if($vivecon==999)
		{
			mysqli_query($con,"INSERT INTO vive_con (descripcion_vive) VALUES ('".$viveconotros."')");
			$count=mysqli_query($con,"SELECT idvive_con From vive_con order by idvive_con DESC limit 1");
			$count=mysqli_fetch_array($count,MYSQLI_NUM);
			$vivecon=$count[0];
		}	
					
		$sqlestudiante = "INSERT INTO estudiante (nombres,apellidos,edad,institucionproviene,poseefacebook,nombrecuentafb,nombrerecomienda,telefonoEstudiante,direccion,matriculaestado_idestado,grados_IdGrado,vivecon,religion) VALUES ('".$nombres."','".$apellidos."',".$edad.",'".$institucionproviene."','".$poseefacebook."','".$nombrecuentafb."','".$nombrerecomienda."','".$telestudiante."','".$direccion."',1,".$nacademico.",".$vivecon.",'".$religion."')";
                    
		$sqlpadre = "INSERT INTO padres (nombre,telefono,trabajo,razonestudio) VALUES ('".$nombrepadre."','".$telopadre."','".$lugartrabajopadre."','".$razonestudio."');";
		
		$sqlmadre = "INSERT INTO padres (nombre,telefono,trabajo,razonestudio) VALUES ('".$nombremadre."','".$telmadre."','".$lugartrabajomadre."','".$razonestudio."');";
		
		if($result =mysqli_query($con,$sqlestudiante))
                {
                        $padre =mysqli_query($con,$sqlpadre);
						$madre =mysqli_query($con,$sqlmadre);
							
						$sqlidestudiante="SELECT idEstudiante from estudiante order by idEstudiante DESC limit 1;";
						$sqlidpadre="SELECT idpadre from padres order by idpadre DESC limit 1;";
						
						echo $message="SI";
						
						$sqlidestudiante=mysqli_query($con,$sqlidestudiante);
						$sqlidpadre=mysqli_query($con,$sqlidpadre);
		
						$idestu=mysqli_fetch_array($sqlidestudiante,MYSQLI_NUM);
						$idpa=mysqli_fetch_array($sqlidpadre,MYSQLI_NUM);
						$idma=$idpa[0]-1;
		
						mysqli_query($con,"INSERT INTO padres_has_estudiante VALUES (".$idpa[0].",".$idestu[0].");");
						mysqli_query($con,"INSERT INTO padres_has_estudiante VALUES (".$idma.",".$idestu[0].");");
						mysqli_query($con,"INSERT INTO responsableestudiante (nombre_responsable,telefono_responsable,email_responsable,idEstudiante) VALUES ('".$nombreencargado."','".$telefonoencargado."','".$emailencargado."',".$idestu[0].");");
						
        
                    }
                    else
                    {
                        /*$message = "<div class='alert alert-danger' role='alert'>";
                        $message .= "<h4 class='alert-heading'><i class='fa fa-ban'></i> Estudiante no pudo ser agregado</h4>";
                        $message .= "<p>Ocurrió un error procesando la consulta y no se pudo guardar la informacion del estudiante. Por favor, inténtelo de nuevo. <br>";
                        $message .= "Descripción: " . $dbconnection->error . " <br>";
                        $message .= "Código de error: " . $dbconnection->errno . "</p>";
                        $message .= "</div>";

                        echo $message;*/
						echo $message=mysqli_error($con);
                    }

         return $message;
					
		mysqli_close($con);
	?>