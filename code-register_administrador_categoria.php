<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";

    
    // Definir variable e inicializar con valores vacio
    $nombre = $descripcion = "";

    $nombre_err = $descripcion_err = $imagen_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){


        // VALIDANDO INPUT DE NOMBRE DE CATEGORIA
        if(empty(trim($_POST["nombre"]))){
            $nombre_err = "Por favor, ingrese un nombre de categoria";
        }else{
            $nombre = trim($_POST["nombre"]);
            $sql = "SELECT * FROM categoria WHERE nombre ='$nombre'";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                if( pg_num_rows($rs) == 1 ){
                    $nombre_err = "Ya existe esta categoria";
                    $nombre ="";
                }
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }
            
        }
        
        // VALIDANDO INPUT DESCRIPCION
        if(empty($_POST["descripcion"])){
            $descripcion_err = "Por favor, ingrese algun detalle de la categoría";
        }else{
            $descripcion = trim($_POST["descripcion"]);
        }
        
        
        // VALIDANDO INPUT DE IMAGEN
        $nombre_imagen=$_FILES['imagen']['name'];
        if(empty($nombre_imagen)){
            $imagen_err = "Por favor, ingrese una imagen";
        }else{
            $temporal=$_FILES['imagen']['tmp_name'];
            $carpeta='imgPostgres';
            $ruta11=$carpeta.'/'.$nombre_imagen;
            move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        }
        
        
        // COMPROBANDO LOS ERRORES DE ENTRADA ANTES DE INSERTAR LOS DATOS EN LA BASE DE DATOS
        if(empty($nombre_err) && empty($descripcion_err) && empty($imagen_err)){

            //$param_password = password_hash($password, PASSWORD_DEFAULT); // ENCRIPTANDO CONTRASEÑA
            $sql = "INSERT INTO categoria VALUES (default, '$nombre','$descripcion','$ruta11')";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                $validacion="exitooooooooooooo";
                //header("location: index_administrador_menu_registrar_categoria.php");
                echo'<script type="text/javascript">alert("Categoria registrada con exito");window.location.href="index_administrador_menu_registrar_categoria.php";</script>';
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }
        }
        
        pg_close($conexion);
        
    }
    
?>