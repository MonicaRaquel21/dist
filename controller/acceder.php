<?php 
    include("db.php");
    session_start();

    if(isset($_POST['acceder'])){
        $user = $_POST['username'];
        $pass = $_POST['contra'];

        if($user OR $pass == null){
            $_SESSION['message'] = "Usuario y/o contrasena incorrectos1";
            $_SESSION['type'] = 'danger';
                
            header("location: ../pages-login.php");
        }

        $q = "SELECT * FROM usuarios WHERE user = '$user'";
        $r = mysqli_query($con, $q);
        $row = mysqli_fetch_array($r);

        $userpass = $row['pass'];

        $query = "SELECT COUNT(*) as contar FROM usuarios WHERE user = '$user' and pass = '$userpass'";
        $result = mysqli_query($con, $query);

        $array = mysqli_fetch_array($result);
        $i = 1;
        if($array['contar']>0){
            if ($i==1) {
            $_SESSION['usuario'] = $user;
            header("location: ../pages-starter.php");
            }else{
            
                $_SESSION['message'] = "Usuario y/o contrasena incorrectos2";
                $_SESSION['type'] = 'danger';
                
                header("location: ../pages-login.php");
            }
        }

        

        
    }


?>