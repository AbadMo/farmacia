<?php
    require_once 'database.php';

    class proveedor extends Modelo{

        public function __construct(){
            parent::__construct();
        }

        public function getProveedores(){
            $sql = "SELECT * FROM proveedores";
            return ($this->db->query($sql))->fetchAll();
        }

        public function getProveedorById($id){
            $sql = "SELECT * FROM proveedores WHERE idProveedores = $id";
            return ($this->db->query($sql))->fetch();

        }

        public function setProveedores($nombre, $rut, $direccion, $email, $contacto){
            $sql = "INSERT INTO proveedores(nombre, rut, direccion, email, contacto) VALUES(?,?,?,?,?)";
            $set = $this->db->prepare($sql);
            $set->bindParam(1,$nombre);
            $set->bindParam(2,$rut);
            $set->bindParam(3,$direccion);
            $set->bindParam(4,$email);
            $set->bindParam(5,$contacto);
            $set->execute();

            return $set->rowCount();

        }

        public function updateProveedor($id, $nombre, $rut, $direccion, $email, $contacto, $activo){
            $sql = "UPDATE proveedores SET nombre = ?, rut = ?, direccion = ?, email = ?, contacto = ?, activo = ? WHERE idProveedores = ?";
            $update = $this->db->prepare($sql);
            $update->bindParam(1,$nombre);
            $update->bindParam(2,$rut);
            $update->bindParam(3,$direccion);
            $update->bindParam(4,$email);
            $update->bindParam(5,$contacto);
            $update->bindParam(6,$activo);
            $update->bindParam(7,$id);
            $update->execute();
            return $update->rowCount();
        }

    }

?>