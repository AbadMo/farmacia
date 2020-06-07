<?php
    require_once 'database.php';

    class varios extends Modelo{
        
        public function __construct(){
            parent::__construct();
        }

        public function getMedDesCat(){
            $get = $this->db->query(" SELECT p.nombre AS Medicamento, p.descripcion AS Descripcion, c.nombre AS Categoria 
                                            FROM productos p 
                                            INNER JOIN categorias c 
                                            ON p.idCategoria = c.idCategoria "); 

            return $get->fetchall();            
        }


        // Esta consulta extrae los datos de los productos 
        // con su marca y categoria

        public function getProductosWithMarcaAndCategoria($idMarca, $idCategoria){
            $sql = "SELECT p.idProductos AS id, p.descripcion, p.nombre AS producto, p.codigo AS codigo, c.nombre AS categoria, m.nombre AS marca FROM
                    productos p INNER JOIN categorias c ON p.idCategoria = c.idCategoria INNER JOIN
                    marcas m ON p.idMarcas = m.idMarcas WHERE p.idCategoria = ? AND p.idMarcas = ?";
            $consulta = $this->db->prepare($sql);
            $consulta->bindParam(1,$idCategoria);
            $consulta->bindParam(2,$idMarca);
            $consulta->execute();

            return $consulta->fetch();
        }


    }

?>