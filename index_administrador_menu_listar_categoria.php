<?php

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    include_once "conexion.php";
    include_once "code-register_administrador_eliminar_editar_categoria.php";
    
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

        
       
        <div class="name__page">
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
            <a href="#" class="selected">
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
            </a>
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



    <h1 class="title">Lista de las Categorías existentes</h1>
    <div class="container-tabla">
    
        <div class="ctn-form-tabla">
        
        <table class="tabla-categoria">
            <thead class="color_encabezado">
                <tr id="ocultar-separador">
                   
                    <th  class="borde-encabezado"><h1 class="encabezado_tabla_letra">Nombre</h1></th>
                    <th  class="borde-encabezado"><h1 class="encabezado_tabla_letra">Descripción</h1></th>
                    <th  class="borde-encabezado"><h1 class="encabezado_tabla_letra">Imagen</h1></th>
                    <th  class="borde-encabezado"><h1 class="encabezado_tabla_letra">Funciones</h1></th>
                </tr>
            </thead>
            <tbody>
            <p style=" color:brown"><?php echo $numero_producto_err; ?>.....</p>
                <?php
                $sql1 = "SELECT * FROM categoria ORDER BY id"; 
                $rs1 = pg_query( $conexion, $sql1 );
                    // Recorrer los datos de la tabla y mostrar los datos:
                    while( $obj1 = pg_fetch_object($rs1) ){?>
                    <tr>
                        <td  class="borde-encabezado color_columna1"><h1 class="fila1"><?php echo $obj1->nombre?><h1></td>
                        <td  class="borde-encabezado color_columna2"><h1 class="fila2"><?php echo $obj1->descripcion?></h1></td>
                        <td  class="borde-encabezado">  
                            <img src="<?php echo $obj1->imagen?>">
                        </td>
                        <td class="borde-encabezado color_columna2">
                            <form class="frmRegistro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                
                                <button  type="submit" name="eliminar" class="fila2"  value="<?php echo $obj1->id; ?>" onclick="ConfirmDelet();"> Eliminar</button>
                                <button  type="submit" name="editar" class="fila2"  value="<?php echo $obj1->id; ?>"> Editar</button>
                            
                            </form>
                        </td>
                    </tr>
                            
                <?php
                } 
                ?>
            </tbody>

        </table>

        </div>

    </div>










    </main>




    <script type="text/javascript">
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
    <script src="js/switAlert.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>