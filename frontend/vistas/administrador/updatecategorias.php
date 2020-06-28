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

        require_once '../../../backend/crud/categoriascrud.php';

        $id = $_GET['id'];
        $categoria = new categoria();
        $recordSetProveedor = $categoria->getCategoriaForId($id);

    }

    include_once '../header/headerAdmin.php';

?>

<div class="container-fluid p-4" >
   
   <div class="row">

   <div class="col-3">
    </div>

       <div class="col-6"> 

           <div class="card card-body text-center">
                <h4> Modificar Categoria </h4> 
               <form action="../../../backend/crud/updatebackcategorias.php?id=<?php echo $id?>" method="POST"> 

                    <div>
                       <input type="text" name="codigo" class="form-control" value="<?php echo $recordSetProveedor['codigo'] ?>" autofocus>   
                   </div>
                   </br>

                   <div>
                       <input type="text" name="categoria" class="form-control" value="<?php echo $recordSetProveedor['nombre'] ?>" autofocus>   
                   </div>
                   </br>

                   <div class="row">
                   <div class="col-4"> 
                        <input type="submit" class="btn btn-danger btn-block" name="Guardar" value="Modificar">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                    <a href="categorias.php" class="btn btn-success btn-block">Cancelar</a>   
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