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

    require_once '../../../backend/crud/categoriascrud.php';

    $cat = new categoria;
    $recordSet = $cat->getCategoria();

    include_once '../header/headerAdmin.php';

?>

<div class="container p-4" >
   
   <div class="row">
       
       <div class="col-3">

            <?php if(isset($_SESSION['setCategoria'])):?>
                <div class="alert alert-<?= $_SESSION['setCategoriaType']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['setCategoria']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                       
            <?php unset($_SESSION['setCategoria']);?>
            <?php unset($_SESSION['setCategoriaType']); endif;?>   

           <div class="card card-body text-center">
               <h4> Agregar Categoria </h4> </br>
               <form action="../../../backend/crud/agregarcategoria.php" method="POST"> 

                    <div>
                       <input type="text" name="codigo" class="form-control" placeholder="Codigo" autofocus>   
                    </div>
                    </br>
                    <div>
                       <input type="text" name="nombre" class="form-control" placeholder="Nombre categoria" autofocus>   
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
                           <th>Id Categoria</th>
                           <th>Codigo</th>
                           <th>Categoria</th>
                           <th>Accion</th>
                       </tr>
                   </thead>

                   <tbody>
                        <?php foreach($recordSet as $record):?>
                        <tr>
                            <td><?php echo $record['idCategoria'] ?></td>
                            <td><?php echo $record['codigo'] ?></td>
                            <td><?php echo $record['nombre'] ?></td>
                            <td><a href="updatecategorias.php?id=<?php echo $record['idCategoria']?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                        <?php endforeach;?>        
                   </tbody>
               
               </table>
       </div>

   </div>

</div>

</body>       
</html>