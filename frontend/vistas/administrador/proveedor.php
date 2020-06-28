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

    $data = new proveedor;
    $recordset = $data->getProveedores();

    include_once '../header/headerAdmin.php';
?>

<div class="container-fluid p-4" >
   
   <div class="row">
       
       <div class="col-3">

       <?php if(isset($_SESSION['setProveedores'])):?>
                <div class="alert alert-<?= $_SESSION['setProveedoresType']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['setProveedores']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                       
            <?php unset($_SESSION['setProveedores']);?>
            <?php unset($_SESSION['setProveedoresType']); endif;?>   

           <div class="card card-body text-center">
                <h4> Agregar Proveedor </h4> </br>
               <form action="../../../backend/crud/agregarproveedores.php" method="POST"> 

                   <div >
                       <input type="text" name="nombre" class="form-control" placeholder="Nombre proveedor" autofocus>   
                   </div>
                    </br>
                   <div>
                       <input type="text" name="rut" class="form-control" placeholder="Rut">   
                   </div>
                   </br>
                   <div>
                       <input type="text" name="direccion" class="form-control" placeholder="Direccion">   
                   </div>
                   </br>
                   <div>
                       <input type="email" name="email" class="form-control" placeholder="email@email.com">   
                   </div>
                   </br>
                   <div>
                       <input type="numero" name="contacto" class="form-control" placeholder="Celular:+569">   
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
                           <th>Nombre</th>
                           <th>Rut</th>                                                                                                      
                           <th>Email</th>
                           <th>Contacto</th>
                           <th>Activo</th>
                           <th  width=50>Accion</th>
                       </tr>
                   </thead>

                   <tbody>  
                       <?php foreach($recordset as $r):?>  
                        <tr>
                            <td><?php echo $r['nombre'] ?></td>
                            <td><?php echo $r['rut'] ?></td>
                            <td><?php echo $r['email'] ?></td>
                            <td><?php echo $r['contacto'] ?></td>
                            <td><?php echo ($r['activo'] ? 'Activo' : 'Inactivo') ?></td>
                            <td><a href="updateproveedor.php?id=<?php echo $r['idProveedores']?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                        <?php endforeach;?>  
                    </tbody>
               
               </table>
       </div>

   </div>

</div>

</body>       
</html>