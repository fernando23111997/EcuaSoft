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
    <link rel="stylesheet" href="css/estilos-index.css">
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
                <a>Bienvenido <spam><?php echo "$nombre" ?></spam></a>
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
                                <a class="ic_a"  id="selected"><spam class="spam_1"><?php echo "$nombre" ?></spam></a>
                                
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
                            <li><a href="articulos_logeado.php">Artículos</a></li>
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
                                                <button style="width: 48%; height:50PX; transform: scale(1); background: #0074C7; font-size: 15px; color:#fff;" type="submit" name="eliminar_c" class="fila2"  value="<?php echo $objll->id; ?>"> 
                                                            
                                                            ELIMINAR
                                                </button>
                                                <button style="width: 48%; height:50PX; transform: scale(1); background: #0074C7; font-size: 15px; color:#fff;" type="submit" name="actualizarCantidad" class="fila2"  value="<?php echo $objll->id; ?>"> 
                                                            
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
                                            <button style="width: 100%; height:50PX; transform: scale(1); background: #0074C7; font-size: 16px; color:#fff;" type="submit" name="pagar" class="fila2"  value="<?php echo ""; ?>">               
                                                PAGAR
                                            </button>
                                        </form>
                                    </div>
                                    
                                </ul>
                            </li>
                            <li class="login_icon">
                                <a href="#"><spam class="far fa-user-circle"></spam>PERFIL</a>  
                                
                        
                                <div class="ocultar">
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
                                </div>

                          


                            </li>
                        </ul>
                    </nav>
                </div>
                
            </div>    
    
        </div> 
            
        


    </header>
<!--FIN DE HEADER-->

<!--PORTADA--> 
            <div class="container-portada">
                <div class="capa-gradient"></div>
                <div class="container-details">
                    <div class="details">
                        <h1>EcuaSoft te da la bienvenida</h1>
                        <p>EcuaSoft es una empresa independiente dedicada a la venta de artículos tecnologicos, ahora ya con servicio de tienda en linea que se ha diseñado pensando en el cliente. </p>
                        <button>Ver mas detalles</button>
                    </div>
                </div>
            </div>
      
<!--FIN DE PORTADA-->
    
    
    
    
    
<!--texto centrado-->   
         <article class="articulo_uno">
            <h4>Busque a la medida de sus necesidades</h4>
            <hr>
            <p>Desde computadoras, smartphones, audífonos equipos gamers y dispositivos periféricos etc.</p>

        </article>
<!--fin texto-->    
    
    
    
 
    
    
<!--Texto-->
    
 <main>

        <div class="content-twotwo">
            <div class="content-detailsdetails">
                <div class="content-item2">
                    <label class="icon-heart"></label>
                    <h4>Computadoras</h4>
                    <p>Podras encontrar laptos, computadoras de escritorio de todas las marcas y a los precios mas accesibles en el mercado.</p>
                    
                </div>
                <div class="content-item2">
                    <label class="icon-laptop"></label>
                    <h4>Smartphones</h4>
                    <p>Telefonos inteligentes, tablets encuentra lo que buscar con solo un clic, disponible todas las marcas.</p>
                    
                </div>
                <div class="content-item2">
                    <label class="icon-support"></label>
                    <h4>Equipos Gamer</h4>
                    <p>Computadora con las mejores caracteristicas para eos juegos que exigen bastante en cuanto a rendimiento.</p>
                    
                </div>
            </div>
        </div>
     
     
     
     <h3 class="titulo_articulo2">ARTÍCULOS</h3>
     
     
        <div class="content-three0">
            <div class="content-three">
                <div class="content-module">
                    <img src="images/img2.png">
                    <img src="images/img3.png">
                    <img src="images/img4.png">
                </div>
            </div>
        </div>
     
        <div class="content-for">
            <div class="content-item3">
                <h4>Encuentra todo lo que buscas</h4>
                <p>Pierdes mucho tiempo en buscar artículos tecnológicos relevantes de tu sector?<br><br>¡Estás de suerte!<br><br>Este sitio web te permite encontrar información y artículos tecnológicos según las categorías que hayas seleccionado y brinda la confianza en tener la mejor experiencia..</p>
                <img src="images/img5.png">
            </div>
            <div class="content-five">
                <div class="content-item4">
                    <h4>Busca desde la comodidad de tu hogar.</h4>
                    <p>Imagina cuánto tiempo ahorrarás al no tener que salir de casa.</p>
                </div>
            </div>
        </div>
    </main>   
    
    
    
    
    
    
 <!--Fin de Texto--> 
    
    
    
<!-- Inicio de footer------------------------------------------------>    
    
    <footer>
       
       <div class="container-footer-all">
        
            <div class="container-body">

                <div class="colum1">
                    <h1>Mas información de la compañia</h1>

                    <p>Esta compañia se dedica a la venta de articulos tecnologicos con un 
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