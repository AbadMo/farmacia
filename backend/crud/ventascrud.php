<?php
    require_once 'database.php';

    class ventas extends Modelo{

        public function __construct(){
            parent::__construct();
        }

        public function getVentas(){
            $ventas = $this->db->query("SELECT p.nombre AS PRODUCTO, sum(dv.cantidad) AS CANTIDAD_VENDIDA FROM 
                                        productos AS p INNER JOIN detalle_venta AS dv ON p.idProductos = dv.idProductos 
                                        INNER JOIN ventas ON ventas.idVentas = dv.idVentas GROUP BY dv.idProductos"); 

            return $ventas->fetchall();
        }
    }

?>