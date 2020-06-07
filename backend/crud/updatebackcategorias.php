<?php
    session_start();

    if(isset($_GET['id'])){

        $idCategoria = $_GET['id'];


        if(!empty($_POST['categoria']) && !empty($_POST['codigo'])){

            require_once 'categoriascrud.php';
            $categoria = new categoria();

            if($categoria->updateCategoria($idCategoria,$_POST['categoria'],$_POST['codigo'])==1){
                $_SESSION['setCategoria'] = 'Categoria actualizada';
                $_SESSION['setCategoriaType'] = 'success';  
            }else{
                $_SESSION['setCategoria'] = 'Datos no modificados';
                $_SESSION['setCategoriaType'] = 'warning';  
            }
        }else{
            $_SESSION['setCategoria'] = 'Faltan datos';
            $_SESSION['setCategoriaType'] = 'danger';           
        }

        header('Location: ../../frontend/vistas/administrador/categorias.php');

    }
?>