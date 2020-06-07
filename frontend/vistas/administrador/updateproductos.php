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

    if(isset($_GET['idProductos'])){
        require_once '../../../backend/crud/productoscrud.php';
        require_once '../../../backend/crud/marcascrud.php';
        require_once '../../../backend/crud/categoriascrud.php';

        $id = $_GET['idProductos'];
        $producto = new productos();
        $marca = new marca();
        $categoria = new categoria();

        $listaMarcas = $marca->getMarcas();
        $listaCategorias = $categoria->getCategoria();

        $recordSetProductos = $producto->updateProductosId($_GET['idProductos']);
        $recordSetMarca = $marca->getMarcaForId($recordSetProductos['idMarcas']);
        $recordSetCategoria = $categoria->getCategoriaForId($recordSetProductos['idCategoria']);

    }

    include_once '../header/headerAdmin.php';

?>

<div class="container p-4" >
   
   <div class="row">

   <div class="col-3">
    </div>

       <div class="col-6"> 

           <div class="card card-body text-center">
                <h4> Modificar Productos </h4> 
               <form action="../../../backend/crud/updatebackproductos.php?idProductos=<?php echo $id?>" method="POST"> 

                   <div>
                       <input type="text" name="nombre" class="form-control" value="<?php echo $recordSetProductos["nombre"]?>" autofocus>   
                   </div>
                   </br>     
                   <div>
                       <input type="text" name="codigo" class="form-control" value="<?php echo $recordSetProductos["codigo"]?>">   
                   </div>
                   </br>
                   <div>
                       <textarea name="descripcion" rows="4" class="form-control"><?php echo $recordSetProductos["descripcion"]?></textarea>
                   </div>
                   </br>
                   <select name="marca"  class="form-control">
                       <option value="<?php echo $recordSetMarca['idMarcas'] ?>"><?php echo $recordSetMarca['nombre'] ?></option>
                       <?php foreach($listaMarcas as $list): ?>
                            <?php if($list['nombre'] != $recordSetMarca['nombre']):?>
                                <option value="<?php echo $list['idMarcas']?>"><?php echo $list['nombre']?></option>
                            <?php endif;?>
                       <?php endforeach;?>
                   </select>
                   </br>
                   <select name="categoria"  class="form-control">
                       <option value="<?php echo $recordSetCategoria['idCategoria']?>"><?php echo $recordSetCategoria['nombre'] ?></option>
                       <?php foreach($listaCategorias as $lista):?>
                       <?php if($lista['nombre'] != $recordSetCategoria['nombre']):?>
                        <option value="<?php echo $lista['idCategoria']?>"><?php echo $lista['nombre']?></option>
                       <?php endif;?>
                       <?php endforeach;?>
                   </select>
                   </br>
                   <div class="row">
                   <div class="col-4"> 
                        <input type="submit" class="btn btn-danger btn-block" name="Guardar" value="Modificar">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                    <a href="productos.php" class="btn btn-success btn-block">Cancelar</a>   
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
