<?php
    session_start();    

    if(isset($_POST['Guardar'])){

        require_once 'proveedorcrud.php';

        $idProducto = $_GET['id'];
        $update = new proveedor();

        if(!empty($_POST['nombre']) && !empty($_POST['rut']) && !empty($_POST['direccion']) && !empty($_POST['email']) && !empty($_POST['contacto'])){
            if(($update->updateProveedor($idProducto,$_POST['nombre'],$_POST['rut'], $_POST['direccion'], $_POST['email'], $_POST['contacto'], $_POST['activo']))==1){
                $_SESSION['setProveedores'] = 'Producto actualizado';
                $_SESSION['setProveedoresType'] = 'success';                
            }
            else{
                $_SESSION['setProveedores'] = 'Datos no modificados';
                $_SESSION['setProveedoresType'] = 'warning';                  
            }
        }else{
            $_SESSION['setProveedores'] = 'Faltan Datos';
            $_SESSION['setProveedoresType'] = 'danger';              
        }
    }

    header('Location: ../../frontend/vistas/administrador/proveedor.php');

?>