<?php

    require_once 'database.php';

    class imagenModel extends Modelo{
        public function __construct(){
            parent::__construct();
        }

        public function setImagen($titulo,$descripcion,$nombre,$producto,$portada){
            $productos = (int) $producto;
            $portada = (int) $portada;

            $img = $this->db->prepare("INSERT INTO images VALUES(null, ?, ?, ?, ?, ?, now(), now()");
            $img->bindParam(1,$titulo);
            $img->bindParam(2,$descripcion);
            $img->bindParam(3,$nombre);
            $img->bindParam(4,$producto);
            $img->bindParam(5,$portada);
            $img->execute();

            return $img->rowCount();
        }
    }
?>