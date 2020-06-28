<?php

    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: ../../../index.php');
    }

    if(isset($_SESSION['user'])){
        switch($_SESSION['user']['idRoles']){
            case 1:  include_once "../header/headerAdmin.php"; break;
            case 2:  include_once "../header/headerSuper.php"; break;
            case 3:  include_once "../header/headerVendedor.php"; break; 
            case 4:  include_once "../header/headerUsers.php"; break;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
</head>
<body>
    
    <div class="container p-4">

        <div class="row">

            <div class="col-3"></div>
            
                <div class="col-6">
                    
                    <div class="card card-body text-center">

                        <h4>Mi cuenta</h4>

                        <form action="../../../backend/uploads/upload.php?idUser=<?php echo $user['idUsuarios'] ?>" method="POST" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12 mt-5">
                                    <input type="text" name="nombre" class="form-control" value="<?php echo $user['nombre']?>" autofocus> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-5">
                                    <input type="text" name="email" class="form-control" value="<?php echo $user['email']?>"> 
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-5 mt-5"></div>
                                <div class="card card-body text-center col-2 mt-5">
                                    <img src="<?php echo $ruta?>" alt="100" width="50">
                                </div> 
                                <div class="col-5 mt-5"></div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-5">
                                    <input type="file" name="imagen" class="form-control"> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-5">
                                <input type="submit" class="btn btn-primary btn-block" name="Guardar" value="Guardar">
                                </div>
                            </div>
                            
                        </form>

                    </div>        
                
                </div>
            
            <div class="col-3"></div>

        </div>

    </div>

</body>
</html>