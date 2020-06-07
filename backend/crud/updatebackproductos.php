<?php
    session_start();    

    if(isset($_POST['Guardar'])){

        require_once 'productoscrud.php';

        $idProducto = $_GET['idProductos'];
        $update = new productos();

        if(!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['codigo']) && !empty($_POST['categoria']) && !empty($_POST['marca'])){
            if(($update->updateProducto( $idProducto, $_POST['nombre'], $_POST['descripcion'], $_POST['codigo'], $_POST['categoria'], $_POST['marca'] ))==1){
                $_SESSION['setProductos'] = 'Producto actualizado';
                $_SESSION['setProductosType'] = 'success';                
            }
            else{
                $_SESSION['setProductos'] = 'Datos no modificados';
                $_SESSION['setProductosType'] = 'warning';                  
            }
        }else{
            $_SESSION['setProductos'] = 'Faltan Datos';
            $_SESSION['setProductosType'] = 'danger';              
        }
    }

    header('Location: ../../frontend/vistas/administrador/productos.php');

?>