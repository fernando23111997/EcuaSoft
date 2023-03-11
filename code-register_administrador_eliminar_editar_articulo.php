<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";
    

    
    // Definir variable e inicializar con valores vacio
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST['eliminar'])){
            $id1=$_POST['eliminar'];


            
            $sql8 = "DELETE FROM categoria where id=$id1";
            // Ejecutar la consulta:
            $rs8 = pg_query( $conexion, $sql8 );
            echo'<script type="text/javascript">alert("Artículo eliminado exitosamente");</script>';

        }

        if(isset($_POST['editar'])){


            $idCT=$_POST['editar'];
            $sql8 = "SELECT * FROM producto where id=$idCT";
            // Ejecutar la consulta:
            $rs8 = pg_query( $conexion, $sql8 );
            $obj8 = pg_fetch_object($rs8);
            $id=$obj8->id;
            $idCat =$obj8->idcategoria;
            $nombre11 =$obj8->nombre;
            $descripcion11 =$obj8->descripcion;
            $fecha11=$obj8->fecha;
            $precio111=$obj8->precio;
            $imagen11=$obj8->imagen;
            $cantidad111=$obj8->cantidad;


            

            
            $sql = "SELECT * FROM categoria WHERE id =$idCat";
            $rs = pg_query($conexion, $sql);
            while( $obj = pg_fetch_object($rs) )
            $idcategoria= $obj->nombre;
            $_SESSION['nombreCat']=$idcategoria;

            $_SESSION['id']=$id;    
            $_SESSION['nombrearticulo']=$nombre11;
            $_SESSION['descripcion']=$descripcion11;
            $_SESSION['fecha']=$fecha11;
            $_SESSION['precio']=$precio111;
            $_SESSION['imagen']=$imagen11;
            $_SESSION['cantidad']=$cantidad111;

            header("location: index_administrador_menu_editar_articulo.php");

        }
        if(isset($_POST['promocion'])){


            $idCT=$_POST['promocion'];
            $sql8 = "SELECT * FROM producto where id=$idCT";
            // Ejecutar la consulta:
            $rs8 = pg_query( $conexion, $sql8 );
            $obj8 = pg_fetch_object($rs8);
            $id=$obj8->id;
            $idCat =$obj8->idcategoria;
            $nombre11 =$obj8->nombre;
            $descripcion11 =$obj8->descripcion;
            $fecha11=$obj8->fecha;
            $precio111=$obj8->precio;
            $imagen11=$obj8->imagen;
            $cantidad111=$obj8->cantidad;


            

            
            $sql = "SELECT * FROM categoria WHERE id =$idCat";
            $rs = pg_query($conexion, $sql);
            while( $obj = pg_fetch_object($rs) )
            $idcategoria= $obj->nombre;
            $_SESSION['nombreCat']=$idcategoria;

            $_SESSION['id']=$id;    
            $_SESSION['nombrearticulo']=$nombre11;
            $_SESSION['descripcion']=$descripcion11;
            $_SESSION['fecha']=$fecha11;
            $_SESSION['precio']=$precio111;
            $_SESSION['imagen']=$imagen11;
            $_SESSION['cantidad']=$cantidad111;

            header("location: index_administrador_menu_añadir_promocion_articulo.php");

        }
        if(isset($_POST['categoria'])){

            $idCat=$_POST['categoria'];
            $_SESSION['idCat']=$idCat;    
            header("location: categoria_logeado.php");

        }
        if(isset($_POST['categoriaa'])){

            $idCat=$_POST['categoriaa'];
            $_SESSION['idCata']=$idCat;    
            header("location: categoria.php");

        }
        if(isset($_POST['detalles'])){

            $iddet=$_POST['detalles'];
            $_SESSION['detalles']=$iddet;    
            
            header("location: promociones_logeado_visualizacion.php");

        }
        if(isset($_POST['detalless'])){

            $iddet=$_POST['detalless'];
            $_SESSION['detalless']=$iddet;    
            
            header("location: promociones_visualizacion.php");

        }

        if(isset($_POST['detalles1'])){

            $iddet2=$_POST['detalles1'];
            $_SESSION['detalles1']=$iddet2;    
            
            header("location: articulo_logeado_visualizacion.php");

        }
        if(isset($_POST['d'])){

            $iddet2=$_POST['d'];
            $_SESSION['d']=$iddet2;    
            
            header("location: articulo_visualizacion.php");

        }
        if(isset($_POST['detalles3'])){

            $iddet2=$_POST['detalles3'];
            $_SESSION['detalles3']=$iddet2;    
            
            header("location: categoria_logeado_visualizacion.php");

        }
        if(isset($_POST['detalles4'])){

            $iddet2=$_POST['detalles4'];
            $_SESSION['detalles4']=$iddet2;    
            
            header("location: categoria_visualizacion.php");

        }


        
    }
    
    
    
?>