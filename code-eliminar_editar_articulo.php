<?php
    
    // Incluir archivo de conexion a la base de datos
    include_once "conexion.php";
    

    
    // Definir variable e inicializar con valores vacio
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        
        if(isset($_POST['categoria'])){

            $idCat=$_POST['categoria'];
            $_SESSION['idCat']=$idCat;    
            header("location: categoria.php");

        }
       


        
    }
    
    
    
?>