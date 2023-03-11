<?php
            
                $conexion = pg_connect("host=localhost dbname=ecuasoft user=postgres password=1234");
                
                if($conexion){
                    
                }else{
                    echo "no conecto correctamente a la base de datos";
                }

?>