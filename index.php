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
    <link rel="stylesheet" href="css/estilos-index.css">
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
                <a>Bienvenido<spam></spam></a>
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
                                <a class="ic_a"  id="selected"><spam class="spam_1">ANONIMO</spam></a>
                                
                            </li>
                            <li><a href="servicios.php">¿QUIENES SOMOS?</a>
                               
                            </li>
                            <li><a href="categoria_menu.php">Categorias</a>
                                
                            </li>
                            <li><a href="articulos.php">Artículos</a></li>
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
                                <a href="login.php"><spam class="far fa-user-circle"></spam>login</a>  

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
                        <form action="servicios.php" method="get">
                            <button type="submit">Ver mas detalles</button>
                        </form>
                        
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