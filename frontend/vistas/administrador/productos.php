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

    require_once '../../../backend/crud/marcascrud.php';
    require_once '../../../backend/crud/categoriascrud.php';   
    require_once '../../../backend/crud/productoscrud.php';    

    $marcas = new marca();
    $categoria = new categoria();
    $productos = new productos();

    $marcasRecordSet = $marcas->getMarcas();
    $categoriaRecordSet = $categoria->getCategoria();
    $productosRecordSet = $productos->getProductos();

    include_once '../header/headerAdmin.php';
?>

<div class="container p-4" >
   
   <div class="row">
       
       <div class="col-3">
            <?php if(isset($_SESSION['setProductos'])):?>
                <div class="alert alert-<?= $_SESSION['setProductosType']?> alert-dismissible fade show col-12" role="alert">
                    <?= $_SESSION['setProductos']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                       
            <?php unset($_SESSION['setProductos']);?>
            <?php unset($_SESSION['setProductosType']); endif;?>      

           <div class="card card-body text-center">
                <h4> Agregar Productos </h4> 
               <form action="../../../backend/crud/agregarproducto.php" method="POST"> 

                   <div>
                       <input type="text" name="nombre" class="form-control" placeholder="Nombre producto" autofocus>   
                   </div>
                   </br>     
                   <div>
                       <input type="text" name="codigo" class="form-control" placeholder="Codigo">   
                   </div>
                   </br>
                   <div>
                       <textarea name="descripcion" rows="4" class="form-control" placeholder="Descripcion"></textarea>
                   </div>
                   </br>
                        <select name="marca" class="form-control">
                        <option>Seleccione Marca ... </option>
                            <?php foreach($marcasRecordSet as $m):?>
                                <option value="<?php echo $m['idMarcas'];?>"><?php echo $m['nombre'];?></option>
                            <?php endforeach;?>
                        </select>
                    </br>
                        <select name="categoria" class="form-control">
                            <option>Seleccione Categoria</option>
                            <?php foreach($categoriaRecordSet as $c):?>
                                <option value="<?php echo $c['idCategoria'];?>"><?php echo $c['nombre'];?></option>
                            <?php endforeach;?>
                        </select>     
                    <!-- </div> -->
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
                           <th>Descripcion</th>
                           <th>Codigo</th>                                                                                                      
                           <th  width=50>Accion</th>
                       </tr>
                   </thead>

                   <tbody>
                        <?php foreach($productosRecordSet as $prod):?>
                            <tr>
                                <td><?php echo $prod['nombre']?></td>   
                                <td><?php echo $prod['descripcion']?></td>
                                <td><?php echo $prod['codigo']?></td>
                                <td><a href="updateproductos.php?idProductos=<?php echo $prod['idProductos']?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        <?php endforeach;?>    
                   </tbody>
               
               </table>
       </div>

   </div>

</div>

</body>       
</html>