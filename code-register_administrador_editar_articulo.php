<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";

    
    // Definir variable e inicializar con valores vacio

    $imagen_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

            $idArticulo=trim($_POST['id']);
            
            $categoria = trim($_POST["categoria"]);
            $sql = "SELECT * FROM categoria WHERE nombre ='$categoria'";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                if( pg_num_rows($rs) == 1 ){
                    while( $obj = pg_fetch_object($rs) )
                    $idcategoria1= $obj->id;
                }else{
                    $categoria_err = "No esxiste la categoria ingresada";
                }
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }



        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
        $hoy = date("Y/m/j"); 
        $precio=trim($_POST['precio']);
        
        $cantida=trim($_POST['cantidad']);


        // VALIDANDO INPUT DE IMAGEN
        $nombre_imagen=$_FILES['imagen']['name'];
        if(empty($nombre_imagen)){
            $imagen_err = "No se ha modificado la imagen";
        }else{
            $temporal=$_FILES['imagen']['tmp_name'];
            $carpeta='imgPostgres';
            $ruta=$carpeta.'/'.$nombre_imagen;
            move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
        }

        //default,$id,null,'$nombre','$descripcion','$hoy',$precio,'$ruta',$cantidad
        
        
        // COMPROBANDO SI SE MODIFICO LA IMAGEN
        if(empty($imagen_err)){
            $sql4 = "UPDATE producto SET idcategoria= $idcategoria1, nombre='$nombre', descripcion='$descripcion', fecha='$hoy', precio=$precio, imagen='$ruta', cantidad=$cantida WHERE id=$idArticulo";
            $rs4 = pg_query($conexion, $sql4);
            if($rs4 == true){
                echo'<script type="text/javascript">alert("Artículo editado correctamente!!");window.location.href="index_administrador_menu_listar_articulo.php";</script>';
                //header("location: index_administrador_menu_listar_articulo.php");
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }

        }else{
            $sql3 = "UPDATE producto SET idcategoria= $idcategoria1, nombre='$nombre', descripcion='$descripcion', fecha='$hoy', precio=$precio, cantidad=$cantida WHERE id=$idArticulo";
            $rs3 = pg_query($conexion, $sql3);
            if($rs3 == true){
                //header("location: index_administrador_menu_listar_articulo.php");
                echo'<script type="text/javascript">alert("Artículo editado correctamente!!");window.location.href="index_administrador_menu_listar_articulo.php";</script>';
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }

        }
        
        pg_close($conexion);
        
    }
    
?>