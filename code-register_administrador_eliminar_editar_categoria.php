<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";

    
    // Definir variable e inicializar con valores vacio
    $id= $numero_producto = "";

    $numero_producto_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){



            if(isset($_POST['eliminar'])){
                $id=$_POST['eliminar'];
    
                $sql7 = "SELECT * FROM producto where idcategoria=$id";
                // Ejecutar la consulta:
                $rs7 = pg_query( $conexion, $sql7 );
                if( $rs7 )
                {
                    // Obtener el número de filas:
                    if( pg_num_rows($rs7) > 0 ){
                        $numero_producto= pg_num_rows($rs7);
                        $numero_producto_err="Error existen ".$numero_producto." productos relacionados a esta categoria";
                        echo'<script type="text/javascript">alert("No se puede eliminar esta categoria por que contienes articulos registrados");</script>';                       
                    }
                    else{
                        $sql8 = "DELETE FROM categoria where id=$id";
                        // Ejecutar la consulta:
                        $rs8 = pg_query( $conexion, $sql8 );
                        echo'<script type="text/javascript">alert("Categoria eliminada");</script>';
                    }
                        
                }
                
    
            }

       

        if(isset($_POST['editar'])){
            $id=$_POST['editar'];
            $idCT=$_POST['editar'];
            $sql8 = "SELECT * FROM categoria where id=$idCT";
            // Ejecutar la consulta:
            $rs8 = pg_query( $conexion, $sql8 );
            $obj8 = pg_fetch_object($rs8);
            $nombre11 =$obj8->nombre;
            $descripcion11 =$obj8->descripcion;
            $imagen11=$obj8->imagen;

            $_SESSION['id']=$id;
            $_SESSION['nombreCat']=$nombre11;
            $_SESSION['descripcion']=$descripcion11;
            $_SESSION['imagen']=$imagen11;
            
            header("location: index_administrador_menu_editar_categoria.php");

        }

        
    }
    
    
    
?>