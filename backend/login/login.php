<?php
session_start();

include_once '../crud/usuarioscrud.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if(!empty($pass) && filter_var($email, FILTER_VALIDATE_EMAIL)){

        $passEncript = MD5($pass);
        $var = new user(); 
        $us = $var->getUsersId($email);

        if($us['email'] == $email && $us['password'] == $passEncript){

            $_SESSION['user'] = $us;

            switch($us['idRoles']){
                case 1 : header("Location: ../../frontend/vistas/administrador/administrador.php");break;
                case 2:  header("Location: ../../frontend/vistas/supervisor/supervisor.php"); break;
                case 3:  header("Location: ../../frontend/vistas/ventas/vendedor.php"); break;
                case 4:  header("Location: ../../frontend/vistas/clientes/clientes.php"); break;
            }
        }else{
            $_SESSION['error'] = 'Invalid user';
            header("Location: ../../index.php"); 
        }

    }else{
        $_SESSION['error'] = 'Datos Incompletos';
        header("Location: ../../index.php"); 
    }
?>