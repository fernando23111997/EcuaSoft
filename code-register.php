<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";

    
    // Definir variable e inicializar con valores vacio
    $username = $email = $password = "";

    $hoy = date("Y/m/j"); 

    $username_err = $email_err = $password_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){


        // VALIDANDO INPUT DE NOMBRE DE USUARIO
        if(empty(trim($_POST["username"]))){
            $username_err = "Por favor, ingrese un nombre de usuario";
        }else{
            $username = trim($_POST["username"]);
            $sql = "SELECT * FROM usuario WHERE nombre ='$username'";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                if( pg_num_rows($rs) == 1 ){
                    $username_err = "Este nombre de usuario ya está en uso";
                    $username ="";
                }
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }
            
        }
        
        
        // VALIDANDO INPUT DE EMAIL
        if(empty(trim($_POST["email"]))){
            $email_err = "Por favor, ingrese un correo";
        }else{
            $email = trim($_POST["email"]);
            $sql = "SELECT * FROM usuario WHERE email ='$email'";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                if( pg_num_rows($rs) == 1 ){
                    $email_err = "Este correo ya está en uso";
                    $email ="";
                }
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }

        }
        
        
        // VALIDANDO CONTRASEÑA
        if(empty(trim($_POST['password']))){
            $password_err = "Por favor, ingrese una contraseña";
        }elseif(strlen(trim($_POST['password'])) < 4){
            $password_err = "La contraseña debe de tener al menos 4 caracteres";
        } else{
            $password = trim($_POST['password']);
        }
        
        
        // COMPROBANDO LOS ERRORES DE ENTRADA ANTES DE INSERTAR LOS DATOS EN LA BASE DE DATOS
        if(empty($username_err) && empty($email_err) && empty($password_err)){

            //$param_password = password_hash($password, PASSWORD_BCRYPT); // ENCRIPTANDO CONTRASEÑA}
            $password=hash('sha512',$password);
            $sql = "INSERT INTO usuario VALUES (default,default,'$username','$email','$password','$hoy')";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                header("location: login.php");
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }
        }
        
        pg_close($conexion);
        
    }
    
?>