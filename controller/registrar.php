<?php
    include("db.php");

    if(isset($_POST['registrar'])){
        $user = $_POST['username'];
        $pass1 = $_POST['contra'];
        $pass2 = $_POST['contra2'];

        $pass1 = password_hash($pass1, PASSWORD_DEFAULT);

        if (password_verify($pass2, $pass1)) {
            $query = "INSERT INTO usuarios(user, pass) VALUES('$user', '$pass1')";
            $result = mysqli_query($con, $query);
            if (!$result){
                die("Fallo la sentencia");
            }
    
            $_SESSION['message'] = "Usuario agregado correctamente";
            $_SESSION['type'] = 'success';
    
            header("location: ../login.php");
        } else {
            //$_SESSION['message'] = $pass2;
            $_SESSION['message'] = "Las contrasenas no coinciden";
            $_SESSION['type'] = 'danger';
            
            header("location: ../register.php");
        }
        
 
         
     }

?>