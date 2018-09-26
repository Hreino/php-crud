
<?php
//validar la sesion
session_start();



include './controller/controladorUser.php';
include './modelo/conexion.php';
include './controller/controladorlogin.php';
 //instancia de la clase conexion
 $conexion= new Conexion();

 //ejecutamos la funcion para conectarnos
 //y se almacena la coonexion abierta
 $con=$conexion->conectar();

//instancia del controlador 
$login = new LoginController($con);
//procesamiento de sesión


  if(isset($_POST["sesion"])){
    //llamar al controlador
    $usuario=$_POST["user"];
    $contrasenia=$_POST["contra"];
    $datos=$login->inicioSesion($usuario, $contrasenia);//recomienda retornar conuna multitabla


    if($datos!=0){
      //iniciar sesion 
      echo "Sesion iniciada";
      
      $_SESSION["user"]=$usuario;
     
      //redireccionar index

    }else{
      //redireccionar al login
      header('Location: index.php');
}

}
if(!isset($_SESSION["user"])){

  //redireccionar al login
  header('Location: index.php');
  
}else{


?>
<!DOCTYPE html>
<!-- saved from url=(0053)https://getbootstrap.com/docs/3.3/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">

    <title>Dashboard Plantilla con Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./css/ie-emulation-modes-warning.js.descargar"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">CRUD DE USUARIOS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Cerrar Sesión</a></li>
           
            
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Buscar...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            
          <li><a href="usuarios.php">Inicio</a></li>
            <li><a href="agregarUsuarios.php">Nuevo Usuario</a></li>
            <li  class="active"><a href="usuarios.php">Lista de Usuarios</a></li>
            
          </ul>
          
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-center">Lista de Usuarios</h1>

          <div class="row placeholders col-md-offset-5"/>
                <div class="col-xs-6 col-sm-3 placeholder off-col">
                    <img  src="img/user.png"  width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Usuarios</h4>
                    <span class="text-muted">Edición, Eliminación</span>
                </div>
                
          </div>

                 <!-- CUERPO DE LA PAGINA-->
                 <!--Informacion estatica de ejemplo-->
                <!--*************************************************************************************************************** -->
                
    <?php

     $controlador = new ControladorUsuario($con);

      //Para guardar

         if(isset($_POST["btnsave"])){
              
              $nombre=$_POST["nombre"];
             $user=$_POST["user"];
             $contra1=$_POST["contra"];
             
             if($controlador->crear($nombre, $user, $contra1)==1){
              echo "<script>alert('Registro Guardado')</script>";
            }else{
              echo "<script>alert('Registro No Guardado')</script>";
            }  
         }

         //para guardar cambios
        
         if(isset($_POST["btnmodif"])){
          $Id=$_POST["id"];
           $nombre=$_POST["nuevoNombre"];
           $user=$_POST["nuevoUser"];
           $contra1=$_POST["NuevaContra"];
         
         if($controlador->guardarcambios($Id, $nombre, $user,$contra1)==1){
          echo "<script>alert('Registro Guardado')</script>";
        }else{
          echo "<script>alert('Registro No Guardado')</script>";
        }  
         }
           
         

       //En caso de eliminacion
       if(isset($_GET["idEliminar"])){
         $id=$_GET["idEliminar"];
         $controlador->Eliminar($id);
         if($controlador->eliminar($id)==1){
          echo "<script>alert('Registro Eliminado')</script>";
         }else{
           echo "<script>alert('Registro No Eliminado')</script>";
         }
       }


         $rows=$controlador->All();
    ?> 
    
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                
                <th class="center-text">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //apertura del ciclo
                foreach($rows as $item){
            ?>
                <tr>
                        <td><?php print($item->id); ?> </td>
                        <td><?php print($item->nombre); ?> </td>
                        <td><?php print($item->usuario); ?> </td>
                        
                        <td><a href="modificar.php?idmodificar=<?php print($item->id); ?>"><button class="btn btn-primary">Modificar</button></a></td>
                        <td><a href="usuarios.php?idEliminar=<?php print($item->id); ?>" name="Eliminar"><button class="btn btn-danger">Eliminar</button></a></td>
                </tr>         

            <?php
                } //fin del ciclo

                //cerrando conexion
                $con=null;
            ?>

        </tbody>

    </table>
                 <!--*************************************************************************************************************** -->
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./css/jquery.min.js.descargar"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./css/bootstrap.min.js.descargar"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./css/holder.min.js.descargar"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./css/ie10-viewport-bug-workaround.js.descargar"></script>
  

</body>
</html>
<?php
}
?>