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

    if(isset($_GET['id'])){
        require_once '../../../backend/crud/marcascrud.php';
        $idMarca = $_GET['id'];
        $marca = new marca();
        $recordSetMarca = $marca->getMarcaForId($_GET['id']);

    }

    include_once '../header/headerAdmin.php';

?>

<div class="container p-4" >
   
   <div class="row">

   <div class="col-3">
    </div>

       <div class="col-6"> 

           <div class="card card-body text-center">
                <h4> Modificar Marcas </h4> 
               <form action="../../../backend/crud/updatebackmarcas.php?id=<?php echo $idMarca?>" method="POST"> 

                   <div>
                       <input type="text" name="nombre" class="form-control" value="<?php echo $recordSetMarca['nombre']?>" autofocus>   
                   </div>
                   </br>

                   <div class="row">
                   <div class="col-4"> 
                        <input type="submit" class="btn btn-danger btn-block" name="Guardar" value="Modificar">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                    <a href="marcas.php" class="btn btn-success btn-block">Cancelar</a>   
                    </div>
                   </div>

               </form>
            </div>
        </div>
    
    <div class="col-3">
    </div>

</div>

</body>
</html>
