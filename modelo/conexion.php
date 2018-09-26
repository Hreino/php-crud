<?php 
   
    class Conexion{

        public function conectar()
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $bd="ejemplo";
            try {
                $con = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
                // set the PDO error mode to exception
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
                }
            catch(PDOException $e)
                {
                echo "Conexion fallida: " . $e->getMessage();
                }
            return $con;   
        }

        
    }
?>