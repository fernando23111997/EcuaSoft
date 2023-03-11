<?php

    //INICIALIZAR LA SESION
    session_start();
 
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index_logeado.php");
        exit;
    }
include_once ("conexion.php");

    $email = $password = "";
    $email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    
    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor, ingrese el correo electronico";
    }else{
        $email = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST['password']))){
        $password_err = "Por favor, ingrese una contraseña";
    }else{
        $password = trim($_POST['password']);
    }
    
    
    //VALIDAR CREDENCIALES
    if(empty($email_err) && empty($password_err)){
        
        // VALIDANDO INPUT DE EMAIL
        $sqll = "SELECT * FROM usuario WHERE email ='$email'";
        $rsl = pg_query($conexion, $sqll);
        if($rsl){
            if( pg_num_rows($rsl) == 1 ){
                while( $objl = pg_fetch_object($rsl) ){
                        
                    $_SESSION['id'] = $objl->id;
                    $administrador=$objl->idrol;
                    $_SESSION["email"] = $objl->email;
                    $_SESSION["nombre"] = $objl->nombre;
                    $hashed__password=$objl->clave;
                }
                // VALIDANDO INPUT DE CONTRASEÑA 
                //(password_verify($password, $hashed_password))
                //($password == $hashed_password)   
                $password=hash('sha512',$password);

                

                if($password = $hashed__password){
                    $_SESSION["loggedin"] = true;
                    if($administrador==1){
                        header("location: index_administrador_menu.php");
                    }else{
                        header("location: index_logeado.php");
                    }
                }else{
                    $password_err = "La contraseña que has introducido no es la correcta";
                }

            }else{
                $email_err = "Este correo aun no ha sido registrado";
            }
        }else{
            echo "Ups! Algo salió mal, inténtalo mas tarde";
            
        }
    }
    pg_close($conexion);    
}

?>

























