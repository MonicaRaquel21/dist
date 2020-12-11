<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM proyectos WHERE id = $id";
        $result = mysqli_query($con, $query);

        if (!$result){
            die('Fallo la consulta');
        }
        
        
        $_SESSION['alert'] = "Project Delete";
        $_SESSION['at'] = "danger";

        header("location: ../see.php");
    }
?>