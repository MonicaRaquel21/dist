<?php
    include("db.php");
    

    if(isset($_POST['addproject'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $img = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        
        if($name && $description != null){
            $query = "INSERT INTO proyectos(name, description, image) VALUES('$name', '$description','$img')";
            $result = mysqli_query($con, $query);

            if (!$result){
            
                $_SESSION['messages'] = "Proyecto no fue agregado";
                $_SESSION['types'] = "danger";
                
                header("location: ../addproject.php");
            }else{
                $_SESSION['messages'] = "Proyecto agregado";
                $_SESSION['types'] = "success";

                header("location: ../see.php");
            }
        }else{
            $_SESSION['messages'] = "Datos incompletos";
            $_SESSION['types'] = "warning";

            header("location: ../addproject.php");
        }
        
        
    }
?>