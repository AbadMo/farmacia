<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: ../../../index.php');
    }

    if(isset($_SESSION['user'])){
        switch($_SESSION['user']['idRoles']){
            case 1 : header("Location: ../administrador/administrador.php"); break;
            case 3:  header("Location: ../ventas/vendedor.php"); break;
        }
    }

    include '../../vistas/header/headerSuper.php'
?>
<body>
    
</body>
</html>