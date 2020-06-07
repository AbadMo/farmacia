<?php
        require_once '../../../backend/crud/usuarioscrud.php';
        
        session_start();

        $nombre = !empty($_POST['nombre']) ? $_POST['nombre']: null;
        $pass = !empty($_POST['pass']) ? $_POST['pass']: null;
        $rep = !empty($_POST['rep']) ? $_POST['rep']: null;
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : null;

        if($nombre==null){
            $_SESSION['errorNombreCliente'] = 'Ingrese Nombre';     
            header('Location: registrate.php');           
        }else if($pass==null){
            $_SESSION['errorPasswordCliente'] = 'Ingrese Password';
            header('Location: registrate.php');
        }else if($rep==null || !($rep === $pass)){
            $_SESSION['errorRepasswordCliente'] = 'Passwords no coinciden';
            header('Location: registrate.php');
        }else if($email==null){
            $_SESSION['errorEmailCliente'] = 'Email invalido';
            header('Location: registrate.php');
        }else{

            $res = new user();

            $count = $res->searchEmail($email);
           
            if($count[0]==0){
                echo "email no existe";
                
                $passEncrypt = MD5($pass);
                $rowCount=$res->setUser($nombre,$email, $passEncrypt, 4);
                
                if($rowCount==1){
                    $_SESSION['addCliente'] = 'Usuario agregado correctamente';
                    header('Location: ../../../index.php');
                }
            }else{
                $_SESSION['errorMailClienteExiste'] = 'Email ya existe';
                header('Location: registrate.php');
            }

        }

        
        
?>