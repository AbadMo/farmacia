<?php
    require_once 'database.php';

    class marca extends Modelo{

        public function __construct(){
            parent::__construct();
        }

        public function getMarcas(){
            $sql = "SELECT * FROM marcas";
            return ($this->db->query($sql))->fetchAll();
        }

        public function getMarcaForId($id){
            $sql = "SELECT * FROM marcas WHERE idMarcas = ?";
            $get = $this->db->prepare($sql);
            $get->bindParam(1,$id);
            $get->execute();
            return $get->fetch();
        }

        public function setMarcas($nombre){
            $sql = "INSERT INTO marcas (nombre) VALUES(?)";
            $marca = $this->db->prepare($sql);
            $marca->bindParam(1,$nombre);
            $marca->execute();

            return $marca->rowCount();
        }

        public function updateMarcas($id,$nombre){
            $sql = "UPDATE marcas SET nombre = ? WHERE idMarcas = ?";
            $marca = $this->db->prepare($sql);
            $marca->bindParam(1,$nombre);
            $marca->bindParam(2,$id);
            $marca->execute();

            return $marca->rowCount();
        }

    }
?>