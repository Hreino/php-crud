<?php
    class LoginController{
        private $conexion;
        function __construct($con){
        $this->conexion=$con;
    }

    public function inicioSesion($user, $contrasenia){
        //EJECUTANDO una SQL SELECT , consulta
        $sqlQuery="select us.usuario, us.contrasenia  from usuarios us where us.usuario='$user' and us.contrasenia='$contrasenia';"; //sql

        //se prepara la s   sql en este caso la consulta a ejecutar
        $estado=$this->conexion->prepare($sqlQuery);
        //se ejecuta la accion de sql
        $resltado=$estado->execute();
        
        //se tranforma el resultado en una estructura de datos(Lista o array) 
        //para manipular los datos de mejor forma
        $rows=$estado->fetchAll(\PDO::FETCH_OBJ);  
        $con=null;//cerrando la conexion
     

        return count($rows);


    }
}

?>