<?php
    class ControladorUsuario{
        private $conexion;
        function __construct($con){
            $this->conexion=$con;
        }

        public function All(){
            //EJECUTANDO una SQL SELECT , consulta
            $sqlQuery="select * from usuarios;"; //sql

            //se prepara la s   sql en este caso la consulta a ejecutar
            $estado=$this->conexion->prepare($sqlQuery);
            //se ejecuta la accion de sql
            $resltado=$estado->execute();
            
            //se tranforma el resultado en una estructura de datos(Lista o array) 
            //para manipular los datos de mejor forma
            $rows=$estado->fetchAll(\PDO::FETCH_OBJ);  
            $con=null;//cerrando la conexion
            return $rows;
        }

        public function crear($nombre, $usuario, $contrasenia){
            try{
                $sql="INSERT INTO usuarios(nombre, usuario, contrasenia) VALUES ('$nombre','$usuario', '$contrasenia')";
                $this->conexion->exec($sql);
                return 1;
            }
            catch(Exception $e){
                echo "Error, no se insertó";
            }
           
        }

        //guardar cambios 
        public function guardarcambios($idmodificar, $nombre, $usuario, $contrasenia){

            try{
                $sql="update usuarios set nombre='$nombre', usuario='$usuario', contrasenia='$contrasenia' where id='$idmodificar'";
                $this->conexion->exec($sql);
                return 1;
            }
            catch(Exception $e){
                echo "Error, no se pudo actualizar";
                return 0;
            }
        }

        public function eliminar($id){
            try{
                $sql="delete from usuarios where id=$id";
                $this->conexion->exec($sql);
                return 1;
            }
            catch(Exception $e){
                echo "Error, no se eliminó";
                return 0;
            }
           
        }

        public function Buscar($id){
            //EJECUTANDO una SQL SELECT , consulta
            $sqlQuery="select * from usuarios where id = $id;"; //sql

            //se prepara la s   sql en este caso la consulta a ejecutar
            $estado=$this->conexion->prepare($sqlQuery);
            //se ejecuta la accion de sql
            $resltado=$estado->execute();
            
            //se tranforma el resultado en una estructura de datos(Lista o array) 
            //para manipular los datos de mejor forma
            $rows=$estado->fetchAll(\PDO::FETCH_OBJ);  
            $con=null;//cerrando la conexion
            return $rows;
        }
    }
?>