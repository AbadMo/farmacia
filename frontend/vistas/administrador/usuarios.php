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

    require '../../../backend/crud/usuarioscrud.php';

    $usuarios = new user;
    $users = $usuarios->getUsuRoles();
    $rol = $usuarios->getRoles();

    include_once '../header/headerAdmin.php';
?>
      
        <div class="container-fluid p-4" >

            <div class="row">
            
                <div class="col-4">

                    <?php if(isset($_SESSION['UserAdd'])):?>
                        <div class="alert alert-<?= $_SESSION['UserAddType']?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['UserAdd']?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                        
                    <?php unset($_SESSION['UserAdd'])?>
                    <?php unset($_SESSION['UserAddType']); endif;?>  

                    <div class="card card-body text-center">
                        <h4> Agregar Usuarios </h4> 
                        </br>
                            <form action = "../../../backend/crud/agregaUsuarios.php" method="POST">

                                <div>
                                    <input type="nombre" class="form-control" placeholder="Ingrese su nombre" name="nombre" autofocus/>
                                </div>
                                </br>
                                <div>
                                    <input type="email" class="form-control" placeholder="email@email.com" name="email"/>
                                </div>
                                </br>
                                <div>
                                    <input type="password" class="form-control" placeholder="Contraseña" name="pass"/>
                                </div>
                                </br>
                                <div>
                                    <input type="password" class="form-control" placeholder="Reingrese contraseña" name="rep"/>
                                </div>
                                </br>
                                <div> 
                                    <select name="rol" class="form-control">
                                    <option value="">Seleccione rol</option>
                                    <?php foreach($rol as $r):?>
                                        <option value="<?php echo $r['idRoles'];?>"><?php echo $r['nombre'];?></option>
                                    <?php endforeach;?>
                                    </select>                           
                                </div> 
                                </br>
                                <input type="submit" class="btn btn-success btn-block" name="Guardar" value="Guardar">

                            </form>
                    </div>

                </div>

                <div class="col-8">
                    <table class = "table">
                
                        <thead class="thead-dark">
                            <tr>
                                
                                <th>Cargo</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Activo</th>
                                <th width=50>Accion</th>
                
                            </tr>
                
                        </thead>

                        <tbody>

                            <?php foreach($users as $u): ?>
                                <tr>
                                    <td><?php echo $u['CARGO']?></td>
                                    <td><?php echo $u['USUARIO']?></td>
                                    <td><?php echo$u['EMAIL']?></td>
                                    <td><?php echo ($u['ACTIVO'] == 1) ? 'Activo' : 'Inactivo' ?></td>
                                    <td>
                                        <a href="updateUsers.php?id=<?php echo $u['ID']?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>                                     
                                    </td>
                                </tr>
                            <?php endforeach;?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </body>

</html>
