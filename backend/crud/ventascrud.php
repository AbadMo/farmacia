<?php
    require_once 'database.php';

    class ventas extends Modelo{

        public function __construct(){
            parent::__construct();
        }

        public function getVentas(){
            $ventas= $this->db->query(" SELECT sum(dv.cantidad) AS CANTIDAD_VENDIDA, p.nombre
                                        AS  PRODUCTO FROM detalle_venta dv 
                                        INNER JOIN productos p 
                                        ON dv.idProductos = p.idProductos GROUP BY PRODUCTO");

            return $ventas->fetchall();
        }
    }

?>