<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";

    
    // Definir variable e inicializar con valores vacio
    $nombre = $descripcion = "";

    $imagen_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        
        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];


        // VALIDANDO INPUT DE IMAGEN
        $nombre_imagen=$_FILES['imagen']['name'];
        if(empty($nombre_imagen)){
            $imagen_err = "No se ha modificado el texto";
        }else{
            $temporal=$_FILES['imagen']['tmp_name'];
            $carpeta='imgPostgres';
            $ruta=$carpeta.'/'.$nombre_imagen;
            move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        }
        
      
        










        
        
        // COMPROBANDO SI SE MODIFICO LA IMAGEN
        if(empty($imagen_err)){
            $sql4 = "UPDATE categoria SET nombre='$nombre', descripcion='$descripcion', imagen='$ruta' WHERE id=$idCategoria";
            $rs4 = pg_query($conexion, $sql4);
            if($rs4 == true){
                //header("location: index_administrador_menu_listar_categoria.php");
                echo'<script type="text/javascript">alert("Categoria editado correctamente exito");window.location.href="index_administrador_menu_listar_categoria.php";</script>';
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }

        }else{
            $sql3 = "UPDATE categoria SET nombre='$nombre', descripcion='$descripcion' WHERE id=$idCategoria";
            $rs3 = pg_query($conexion, $sql3);
            if($rs3 == true){
                //header("location: index_administrador_menu_listar_categoria.php");
                echo'<script type="text/javascript">alert("Categoria editado correctamente exito");window.location.href="index_administrador_menu_listar_categoria.php";</script>';
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }

        }
        
        pg_close($conexion);
        
    }
    
?>