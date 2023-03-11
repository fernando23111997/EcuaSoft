<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";

    
    // Definir variable e inicializar con valores vacio
    $categoria = $nombre = $descripcion = $precio = $cantidad = $descripcionP= $promocion="";
    $categoria_err = $nombre_err = $descripcion_err = $precio_err = $cantidad_err = $imagen_err = $descripcionP_err= $promocion_err="";
    $hoy = date("Y/m/j"); 

    if($_SERVER["REQUEST_METHOD"] == "POST"){



        // VALIDANDO INPUT DESCRIPCION
        if(empty($_POST["descripcionP"])){
            $descripcionP_err = "Por favor, describa el motivo de la promoción";
        }else{
            $descripcionP = trim($_POST["descripcionP"]);
        }
        // VALIDANDO INPUT PROMOCION
        if(empty($_POST['promocion'])){
            $promocion_err = "Por favor, ingrese el porcentaje de promocion";
        }else{
            $promocion = trim($_POST['promocion']);
        }
        
         // VALIDANDO INPUT DE CATEGORIA
         if(empty(trim($_POST["categoria"]))){
            $categoria_err = "Por favor, seleccione una categoria";
        }else{
            $categoria = trim($_POST["categoria"]);
            $sql = "SELECT * FROM categoria WHERE nombre ='$categoria'";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                if( pg_num_rows($rs) == 1 ){
                    while( $obj = pg_fetch_object($rs) )
                    $id= $obj->id;

                }else{
                    $categoria_err = "No esxiste la categoria ingresada";
                }
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }
            
        }


        // VALIDANDO INPUT DE CATEGORIA
        if(empty(trim($_POST["categoria"]))){
            $categoria_err = "Por favor, seleccione una categoria";
        }else{
            $categoria = trim($_POST["categoria"]);
            $sql = "SELECT * FROM categoria WHERE nombre ='$categoria'";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                if( pg_num_rows($rs) == 1 ){
                    while( $obj = pg_fetch_object($rs) )
                    $id= $obj->id;

                }else{
                    $categoria_err = "No esxiste la categoria ingresada";
                }
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }
            
        }
        
        // VALIDANDO INPUT DE NOMBRE DE PRODUCTO
        if(empty(trim($_POST["nombre"]))){
            $nombre_err = "Por favor, ingrese el nombre del articulo";
        }else{
            $nombre = trim($_POST["nombre"]);
            $sql = "SELECT * FROM producto WHERE nombre ='$nombre'";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                if( pg_num_rows($rs) == 1 ){
                    $nombre_err = "Ya existe este artículo";
                    $nombre ="";
                }
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }
            
        }

        // VALIDANDO INPUT DESCRIPCION
        if(empty($_POST["descripcion"])){
            $descripcion_err = "Por favor, ingrese la descripcion del Articulo";
        }else{
            $descripcion = trim($_POST["descripcion"]);
        }
        
         // VALIDANDO INPUT DESCRIPCION
         if(empty($_POST['precio'])){
            $precio_err = "Por favor, ingrese el precio del Articulo";
        }else{
            $precio = trim($_POST['precio']);
        }


        // VALIDANDO INPUT CANTIDAD
        if(empty($_POST['cantidad'])){
            $cantidad_err = "Por favor, ingrese la cantidad del Articulo";
        }else{
            $cantidad = trim($_POST['cantidad']);
        }



        
        // VALIDANDO INPUT DE IMAGEN
        $nombre_imagen=$_FILES['imagen']['name'];
        $temporal=$_FILES['imagen']['tmp_name'];
        $carpeta='imgPostgresArticulo';
        $ruta=$carpeta.'/'.$nombre_imagen;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);

        if(empty($nombre_imagen)){
            $imagen_err = "Por favor, ingrese una imagen";
        }
        
        
        // COMPROBANDO LOS ERRORES DE ENTRADA ANTES DE INSERTAR LOS DATOS EN LA BASE DE DATOS
        if(empty($descripcionP_err) && empty($promocion_err) && empty($categoria_err) && empty($nombre_err) && empty($descripcion_err) && empty($precio_err) && empty($cantidad_err) && empty($imagen_err)){
                
                $sql2 = "SELECT * FROM promocionproducto where nombre='$descripcionP' and descuento=$promocion";
                $rs2 = pg_query($conexion, $sql2);

                if($rs2 == true){

                    if( pg_num_rows($rs2) == 1 ){
                        $obj = pg_fetch_object($rs2);
                        $idPromocion= $obj->id;
                    }else{
                        //Insertar la promocion en la base de datos
                        $sql3 = "INSERT INTO promocionproducto VALUES (default,'$descripcionP',$promocion)";
                        $rs3 = pg_query($conexion, $sql3);
                        if($rs3 == true){
                            $sql6 = "SELECT * FROM promocionproducto where nombre='$descripcionP' and descuento=$promocion";
                            $rs6 = pg_query($conexion, $sql6);
                            $obj6 = pg_fetch_object($rs6);                    
                            $idPromocion= $obj6->id;
                        }else{
                            echo "Ups! Algo salió mal, inténtalo mas tarde";
                        }

                    }  
                    
                }else{
                    echo "Ups! Algo salió mal, inténtalo mas tarde";
                }
                
                
           
            
            
            //$param_password = password_hash($password, PASSWORD_DEFAULT); // ENCRIPTANDO CONTRASEÑA
            $sql = "INSERT INTO producto VALUES (default,$id,$idPromocion,'$nombre','$descripcion','$hoy',$precio,'$ruta',$cantidad)";
            $rs = pg_query($conexion, $sql);
            if($rs == true){
                //header("location: index_administrador_menu_registrar_promocion.php");
                echo'<script type="text/javascript">alert("Se añadio correctamente el articulo con descuento");</script>';
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }
        }
        
        pg_close($conexion);
        
    }
    
?>