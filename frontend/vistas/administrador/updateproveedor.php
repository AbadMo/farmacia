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
        require_once '../../../backend/crud/proveedorcrud.php';

        $id = $_GET['id'];
        $proveedor = new proveedor();
        $recordSetProveedor = $proveedor->getProveedorById($id); 
    }

    include_once '../header/headerAdmin.php';

?>

<div class="container p-4" >
   
   <div class="row">

   <div class="col-3">
    </div>

       <div class="col-6"> 

           <div class="card card-body text-center">
                <h4> Modificar Proveedor </h4> 
               <form action="../../../backend/crud/updatebackproveedor.php?id=<?php echo $id?>" method="POST"> 

               <div >
                       <input type="text" name="nombre" class="form-control" value="<?php echo $recordSetProveedor['nombre']?>" autofocus>   
                   </div>
                    </br>
                   <div>
                       <input type="text" name="rut" class="form-control" value="<?php echo $recordSetProveedor['rut']?>">   
                   </div>
                   </br>
                   <div>
                       <input type="text" name="direccion" class="form-control" value="<?php echo $recordSetProveedor['direccion']?>" >   
                   </div>
                   </br>
                   <div>
                       <input type = "email" name="email" class="form-control" value="<?php echo $recordSetProveedor['email']?>">   
                   </div>
                   </br>
                   <div>
                       <input type="numero" name="contacto" class="form-control" value="<?php echo $recordSetProveedor['contacto']?>">   
                   </div>
                   </br>
                    <select name="activo" class="form-control">
                        <option value="<?php $recordSetProveedor['activo'] ?>"><?php echo ($recordSetProveedor['activo']?'Activo':'Inactivo')?></option>
                        <?php if($recordSetProveedor['activo']):?>
                                <option value="0">Inactivo</option>
                            <?php else:?>
                                <option value="1">Activo</option>
                            <?php endif;?>
                    </select>
                   </br>

                   <div class="row">
                   <div class="col-4"> 
                        <input type="submit" class="btn btn-danger btn-block" name="Guardar" value="Modificar">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                    <a href="proveedor.php" class="btn btn-success btn-block">Cancelar</a>   
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