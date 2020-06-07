<?php
    session_start();
    
    if(!isset($_SESSION['user'])){
        header('Location: ../../../index.php');
    }

    if(isset($_SESSION['user'])){
        switch($_SESSION['user']['idRoles']){
            case 1 : header("Location: ../administrador/administrador.php"); break;
            case 2:  header("Location: ../supervisor/supervisor.php"); break;
            case 4:  header("Location: ../clientes/clientes.php"); break;
        }
    }

    include_once '../../../backend/crud/varioscrud.php';
    include_once '../../../backend/crud/marcascrud.php';

    $marcas = new marca;
    $mark = $marcas->getMarcas();

    include_once '../header/headerVendedor.php'
?>

    <div class="container p-4 ml-auto">

        <div class="row">

            <div class="col-4">

                <div class="form-group"> 
                    <p>Marcas</p>
                    <select name="cliente" class="form-control">
                        <option value="">Seleccione...</option>
                        <?php foreach($mark as $m):?>
                        <option value="<?php echo $m['idMarcas']?>"><?php echo $m['nombre']?></option>
                        <?php endforeach;?>
                    </select>

                </div>
            </div>

        </div>
        
    </div>

</body>
</html>