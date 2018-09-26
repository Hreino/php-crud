
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
            <li><a href="#">Iniciar Sesión</a></li>
            
            
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Buscar...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header text-center">Inicio de sesión</h1>

          <div class="row placeholders col-md-offset-5"/>
                <div class="col-xs-6 col-sm-3 placeholder off-col">
                    <img  src="img/user.png"  width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Usuarios</h4>
                    <span class="text-muted">Iniciar Sesión</span>
                </div>
                
          </div>

                 <!-- CUERPO DE LA PAGINA-->
                 <!--Informacion estatica de ejemplo-->
                <!--*************************************************************************************************************** -->
                <div class="form group">
                   
                    <form action="usuarios.php" method="POST">
                      <label for="">Usuario</label>
                      <input type="text" name="user" class="form-control" placeholder="Digite su username">
                      <label for="">Contraseña</label>
                      <input type="password" name="contra" class="form-control" placeholder="Digite su contraseña"> <br><br>
                      <input type="submit" value="Iniciar Sesión" class="btn btn-primary " name="sesion">

                    </form>   
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