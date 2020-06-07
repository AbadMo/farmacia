<?php
    require_once 'proveedorcrud.php';
    session_start();

    if(isset($_POST['Guardar'])){
        if(!empty($_POST['nombre']) && !empty($_POST['rut']) && !empty($_POST['direccion']) && !empty($_POST['email']) && !empty($_POST['contacto'])){
            $consulta = new proveedor;
            if($consulta->setProveedores($_POST['nombre'],$_POST['rut'],$_POST['direccion'],$_POST['email'],$_POST['contacto'])==1){
                $_SESSION['setProveedores'] = 'Proveedor agregado';
                $_SESSION['setProveedoresType'] = 'success';
            }else{
                $_SESSION['setProveedores'] = 'Error agregando proveedor';
                $_SESSION['setProveedoresType'] = 'warning';                
            }
        }else{
            $_SESSION['setProveedores'] = 'Faltan Datos';
            $_SESSION['setProveedoresType'] = 'danger';                
        }

        header('Location: ../../frontend/vistas/administrador/proveedor.php');

    }
?>
