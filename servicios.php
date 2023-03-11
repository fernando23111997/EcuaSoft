<?php

    include_once "conexion.php";

    include_once "code-register_administrador_eliminar_editar_articulo.php";
    

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
    <link rel="stylesheet" href="css/servicio.css">

</head>
<body>
<!--HEADER-->   
    <header>
        <div class="header__superior">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.png" alt="">
                </a>
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
                <a>Bienvenido</a>
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
                                <a href="index.php" class="ic_a"><spam class="spam_1"><?php echo "$nombre" ?></spam></a>
                                
                            </li>
                            <li><a id="selected" href="#">¿Quienes somos?</a>
                                
                            </li>
                            <li><a href="categoria_menu.php">Categorias</a>
                                
                            </li>
                            <li><a href="articulos.php" >Artículos</a></li>
                            <li><a href="promociones.php">Promociones</a></li>
                            
                            
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

                                 
                                        <p style="width: 100px;">No hay artículos en el carrito</p>
                                    
                                    

                                </ul>
                            </li>
                            <li class="login_icon">
                                <a href="login.php"><spam class="far fa-user-circle"></spam>LOGIN</a>
                               


                            </li>
                        </ul>
                    </nav>
                </div>
                
            </div>
            
    
        </div> 
            
        


    </header>
<!--FIN DE HEADER-->

<!--PORTADA--> 
            
      
<!--FIN DE PORTADA-->
    
    

    
<!--INFORMCACION EN FILAS-->   
<div class="container-form1">
    <h1 style="font-size: 24px;">INFORMACIÓN DE LA EMPRESA</h1>
</div> 

<div class="container-form2">
    <div class="info-form">
        <section class="box">
            <img src="img/logo.png" width="180" alt="" class="box-img">
            <h1>Microempresa EcuaSoft</h1>

        </section>
    </div>
    <div class="info-form">
        <section class="box">
            <h1>Misíon</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ut hic consequuntur quo qui culpa veritatis, blanditiis corrupti perspiciatis illo a laudantium illum sunt deleniti, nihil doloremque! Obcaecati, at, cupiditate.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ut hic consequuntur quo qui culpa veritatis, blanditiis corrupti perspiciatis illo a laudantium illum sunt deleniti, nihil doloremque! Obcaecati, at, cupiditate.</p>
            <h1>Visíon</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ut hic consequuntur quo qui culpa veritatis, blanditiis corrupti perspiciatis illo a laudantium illum sunt deleniti, nihil doloremque! Obcaecati, at, cupiditate.</p>

        </section>
    </div>

</div>
<div class="container-form11">
    <h1 style="font-size: 24px;">INFORMACIÓN PROPIETARIO</h1>
</div> 


<div class="container-form2">
    <div class="info-form">
        <section class="box">
            <img src="img/OscarPaguay.jpg" width="180" alt="" class="box-img">
            <h1>Ing. Oscar Paguay</h1>

        </section>
    </div>
    <div class="info-form">
        <section class="box">
            <h1>Gerente</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ut hic consequuntur quo qui culpa veritatis, blanditiis corrupti perspiciatis illo a laudantium illum sunt deleniti, nihil doloremque! Obcaecati, at, cupiditate.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ut hic consequuntur quo qui culpa veritatis, blanditiis corrupti perspiciatis illo a laudantium illum sunt deleniti, nihil doloremque! Obcaecati, at, cupiditate.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ut hic consequuntur quo qui culpa veritatis, blanditiis corrupti perspiciatis illo a laudantium illum sunt deleniti, nihil doloremque! Obcaecati, at, cupiditate.</p>

        </section>
    </div>

</div>

<div class="container-form11">
        <h1 style="font-size: 24px;">UBÍCANOS</h1>
    </div> 
    <div class="container-form-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.830213575842!2d-78.93953538479364!3d-2.5620089390718297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd67d61f8156c7%3A0x151d94e9e71a5687!2sEcuaSoft!5e0!3m2!1ses-419!2sec!4v1657564161107!5m2!1ses-419!2sec" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

<div class="container-form11">
    <h1 style="font-size: 24px;">CONTACTANOS</h1>
</div> 


<div class="container-form">
        <div class="info-form">
            
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eligendi est voluptates quae ipsam eius, in quasi odio porro aut vel beatae aperiam.</p>
            <a href="#"><i class="fa fa-phone"></i> +593 98745423</a>
            <a href="#"><i class="fa fa-envelope"></i> ecuasoft@gmail.com</a>
            <a href="#"><i class="fa fa-map-marked"></i> Cañar, Ecuador</a>
        </div>
        <form action="#" autocomplete="off">
            <input type="text" name="nombre" placeholder="Tu Nombre" class="campo">
            <input type="email" name="email" placeholder="Tu Email" class="campo">
            <textarea name="mensaje" placeholder="Tu Mensaje..."></textarea>
            <input type="submit" name="enviar" value="Enviar Mensaje" class="btn-enviar">
        </form>
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
                        <a href="servicios.php">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos y Condiciones</a>
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