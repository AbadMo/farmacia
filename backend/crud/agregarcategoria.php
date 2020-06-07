<?php
    session_start();

    include_once 'categoriascrud.php';

    if(isset($_POST['Guardar'])){
            if(!empty($_POST['codigo']) && !empty($_POST['nombre'])){
            $set = new categoria;
            if($set->setCategoria($_POST['codigo'], $_POST['nombre'])==1){
                $_SESSION['setCategoria'] = 'Categoria Agregada';
                $_SESSION['setCategoriaType'] = 'warning';
            }else{
                $_SESSION['setCategoria'] = 'Error agregando Catgoria';
                $_SESSION['setCategoriaType'] = 'danger';
            }
        }
    }

    header("Location: ../../frontend/vistas/administrador/categorias.php");

?>
