<?php
    include_once "usuarioscrud.php";
    session_start();

   if(isset($_POST['Actualizar'])){
       $id = $_GET['id'];
       $act = $_POST['activo'] ? true : false;
       $rol = $_POST['rol'] ? $_POST['rol'] : null;
       $email = $_POST['email'] ? $_POST['email'] : null;
       $nombre = $_POST['nombre'] ? $_POST['nombre'] : null;

       if($rol != null && $email != null && $nombre != null){
            $update = new user();
            $count = $update->searchEmail($email);

            if($count[0]==0){
                if($update->updateUsers($id, $rol, $nombre, $email, $act)==1){
                    $_SESSION['UserAdd'] = 'Usuario Actualizado'; 
                    $_SESSION['UserAddType'] = 'success';
                }else{
                    $_SESSION['UserAdd'] = 'Datos no actualizados'; 
                    $_SESSION['UserAddType'] = 'warning';
                }
            }else{
                $_SESSION['UserAdd'] = 'Email ya existe'; 
                $_SESSION['UserAddType'] = 'danger';                
            }

       }else{
        $_SESSION['UserAdd'] = 'Faltan datos';
        $_SESSION['UserAddType'] = 'danger'; 
       } 

       header('Location:../../frontend/vistas/administrador/usuarios.php');

   } 

?>