<?php

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    include_once "conexion.php";
    include_once "code-register_administrador_eliminar_editar_categoria.php";

    
    $nombre1=$_SESSION['nombreCat'];
    $descripcion1=$_SESSION['descripcion'];
    $imagen1=$_SESSION['imagen'];
    $idCategoria=$_SESSION['id'];

    include_once "code-register_administrador_editar_categoria.php";
    
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

            <a href="#">
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



    <div class="container-all">

        <div class="ctn-form">
            <h1 class="title">Editar Categoría</h1>

            <form class="frmRegistro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                <label for="">Nombre de categoría</label>
                <input style="display: none;" type="text" value="<?php echo $idCategoria; ?>" name="id" required>
                <input type="text" value="<?php echo $nombre1; ?>" name="nombre" required>
                

                <label for="">Descripcion de categoria</label>
                <textarea style="height: 80px;" type="text" name="descripcion"><?php echo $descripcion1; ?></textarea>
                

                <label for="">Imagen característica</label>
                <input type="file" name="imagen" value="" id="foto" onchange="vista_preliminar(event)">
                <span class="msg-error"><?php echo $imagen_err; ?></span>
                <img src="<?php echo $imagen1; ?>" alt="" id="img-foto">
            
                <input class="enviar" type="submit"  value="Actualizar categoría"> 

            </form>
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


        function ConfirmDelet()
        {
           //Ingresamos un mensaje
            var mensaje = confirm("¿Confirmar registro de Categoria?");
            //Verificamos si el usuario acepto el mensaje
            if (mensaje) {
                alert("¡Gracias por confirmar!");
            }
            //Verificamos si el usuario denegó el mensaje
            else {
                alert("¡Haz denegado el mensaje!");
            }
   
        }



    </script>





    
    
    
    
    
    <script src="js/scriptt.js"></script>
    <script src="js/switAlert.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>