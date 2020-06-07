<?php
    require_once 'productoscrud.php';
    session_start();

    if(isset($_POST['Guardar'])){
        if(!empty($_POST['nombre']) && !empty($_POST['codigo']) && !empty($_POST['descripcion']) && !empty($_POST['marca']) && !empty($_POST['categoria'])){
            $consulta = new productos;
            if($consulta->setProductos($_POST['nombre'],$_POST['descripcion'],$_POST['codigo'],$_POST['categoria'],$_POST['marca'])==1){
                $_SESSION['setProductos'] = 'Producto agregado';
                $_SESSION['setProductosType'] = 'success';
            }else{
                $_SESSION['setProductos'] = 'Error agregando producto';
                $_SESSION['setProductosType'] = 'danger';                
            }
        }

        header('Location: ../../frontend/vistas/administrador/productos.php');

    }
?>