<?php 
    require_once 'usuarioscrud.php';

    session_start();

    if(!isset($_SESSION['user'])){
        header('Location:../../../../index.php');
    }

    if(isset($_SESSION['user'])){
        switch($_SESSION['user']['idRoles']){
            case 2:  header("Location: ../../../../frontend/vistas/supervisor/supervisor.php"); break;
            case 3:  header("Location: ../../../../frontend/vistas/ventas/vendedor.php"); break;
        }
    }

    if(isset($_POST)){

        $nombre = !empty($_POST['nombre']) ? $_POST['nombre']: null;
        $pass = !empty($_POST['pass']) ? $_POST['pass']: null;
        $rep = !empty($_POST['rep']) ? $_POST['rep']: null;
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;
        $rol = !empty($_POST['rol']) ? $_POST['rol'] : null; 
        

        if($nombre==null){
            $_SESSION['UserAdd'] = 'Ingrese Nombre';  
            $_SESSION['UserAddType'] = 'danger';               
        }else if($pass==null){
            $_SESSION['UserAdd'] = 'Ingrese Password';
            $_SESSION['UserAddType'] = 'danger';
        }else if($rep==null || !($rep === $pass)){
            $_SESSION['UserAdd'] = 'Passwords no coinciden';
            $_SESSION['UserAddType'] = 'danger';
        }else if($email==null){
            $_SESSION['UserAdd'] = 'Email invalido';
            $_SESSION['UserAddType'] = 'danger';
        }else if($rol==null){
            $_SESSION['UserAdd'] = 'No ha ingresado Rol';
            $_SESSION['UserAddType'] = 'danger';
        }else{

            $res = new user();

            $count = $res->searchEmail($email);
           
            if($count[0]==0){
                $passEncrypt = MD5($pass);
                $rowCount=$res->setUser($nombre,$email, $passEncrypt, $rol);
                                
                if($rowCount==1){
                    $_SESSION['UserAdd'] = 'Usuario agregado correctamente';
                    $_SESSION['UserAddType'] = 'success';
                }
            }else{
                $_SESSION['UserAdd'] = 'Email ya existe';
                $_SESSION['UserAddType'] = 'danger';
            }
        }
        
        header('Location: ../../frontend/vistas/administrador/usuarios.php');

    }
?>