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

    include_once '../../../backend/crud/marcascrud.php';

    $marcas = new marca;
    $recordSet = $marcas->getMarcas();

    include_once '../header/headerAdmin.php';
?>

<div class="container-fluid p-4" >
   
   <div class="row">
       
       <div class="col-3">

            <?php if(isset($_SESSION['setMarca'])):?>
                <div class="alert alert-<?= $_SESSION['setMarcasType']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['setMarca']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                       
            <?php unset($_SESSION['setMarca']);?>
            <?php unset($_SESSION['setMarcasType']); endif;?>   

           <div class="card card-body text-center">
               <h4> Agregar Marcas </h4> 
               </br>
               <form action="../../../backend/crud/agregarmarcas.php" method="POST"> 

                    <div>
                       <input type="text" name="nombre" class="form-control" placeholder="Nombre marca" autofocus>   
                    </div>
                    </br>
                    <input type="submit" class="btn btn-success btn-block" name="Guardar" value="Guardar">

               </form>
           </div>

       </div>

       <div class="col-9">
               <table class = "table">
                   <thead class="thead-dark">
                       <tr>
                           <th>Marca</th>
                           <th  width=50>Accion</th>
                       </tr>
                   </thead>

                   <tbody>
                        <?php foreach($recordSet as $record):?>
                            <tr>
                                <td><?php echo $record['nombre'] ?></td>
                                <td><a href="updatemarcas.php?id=<?php echo $record['idMarcas']?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        <?php endforeach;?>        
                   </tbody>
               
               </table>
       </div>

   </div>

</div>

</body>       
</html>