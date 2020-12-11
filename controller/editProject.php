<?php
    include("db.php");
    
    $id = $_REQUEST['id'];
    
    if(isset($_POST['editproject'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $img = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        
        if($name && $description != null){
            $query = "UPDATE proyectos SET name= '$name', description= '$description', image= '$img' WHERE id= '$id'";
            $result = mysqli_query($con, $query);

            if (!$result){
            
                $_SESSION['messages'] = "Proyecto no fue editado";
                $_SESSION['types'] = "danger";
                
                header("location: ../editproject.php");
            }else{
                $_SESSION['messages'] = "Proyecto editado";
                $_SESSION['types'] = "success";

                header("location: ../see.php");
            }
        }else{
            $_SESSION['messages'] = "Datos incompletos";
            $_SESSION['types'] = "warning";

            header("location: ../editproject.php");
        }
        
        
    }
?>