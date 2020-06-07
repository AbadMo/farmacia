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

    require_once '../../../backend/crud/usuarioscrud.php';
    require_once '../../../backend/crud/ventascrud.php';

    $res = new user();
    $ar = $res->statisticUsers();
    $ventas = new ventas();
    $ven = $ventas->getVentas();

    include_once '../header/headerAdmin.php';
?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(userbyRol);
    google.charts.setOnLoadCallback(productosVendidos);

    function userbyRol() {

        var data = google.visualization.arrayToDataTable([
        ['Language', 'Rating'],
        <?php
            foreach($ar as $r){
                echo "['".$r['Cargo']."', ".$r['Total']."],";
            }
        ?>
        ]);
        
        var options = {
            title: 'Usuarios por Rol',
            width: 900,
            height: 500,
        };
        
        var chart = new google.visualization.PieChart(document.getElementById('UsuariosRol'));
        
        chart.draw(data, options);
    }

    function productosVendidos() {

        var data = google.visualization.arrayToDataTable([
        ['Language', 'Rating'],
        <?php
            foreach($ven as $r){
                echo "['".$r['PRODUCTO']."', ".$r['CANTIDAD_VENDIDA']."],";
            }
        ?>
        ]);

        var options = {
            title: 'Cantidad de productos vendidos',
            width: 900,
            height: 500,
        };

        var chart = new google.visualization.PieChart(document.getElementById('VentasbyProducto'));

        chart.draw(data, options);
    }

</script>
            <div class="row">
                <div class="col-4">
                    <div id="UsuariosRol"></div>
                </div>
                <div class="col-4">
                <div id="VentasbyProducto"></div>
                </div>
            </div>

            <div class="row">
                <!-- Aca van los demas graficos -->
            </div>
                
    </body>

</html>