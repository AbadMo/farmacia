<?php
    session_start();

    include_once 'marcascrud.php';

    if(isset($_POST['Guardar'])){
            if(!empty($_POST['nombre'])){
            $set = new marca;
            if($set->setMarcas($_POST['nombre'])==1){
                $_SESSION['setMarca'] = 'Marca Agregada';
                $_SESSION['setMarcasType'] = 'warning';
            }else{
                $_SESSION['setMarca'] = 'Datos no modificados';
                $_SESSION['setMarcasType'] = 'danger';
            }
        }
    }

    header("Location: ../../frontend/vistas/administrador/marcas.php");

?>

