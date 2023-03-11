<?php

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    include_once "conexion.php";
    include_once "code-register_administrador_promocion.php"
    
    
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
            <a href="index_administrador_menu_registrar_articulo.php" class="">
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
            <a href="#" class="selected">
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
                <h1 class="title">Registrar artículo con un descuento</h1>
                <form class="frmRegistro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                
                    <label>Descripcion de la promoción</label>
                    <input type="text" name="descripcionP">
                    <span class="msg-error"><?php echo $descripcionP_err; ?></span>

                    <label>porcentaje de la promoción (%)</label>
                    <input class="input_css" type="number" name="promocion" step="1">
                    <span class="msg-error"><?php echo $promocion_err; ?></span>
                    
                    <label>Sleccione la categoría</label>
                    <input type="text" name="categoria" list="listaCategorias">
                    <span class="msg-error"><?php echo $categoria_err; ?></span>

                    <label>Nombre del artículo</label>
                    <input type="text" name="nombre">
                    <span class="msg-error"><?php echo $nombre_err; ?></span>

                    <label>Descripcion del Articulo</label>
                    <textarea class="input" type="text" name="descripcion"></textarea>
                    <span class="msg-error"><?php echo $descripcion_err; ?></span>

                    <label>Precio</label>
                    <input class="input_css" type="number" name="precio" step="0.01">
                    <span class="msg-error"> <?php echo $precio_err; ?></span>
                    
                    <label>Cantidad</label>
                    <input class="input_css" type="number" name="cantidad" step="1">
                    <span class="msg-error"> <?php echo $cantidad_err; ?></span>

                    <label>Imagen característica</label>
                    <input type="file" name="imagen" id="foto" onchange="vista_preliminar(event)">
                    <span class="msg-error"><?php echo $imagen_err; ?></span>
                    <img src="" alt="" id="img-foto">

                    <input class="enviar" type="submit" onclick="" value="Registrar artículo">

                </form>
            </div>
            
        </div>




        
   





















   


    </main>
    <datalist id="listaCategorias">
        <?php
            $sql4 = "SELECT * FROM categoria ORDER BY id"; 
            $rs4 = pg_query( $conexion, $sql4 );
            if( $rs4 )
            {
                // Obtener el número de filas:
                if( pg_num_rows($rs4) > 0 )
                {
                    // Recorrer los datos de la tabla y mostrar los datos:
                    while( $obj = pg_fetch_object($rs4) ){
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

        function ConfirmDelet()
        {
           //Ingresamos un mensaje
            var mensaje = confirm("¿Estas seguro de registrar la promoción?");
            //Verificamos si el usuario acepto el mensaje
            if (mensaje) {
                alert("Promocion registrado correctamente");
            }
            //Verificamos si el usuario denegó el mensaje
            else {
                alert("No has registrado la promocion");
            }
   
        }

    </script>

















    




    
    
    
    
    
    
    <script src="js/scriptt.js"></script>
</body>
</html>