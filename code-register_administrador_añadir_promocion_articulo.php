<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";

    
    // Definir variable e inicializar con valores vacio

        
    if($_SERVER["REQUEST_METHOD"] == "POST"){

            $idArticulo=trim($_POST['id']);
            $descripcionP=trim($_POST['descripcion_descuento']);
            $promocion=trim($_POST['descuento']);

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
                        if($rs6){
                            $obj6 = pg_fetch_object($rs6);                    
                            $idPromocion= $obj6->id;

                            $sql4 = "UPDATE producto SET idpromocion= $idPromocion WHERE id=$idArticulo";
                            $rs4 = pg_query($conexion, $sql4);
                            if($rs4 == true){
                                //header("location: index_administrador_menu_listar_articulo.php");
                                echo'<script type="text/javascript">alert("El descuento se añadio correctamente");window.location.href="index_administrador_menu_listar_articulo.php";</script>';
                            }else{
                                echo "Ups! Algo salió mal, inténtalo mas tarde";
                            }


                        }
                            
                    }else{
                        echo "Ups! Algo salió mal, inténtalo mas tarde";
                    }

                }  
                
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }
            
        
        pg_close($conexion);
        
    }
    
?>