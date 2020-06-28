<?php

    require_once '../crud/usuarioscrud.php';

    $archivo = $_FILES['imagen'];
    $nombre = $archivo['name'];
    $tipo = $archivo['type'];
    $name = $_POST['nombre'];
    $email = $_POST['email'];
    $idUser = $_GET['idUser'];

    if($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/gif" || $tipo == "" ){
        
        $record = new user;


        if(!is_dir('../images')){
            mkdir('../images', 0777);
        }

        move_uploaded_file($archivo['tmp_name'],'../images/'.$nombre);
        
        if($record->setAcountUser($name, $email, $nombre, $idUser)){
            header('Location: ../../frontend/vistas/cuenta/micuenta.php');
        }else{

        }

    }else{

    }

?>