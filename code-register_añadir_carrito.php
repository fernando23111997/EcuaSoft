<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";
    $idUsuario=$_SESSION['id'];

    $existe = $cantidad_err = "";
    // Definir variable e inicializar con valores vacio
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        

        
        if(isset($_POST['carrito'])){

            $idProducto=$_POST['carrito'];

            
            $sql8 = "SELECT* FROM carrito where idproducto=$idProducto";
            // Ejecutar la consulta:
            $rs8 = pg_query( $conexion, $sql8 );

            if($rs8 == true){
                if( pg_num_rows($rs8) == 1 ){
                    $existe="El articulo ya se encuentra en el carrito";
                }
            }else{
                echo "Ups! Algo salió mal, inténtalo mas tarde";
            }


        }
        if(empty($_POST['cantidad'])){
            $cantidad_err="La cantidad debe ser diferente de 0";
        }else{
            $cantidad=$_POST['cantidad'];
        }

        if(empty($existe) && empty($cantidad_err)){

                $sql11 = "SELECT* FROM producto where id=$idProducto";
                // Ejecutar la consulta:
                $rs11 = pg_query( $conexion, $sql11 );
                if($rs11 == true){

                    $obj11 = pg_fetch_object($rs11);
                    $cnt=$obj11->cantidad;
                    if( $cnt == 0 ){
                        $existe="Articulo agotado";
                    }else{

                        if($cnt>$cantidad){
                            $sql9 = "INSERT INTO carrito VALUES (default,$idUsuario,$idProducto,$cantidad)";
                            // Ejecutar la consulta:
                            $rs9 = pg_query( $conexion, $sql9 );
                            echo'
                                <script type="text/javascript">
                                    alert("Artículo añadido exitosamente);
                                    window.location.href="articulo_logeado_visualizacion.php";
                                </script>
                            
                            ';
                            $existe="Artículo añadido correctamente";


                            //$sql4 = "UPDATE producto SET cantidad=($cnt-$cantidad) WHERE id=$idProducto";
                            //$rs4 = pg_query($conexion, $sql4);
                            //if($rs4 == true){
                            
                            //}else{
                            //    echo "Ups! Algo salió mal, inténtalo mas tarde";
                            //}

                        }else{
                            $existe="Error: Cantidad de articulos insuficientes";
                        }



                    }
                }else{
                    echo "Ups! Algo salió mal, inténtalo mas tarde";
                }

                   
        }


        if(isset($_POST['eliminar_c'])){

            $idCarrito=$_POST['eliminar_c'];

            
            $sql8 = "DELETE FROM carrito where id=$idCarrito";
            // Ejecutar la consulta:
            $rs8 = pg_query( $conexion, $sql8 );
            echo'<script type="text/javascript">alert("Artículo eliminado del carrito");</script>';

        }

        if(isset($_POST['actualizarCantidad'])){

            $idCarrito2=$_POST['actualizarCantidad'];
            $cantidad_carrito=$_POST['cantidad_carrito'];
            
            $sql8 = "UPDATE carrito SET cantidad= $cantidad_carrito WHERE id=$idCarrito2";
            // Ejecutar la consulta:
            $rs8 = pg_query( $conexion, $sql8 );
            echo'<script type="text/javascript">alert("Cantidad actualizada");</script>';

        }


        
    }
    
    
    
?>