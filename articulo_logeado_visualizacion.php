<?php

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    $correo_usuario=$_SESSION["email"];
    $nombre=$_SESSION["nombre"];
    $idUsuario=$_SESSION['id'];
    include_once "conexion.php";
    include_once "code-register_administrador_eliminar_editar_articulo.php";
    $iddet2=$_SESSION['detalles1'];
    include_once "code-register_añadir_carrito.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcuaSoft index</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/what_messe.css">
    
    <link rel="stylesheet" href="css/promociones_logeado.css">
</head>
<body>
<!--HEADER-->   
    <header>
        <div class="header__superior">
            <div class="logo">
                <img src="img/logo.png" alt="">
            </div>
            <div class="search">
                <input type="search" placeholder="¿Qué deseas buscar?">
                <a class="fas fa-search"></a>
            </div>
            <div class="icon_redes">
                <a href="" class="fab fa-facebook"></a>
                <a href="" class="fab fa-google"></a>
                <a href="" class="fab fa-instagram-square"></a>
							
            </div>
            
            
            <div class="Bienvenido_user">
                <a>Bienvenido<spam> <?php echo "$nombre" ?></spam></a>
            </div>
            
        </div>
        

        <div class="header__inferior">
            <div class="container__menu">
                <div class="menu">
                    <input type="checkbox" id="check__menu">
                    <label for="check__menu" id="label__check">
                        <i class="fas fa-bars icon__menu"></i>
                    </label>
                    <nav class="contenedor_lista">
                        <ul class="lista1">
                            <li clase="icon__home">
                                <a href="index_logeado.php" class="ic_a"><spam class="spam_1">EcuaSoft cañar</spam></a>
                                
                            </li>
                            <li><a href="servicios_logeado.php">¿QUIENES SOMOS?</a>
                            </li>
                            <li><a href="categoria_logeado_menu.php">Categorias</a>
                                <ul class="sub_list">

                                    <form class="frmRegistro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <?php
                                        $sql1 = "SELECT * FROM categoria ORDER BY id"; 
                                        $rs1 = pg_query( $conexion, $sql1 );
                                        // Recorrer los datos de la tabla y mostrar los datos:
                                        while( $obj1 = pg_fetch_object($rs1) ){?>
                                            <li>
                                                <a>
                                                    <button type="submit" name="categoria" class="fila2"  value="<?php echo $obj1->id; ?>"> 
                                                    
                                                        <?php echo $obj1->nombre?>
                                                    </button>
                                                </a>
                                            </li>
                                        <?php
                                        } 
                                        ?>
                                        
                                    </form>


                                </ul>
                            </li>
                            <li><a href="articulos_logeado.php" id="selected">Artículos</a></li>
                            <li><a href="promociones_logeado.php">Promociones</a></li>
                            
                            
                        </ul>
                    </nav>
                </div>
            </div>
            
            <div class="container__menu1">
                <div class="menu1">
                    
                    
                    <input type="checkbox" id="check__menu1">
                    <label for="check__menu1" id="label__check1">
                        <i class="fa fa-user icon__menu1"></i>
                        
                        
                    </label>
                    
                    <nav class="contenedor_lista1">
                        <ul class="lista2">
                            <li class="carrito_icon">
                                <a href="#" class="fas fa-shopping-cart"></a>


                                <ul style="left: -238px; width: 300px; height:500px; overflow: hidden; overflow-y: hidden; overflow-y: auto;" class="sub_list1">
                                    
                                    <div>
                                        <li>
                                            <a style="width: 100%; text-align: center; font-size: 16px;" href="#" class="usuario_mayuscula">BOLSA</a>
                                        </li>
                                    </div>
                                    
                                    
                                    <div class="separador_sombra">
                                        
                                    </div>



                                        <?php
                                        $sqlll = "SELECT * FROM carrito where idusuario=$idUsuario"; 
                                        $rsll = pg_query( $conexion, $sqlll );
                                        if( pg_num_rows($rsll) > 0 ){
                                        
                                        


                                        // Recorrer los datos de la tabla y mostrar los datos:
                                        while( $objll = pg_fetch_object($rsll) ){
                                            
                                            $sql0 = "SELECT * FROM producto where id=$objll->idproducto"; 
                                            $rs0 = pg_query( $conexion, $sql0 );
                                            $obj0 = pg_fetch_object($rs0);
                                            
                                            $sql01 = "SELECT * FROM promocionproducto where id=$obj0->idpromocion"; 
                                            $rs01 = pg_query( $conexion, $sql01 );
                                            $obj01 = pg_fetch_object($rs01);
                                        ?>

                                            
                                        <form style=" margin: 10px;" class="frmRegistro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        
                                        
                                                <?php
                                                if($obj0->idpromocion!=0){?>

                                                    <p style="text-decoration: line-through; color:brown;"><?php echo $obj0->precio." $$";?></p>

                                                <?php
                                                }
                                                ?>
                                            
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <img style="width: 90px;" src="<?php echo $obj0->imagen?> " alt="">
                                                <p style="width: 100px;"><?php echo $obj0->nombre?> </p>
                                                <input style="border:2px solid; background: #fff; text-align: center; width: 50px;" class="input_css" type="number" name="cantidad_carrito" value="<?php echo $objll->cantidad;?>" step="1">
                                                
                                            </div>
                                            <p><?php echo (((($obj0->precio)*$obj01->descuento)/100)-($obj0->precio))*(-1)." $";?></p>
                                            
                                                <?php
                                                if($obj0->idpromocion!=0){?>

                                                    <p style="width: 100%;"><?php echo "Descuento del: ".$obj01->descuento."% por ".$obj01->nombre;?> </p>

                                                <?php
                                                }
                                                ?>
                                            
                                            
                                            




                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <button style="width: 48%; height:50PX; transform: scale(1); background: #0074C7; font-size: 15px;" type="submit" name="eliminar_c" class="fila2"  value="<?php echo $objll->id; ?>"> 
                                                            
                                                            ELIMINAR
                                                </button>
                                                <button style="width: 48%; height:50PX; transform: scale(1); background: #0074C7; font-size: 15px;" type="submit" name="actualizarCantidad" class="fila2"  value="<?php echo $objll->id; ?>"> 
                                                            
                                                            ACTUALIZAR CANTIDAD
                                                </button>
                                                
                                            </div>
                                            
                                            <div class="separador_sombra">
                                        
                                        </div>

                                        </form>
                                    
                                    <?php
                                        }

                                    }else{?>
                                        <p style="width: 100px;">No hay artículos en el carrito</p>
                                    <?php  
                                    }
                                    ?>
                                    
                                    <div>
                                        <form style=" margin: 10px;" class="frmRegistro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <button style="width: 100%; height:50PX; transform: scale(1); background: #0074C7; font-size: 16px;" type="submit" name="pagar" class="fila2"  value="<?php echo ""; ?>">               
                                                PAGAR
                                            </button>
                                        </form>
                                    </div>
                                    
                                </ul>




                            </li>
                            <li class="login_icon">
                                <a href="#"><spam class="far fa-user-circle"></spam>perfil</a>
                                
                                <ul class="sub_list1">
                                    
                                    <div>
                                        <li>
                                            <a href="#" class="usuario_mayuscula"><spam class="far fa-user-circle"></spam><?php echo "$nombre" ?></a>
                                            
                                            <a class="usuario_correo"><?php echo "$correo_usuario" ?></a>
                                        </li>
                                    </div>
                                    
                                    
                                    <div class="separador_sombra">
                                        
                                    </div>
                                    <li><a href="#">Ver perfil</a></li>
                                    <li><a href="#">Editar perfil</a></li>
                                    
                                    <div class="separador_sombra">
                                        
                                    </div>
                                    <div>
                                        <li >
                                            <a href="cerrar-sesion.php" class="cerrar_sesion_texto">Cerrar sesion</a>
                                        </li>
                                    </div>
                                    
                                </ul>





                            </li>
                        </ul>
                    </nav>
                </div>
                
            </div>
            
    
        </div> 
            
        


    </header>
<!--FIN DE HEADER-->
    
    










    
<!--INFORMCACION EN FILAS-->    
        <div class="texto_titulo">
            <h4>DETALLES</h4>
        </div>

        <div class="container_aall">
            <div class="container">
                <?php
                    $sql2 = "SELECT * FROM producto Where id=$iddet2"; 
                    $rs2 = pg_query( $conexion, $sql2 );
                    // Recorrer los datos de la tabla y mostrar los datos:
                    $obj2 = pg_fetch_object($rs2);?>





                        <?php
                            $sql4 = "SELECT nombre, descuento FROM promocionproducto where id=$obj2->idpromocion"; 
                            $rs4 = pg_query( $conexion, $sql4 );
                            // Recorrer los datos de la tabla y mostrar los datos:
                            $obj4 = pg_fetch_object($rs4);

                        ?>
                    <div style="width: 80%;" class="descuento_promocion">
                        <p style="text-decoration: line-through; color:brown;"><?php echo $obj2->precio." $$";?></p>
                        <p style=""><?php echo "Descuento ".$obj4->descuento." %";?></p>
                    </div>    
                    <p style=""><?php echo $obj4->nombre;?></p>





                    <img src="<?php echo $obj2->imagen;?>" alt="">
                    <p><?php echo (((($obj2->precio)*$obj4->descuento)/100)-($obj2->precio))*(-1)." $";?></p>
                    <p style=""><?php echo "Productos existentes: ".$obj2->cantidad;?></p>
            </div>
            <div class="container2">
                    <h4><?php echo $obj2->nombre;?></h4>
                    <p style=""><?php echo $obj2->descripcion;?></p>

                    



                
    
                <form class="centrar" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label>Cantidad</label>
                    <input style="border:2px solid; background: #fff; text-align: center;" class="input_css" type="number" name="cantidad" value="1" step="1">
                    <span class="msg-error"> <?php echo $cantidad_err; ?></span>

                    <button style="margin:10px;" type="submit" name="carrito" value="<?php echo $obj2->id; ?>">Añadir al carrito </button>
                    <p style="color: brown;" style=""><?php echo $existe;?></p>
                </form>
                
            </div>
        </div>
      
        



















       
    
<!--FIN DE INFORMCACION EN FILAS-->   





    
    
<!--Texto-->
    
 <!--Fin de Texto--> 
    
    
    
<!-- Inicio de footer------------------------------------------------>    
    
    <footer>
       
       <div class="container-footer-all">
        
            <div class="container-body">

                <div class="colum1">
                    <h1>Mas información de la compañia</h1>

                    <p>Esta compañia se dedica a la venta de software integrado con un 
                    conjunto de cosas que no se lo que estoy escribiendo, este 
                    texto es solo para llenara informacion en el cuadro de informacion 
                    de la compañia.</p>

                </div>

                <div class="colum2">

                    <h1>Redes Sociales</h1>

                    <div class="row">
                        <img src="icon/facebook.png">
                        <label>Siguenos en Facebook</label>
                    </div>
                    <div class="row">
                        <img src="icon/twitter.png">
                        <label>Siguenos en Twitter</label>
                    </div>
                    <div class="row">
                        <img src="icon/instagram.png">
                        <label>Siguenos en Instagram</label>
                    </div>
                    <div class="row">
                        <img src="icon/google-plus.png">
                        <label>Siguenos en Google Plus</label>
                    </div>
                    <div class="row">
                        <img src="icon/pinterest.png">
                        <label>Siguenos en Pinteres</label>
                    </div>


                </div>

                <div class="colum3">

                    <h1>Información Contactos</h1>

                    <div class="row2">
                        <img src="icon/house.png">
                        <label>Cañar, Av. principal
                        siempre viva calle 1235</label>
                    </div>

                    <div class="row2">
                        <img src="icon/smartphone.png">
                        <label>+593 987458793</label>
                    </div>

                    <div class="row2">
                        <img src="icon/contact.png">
                         <label>EcuaSoft@gmail.com</label>
                    </div>

                </div>

            </div>
        
        </div>
        
        <div class="container-footer">
               <div class="footer">
                    <div class="copyright">
                        © 2022 Todos los Derechos Reservados | <a href="">EcuaSoft</a>
                    </div>

                    <div class="information">
                        <a href="">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos y Condiciones</a>
                    </div>
                </div>

            </div>
        
    </footer>
    
<!--Fin de footer--------------------------------------------------->  
    
    
    
<!--INTEGRACION DE WHATSAP Y MESSENGER EN LA PAGINA------------------>

    <div class="container-redes">

        <a href="https://api.whatsapp.com/send?phone=593979111981&text=¿Qué servicios ofrecen?" target="_blank">

            <img src="icon/icon-whatsapp.gif" title="Enviar mensaje de WhatsApp" alt="">

        </a>

        <a href="http://m.me/manuel.chogllo.9" target="_blank">

            <img src="icon/icon-messenger.gif" alt="" title="Enviar mensaje por Messenger">

        </a>

    </div>
    
<!--FIN DE INTEGRACION DE WHATSAP Y MESSENGER EN LA PAGINA------------------>   
    
    
    
    
    
    
    
</body>
</html>