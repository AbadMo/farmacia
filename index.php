<!DOCTYPE html>
<html lang="en">
<head>
    <title>Farmacia</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- css-->
    <link rel="stylesheet" type="text/css" href="frontend/css/index.css" th:href="@{frontend/css/index.css}">

</head>

    <body>

        <?php session_start();?>

        <div class="modal-dialog text-center">

            <div class="col-sm-8 main-section">

                <div class="modal-content">

                    <div class="col-12 user-img">
                       <img src="frontend/img/login.jpg" th:src="@{frontend/img/login.jpg}"/>
                    </div>
                    
                    <?php if(isset($_SESSION['error'])):?>
                        <p class = "alert alert-danger"> <?=$_SESSION['error'] ?></p>
                    <?php endif;?>    
                    
                    <form action = "backend/login/login.php" class="col-12" method="POST">

                        <div class="form-group" id="user-group">
                            <input type="email" class="form-control" placeholder="email@email.com" name="email"/>
                        </div>
                        <div class="form-group" id="contrasena-group">
                            <input type="password" class="form-control" placeholder="Contraseña" name="pass"/>
                        </div>
                        <button type="submit" class="btn text-white-50 bg-ligth"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>

                    </form>
                    <div class="col-12 forgot">
                        <a href="frontend/vistas/clientes/registrate.php">Registrate</a>
                    </div>
                    <div class="col-12 forgot">
                        <a href="#">Olvido su contrasena?</a>
                    </div>

                </div>

            </div>

        </div>
        
        <?php session_destroy();?>

    </body>

</html>