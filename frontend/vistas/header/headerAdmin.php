<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
        <!-- Los iconos tipo Solid de Fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
        <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


        <link rel="stylesheet" type="text/css" href="../../css/index.css" th:href="@{../../css/index.css}">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <title>Farmacia</title>

    </head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="../administrador/administrador.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../administrador/usuarios.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../administrador/productos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../administrador/marcas.php">Marcas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../administrador/categorias.php">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../administrador/proveedor.php">Proveedor</a>
                </li>
            </ul>
            <a class="navbar-brand hidden-md-down text-white">Administrador   <?php print("  " . $_SESSION['user']['nombre']. " ")?></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../../backend/login/cerrar_sesion.php">Cerrar Sesion</a>
                </li>

            </ul>


        </div>

    </nav>