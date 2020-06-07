<?php
    require_once 'database.php';

    class categoria extends Modelo{

        public function __construct(){
            parent::__construct();
        }

        public function getCategoria(){
            $sql = "SELECT * FROM categorias";
            return ($this->db->query($sql))->fetchAll();
        }

        public function getCategoriaForId($id){
            $sql = "SELECT * FROM categorias WHERE idCategoria = ?";
            $get = $this->db->prepare($sql);
            $get->bindParam(1,$id);
            $get->execute();
            return $get->fetch();
        }

        public function setCategoria($codigo, $nombre){
            $sql = "INSERT INTO categorias(codigo, nombre) VALUES(?, ?)";
            $categoria = $this->db->prepare($sql);
            $categoria->bindParam(1,$codigo);
            $categoria->bindParam(2,$nombre);
            $categoria->execute();

            return $categoria->rowCount();
        }

        public function updateCategoria($id,$nombre,$codigo){
            $sql = "UPDATE categorias SET nombre = ?, codigo = ? WHERE idCategoria = ?";
            $update = $this->db->prepare($sql);
            $update->bindParam(1,$nombre);
            $update->bindParam(2,$codigo);
            $update->bindParam(3,$id);
            $update->execute();

            return $update->rowCount();
        }

    }

?>