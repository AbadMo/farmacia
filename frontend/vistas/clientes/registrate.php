<?php
    session_start();
?>

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


<link rel="stylesheet" type="text/css" href="../../css/index.css" th:href="@{../css/index.css}">

<title>Registrate</title>

</head>

<body>

    <div class="modal-dialog text-center">

        <div class="col-sm-8 main-section">
            
            <div class="modal-content">

                <div class="col-12 user-img">
                    <img src="../../img/login.jpg" th:src="@{../../img/login.jpg}"/>
                </div>

                <?php if(isset($_SESSION['errorNombreCliente'])):?>
                    <p class = "alert alert-danger"> <?=$_SESSION['errorNombreCliente'] ?></p>   
                <?php endif;?>    
    
                <?php if(isset($_SESSION['errorPasswordCliente'])):?>
                    <p class = "alert alert-danger"> <?=$_SESSION['errorPasswordCliente'] ?></p>   
                <?php endif;?>    
                
                <?php if(isset($_SESSION['errorRepasswordCliente'])):?>
                    <p class = "alert alert-danger"> <?=$_SESSION['errorRepasswordCliente'] ?></p>   
                <?php endif;?>    

                <?php if(isset($_SESSION['errorEmailCliente'])):?>
                    <p class = "alert alert-danger"> <?=$_SESSION['errorEmailCliente'] ?></p>   
                <?php endif;?>                   

                <form action = "addCliente.php" class="col-12" method="POST">

                    <div class="form-group" id="user-group">
                        <input type="nombre" class="form-control" placeholder="Ingrese su nombre" name="nombre"/>
                    </div>

                    <div class="form-group" id="mail-group">
                        <input type="email" class="form-control" placeholder="email@email.com" name="email"/>
                    </div>
                    
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass"/>
                    </div>

                    <div class="form-group" id="recontrasena-group">
                        <input type="password" class="form-control" placeholder="Reingrese contraseña" name="rep"/>
                    </div>

                    <button type="submit" class="btn text-white-50 bg-ligth"><i class="fa fa-cogs" aria-hidden="true"></i> Registrarme </button>

                </form>

            </div>

        </div>

    </div>
</body>
</html>