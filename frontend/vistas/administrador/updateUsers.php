<?php
    session_start();
    
    if(!isset($_SESSION['user'])){
        header('Location: ../../../../../index.php');
    }

    if(isset($_SESSION['user'])){
        switch($_SESSION['user']['idRoles']){
            case 2:  header("Location: ../../../supervisor/supervisor.php"); break;
            case 3:  header("Location: ../../../ventas/vendedor.php"); break;
            case 4:  header("Location: ../clientes/clientes.php"); break;
        }
    }

    if(isset($_GET['id'])){

        require_once '../../../backend/crud/usuarioscrud.php';

        $id = $_GET['id'];
        $update = new user();
        $res = $update->getFullRoles($id);
        $roles = $update->getRoles();
    }

    include_once '../header/headerAdmin.php';
?>

<div class="container-fluid p-4" >
   
   <div class="row">

   <div class="col-3"></div>

       <div class="col-6"> 

           <div class="card card-body text-center">
                <h4> Modificar Usuarios </h4> 
               <form action="../../../backend/crud/updatebackusers.php?id=<?php echo $id?>" method="POST"> 

                   <div>
                       <input type="text" name="nombre" class="form-control" value="<?php echo $res["NOMBRE"]?>" autofocus>   
                   </div>
                   </br>     
                   <div>
                       <input type="text" name="email" class="form-control" value="<?php echo $res["EMAIL"]?>">   
                   </div>
                   </br>

                   <select name="rol"  class="form-control">
                       <option value="<?php echo $res['ROL'];?>"><?php echo $res['CARGO'];?></option>
                       <?php foreach($roles as $r): ?>
                            <?php if($r['idRoles'] != $res['ROL']):?>
                                <option value="<?php echo $r['idRoles'];?>"><?php echo $r['nombre'];?></option>
                            <?php endif;?>
                       <?php endforeach;?>
                   </select>     
                   </br>
                   <select name="activo"  class="form-control">
                       <option value="<?php echo $res['ACTIVO']?>"><?php echo ($res['ACTIVO'] ? 'Activo': 'Inactivo') ?></option>
                            <?php if($res['ACTIVO']):?>
                                <option value="0">Inactivo</option>
                            <?php else:?>
                                <option value="1">Activo</option>
                            <?php endif;?>
                   </select>                                  
                   </br>
                   <div class="row">
                   <div class="col-4"> 
                        <input type="submit" class="btn btn-danger btn-block" name="Actualizar" value="Modificar">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                    <a href="usuarios.php" class="btn btn-success btn-block">Cancelar</a>   
                    </div>
                   </div>

               </form>
            </div>
        </div>
    
    <div class="col-3"></div>

</div>
</body>

</html>