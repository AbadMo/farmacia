<?php
session_start();

    if(isset($_GET['id'])){

        require_once 'marcascrud.php';

        if(!empty($_GET['id']) && !empty($_POST['nombre'])){
            $update = new marca();
            if($update->updateMarcas($_GET['id'],$_POST['nombre'])==1){
                $_SESSION['setMarca'] = 'Marca actualizada';
                $_SESSION['setMarcasType'] = 'success';            
            }else{
                $_SESSION['setMarca'] = 'Datos no modificados';
                $_SESSION['setMarcasType'] = 'warning';  
            }
        }else{
            $_SESSION['setMarca'] = 'Faltan datos';
            $_SESSION['setMarcasType'] = 'danger';             
        }
    }

   header('Location: ../../frontend/vistas/administrador/marcas.php');
?>