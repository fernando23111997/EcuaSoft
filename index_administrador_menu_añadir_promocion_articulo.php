<?php

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    include_once "conexion.php";
    include_once "code-register_administrador_añadir_promocion_articulo.php";
    include_once "code-register_administrador_eliminar_editar_articulo.php";

    $id=$_SESSION['id'];
    $nombreCate=$_SESSION['nombreCat'];
    $nombrearticulo=$_SESSION['nombrearticulo'];
    $descripcionarticulo=$_SESSION['descripcion'];
    $fecha=$_SESSION['fecha'];
    $precioarticulo=$_SESSION['precio'];
    $imagen=$_SESSION['imagen'];
    $cantidadarticulo=$_SESSION['cantidad'];



           

    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcuaSoft_Administrador</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/administrador.css">
</head>
<body id="body">
    

    <!--HEADER-->   
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>

    </header>

    <div class="menu__side" id="menu_side">

        
       
            <div class="name__page" id="selectedhome">
                <a href="index_administrador_menu.php" class="fa fa-home"></a>
                <a href="index_administrador_menu.php">EcuaSoft</a>
            </div>
        
        

        <div class="options__menu">	

            <a href="index_administrador_menu_registrar_categoria.php" class="">
                <div class="option" href="#">
                    <i class="fa fa-book" title="Registrar"></i>
                    <h4>Registrar Categoria</h4>
                </div>
            </a>
            <a href="index_administrador_menu_listar_categoria.php" class="">
                <div class="option" href="#">
                    <i class="fa fa-book" title="Registrar"></i>
                    <h4>Lista de categorias existentes</h4>
                </div>
            </a>
            <a href="#">
                <div class="option" href="#">
                    <i class="fa fa-book" title="Registrar"></i>
                    <h4>Registrar Articulos</h4>
                </div>
            </a>
            <a href="index_administrador_menu_listar_articulo.php" class="">
                <div class="option" href="#">
                    <i class="fa fa-book" title="Registrar"></i>
                    <h4>Lista de los artículos existentes</h4>
                </div>
            <a href="index_administrador_menu_registrar_promocion.php" class="">
                <div class="option" href="#">
                    <i class="fa fa-book" title="Registrar"></i>
                    <h4>Registrar artículo con descuento</h4>
                </div>
            </a>
            
            <a href="index_administrador_menu_listar_usuario.php" class="">
                <div class="option" href="#">
                    <i class="fa fa-book" title="Registrar"></i>
                    <h4>Lista de usuarios registrados</h4>
                </div>
            </a>
            
           
            <a href="cerrar-sesion.php">
                <div class="option">
                    <i class="fa fa-sign-out" title="Buscar"></i>
                    <h4>cerrar sesion</h4>
                </div>
            </a>
           

        </div>

    </div>

    <main>

        
        <div class="container-all">
            
            <div class="ctn-form">
                <h1 class="title">Añadir promocion al Artículo</h1>
                <form class="frmRegistro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                    <label>Descripcion de descuento</label>
                    <input type="text" name="descripcion_descuento">

                    <label>Porcentaje de descuento (%)</label>
                    <input class="input_css" type="number" name="descuento" step="0.1">
                    
                    
                    <input style="display: none;" type="text" name="id" value="<?php echo $id; ?>">
                    <label>Nombre de categoría</label>
                    <input type="text" name="categoria" value="<?php echo $nombreCate; ?>" list="listaCategorias" disabled>
                    
                    
                    <label>Nombre del artículo</label>
                    <input type="text" name="nombre" value="<?php echo $nombrearticulo; ?>" disabled>
                    

                    <label>Descripcion del Articulo</label>
                    <textarea style="height:100px ;" class="input" type="text" name="descripcion" disabled><?php echo $descripcionarticulo; ?></textarea>
                    
                    <label>Precio</label>
                    <input class="input_css" type="number" value="<?php echo $precioarticulo;?>" name="precio" step="0.01" disabled>
                    
                    
                    <label>Cantidad</label>
                    <input class="input_css" type="number" value="<?php echo $cantidadarticulo;?>" name="cantidad" step="1" disabled>
                    

                    <label>Imagen característica</label>
                    <input type="file" name="imagen" id="foto" onchange="vista_preliminar(event)" disabled>
                    <img src="<?php echo $imagen; ?>" alt="" id="img-foto">

                    <input class="enviar" type="submit"  value="Añadir promoción">

                </form>
            </div>
            
        </div>




        
   





















   


    </main>

    <datalist id="listaCategorias">
        <?php
            $sql = "SELECT * FROM categoria ORDER BY id"; 
            $rs = pg_query( $conexion, $sql );
            if( $rs )
            {
                // Obtener el número de filas:
                if( pg_num_rows($rs) > 0 )
                {
                    // Recorrer los datos de la tabla y mostrar los datos:
                    while( $obj = pg_fetch_object($rs) ){
                        //echo $obj->id." - ".$obj->nombre."<br />";
                        echo "<option>".$obj->nombre."</option>";
                    }
                }
                        
            }
        ?>
    </datalist> 



    <script>
        let vista_preliminar = (event)=>{

            let leer_img = new FileReader();
            let id_img = document.getElementById('img-foto');

            leer_img.onload =()=>{
                if(leer_img.readyState==2){
                    id_img.src =leer_img.result
                }
            }

            leer_img.readAsDataURL(event.target.files[0])
        }

    </script>

















    




    
    
    
    
    
    
    <script src="js/scriptt.js"></script>
</body>
</html>