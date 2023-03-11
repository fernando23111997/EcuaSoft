<?php

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    $correo_usuario=$_SESSION["email"];
    $nombre=$_SESSION["nombre"];
    include_once "conexion.php";
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
            <i href="index_administrador_menu.php" class="fa fa-home"></i>
            <h4 href="index_administrador_menu.php">EcuaSoft</h4>
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


    <?php
    $sql = "SELECT * FROM producto ORDER BY id"; 
    $rs = pg_query( $conexion, $sql );
    if($rs == true){
        $cantidad_articulo = pg_num_rows($rs); 
    }

    $sql1 = "SELECT * FROM categoria ORDER BY id"; 
    $rs1 = pg_query( $conexion, $sql1 );
    if($rs1 == true){
        $cantidad_categoria = pg_num_rows($rs1); 
    }

    $sql2 = "SELECT * FROM usuario ORDER BY id"; 
    $rs2 = pg_query( $conexion, $sql2 );
    if($rs1 == true){
        $cantidad_usuario = pg_num_rows($rs2); 
    }

    $sql3 = "SELECT * FROM promocionproducto ORDER BY id"; 
    $rs3 = pg_query( $conexion, $sql3 );
    if($rs3 == true){
        $cantidad_promocion = pg_num_rows($rs3); 
    }

    
    ?>

    <main>




    
        
        <div class="container_administrador">
        
            <div class="opciones_contenedor">
                <i class="fa fa-check-circle iciono_inicio_admin" aria-hidden="true"></i>
                <h1>Bienvenido</h1>
                <p>Le presentamos información <br>disponible en la tienda en linea actualmente </p>
                <table class="td_inicio_admin">
                    <tr>
                        <td>
                            <p>Usuarios registrados en la pagina</p>
                            <div class="one" style="width:100px ;" ><a><?php echo $cantidad_usuario?></a></div>
                        </td>
                        <td>
                            <p>Categorias Disponibles</p>
                            <div class="one" style="width:100px ;"><a><?php echo $cantidad_categoria?></a></div>
                        </td>
                        <td>    
                            <p>Artículos disponibles</p>
                            <div class="one" style="width:100px ;"> <a><?php echo $cantidad_articulo?></a></div>
                        </td>
                        <td>    
                            <p>Cantidad de articulos en promoción</p>
                            <div class="one" style="width:100px ;"> <a><?php echo $cantidad_promocion?></a></div>
                        </td>
                       
                        
                                  
                    </tr>
                </table>
                

            </div>
            
            
        </div>

    




    </main>





















    




    
    
    
    
    
    
   <script src="js/scriptt.js"></script>
</body>
</html>