<?php
    require_once 'database.php';
    
    class productos extends Modelo{

        public function __construct(){
            parent::__construct();
        }

        public function getProductos(){
            $sql = "SELECT * FROM productos";
            return ($this->db->query($sql))->fetchAll();
        }

        public function setProductos($nombre,$descripcion,$codigo,$idCategoria,$idMarca){
            $sql = "INSERT INTO productos(descripcion, nombre, codigo, idCategoria, idMarcas) VALUES(?, ?, ?, ?, ?) ";
            $productos = $this->db->prepare($sql);
            $productos->bindParam(1,$descripcion);
            $productos->bindParam(2,$nombre);
            $productos->bindParam(3,$codigo);
            $productos->bindParam(4,$idCategoria);
            $productos->bindParam(5,$idMarca);
            $productos->execute();
            
            return $productos->rowCount();
            
        }

        public function updateProducto($id,$nombre,$descripcion,$codigo,$idCategoria,$idMarca){
            $sql = "UPDATE productos SET descripcion = ?, nombre = ?, codigo = ?, idCategoria = ?, idMarcas = ? WHERE idProductos = ?";
            $update = $this->db->prepare($sql);
            $update->bindParam(1,$descripcion);
            $update->bindParam(2,$nombre);
            $update->bindParam(3,$codigo);
            $update->bindParam(4,$idCategoria);
            $update->bindParam(5,$idMarca);
            $update->bindParam(6,$id);
            $update->execute();

            return $update->rowCount();
        }

        public function updateProductosId($idProducto){
            $sql = "SELECT * FROM productos WHERE idProductos = ?";
            $consulta = $this->db->prepare($sql);
            $consulta->bindParam(1,$idProducto);
            $consulta->execute();
            return $consulta->fetch();
        }

    }

?>
