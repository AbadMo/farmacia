<?php
    session_start();
    
    if(!isset($_SESSION['user'])){
        header('Location: ../../../index.php');
    }

    if(isset($_SESSION['user'])){
        switch($_SESSION['user']['idRoles']){
            case 2:  header("Location: ../supervisor/supervisor.php"); break;
            case 3:  header("Location: ../ventas/vendedor.php"); break;
            case 4:  header("Location: ../clientes/clientes.php"); break;
        }
    }

    require_once '../../../backend/crud/proveedorcrud.php';

    $proveedores = new proveedor;
    $recordSetProveedores = $proveedores->getProveedores();

    include_once '../header/headerAdmin.php';
?>
    
    <div class="container-fluid p-4">
        <div class="row">

            <div class="col-2">
                <div class="card card-body text-center">
                    <label for="proveedor">Proveedor</label>
                    <select name="proveedor" class="form-control">
                    <option value="Seleccione Proveedor">Seleccione Proveedor</option>
                        <?php foreach($recordSetProveedores as $r):?>
                            <option value="<?php echo $r['idProveedores']?>"><?php echo $r['nombre']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


        </div>
    
    </div>

</body>
</html>

<!-- OFFICE 2019 ---  https://www.youtube.com/watch?v=WLXtmbdGEKI -->
