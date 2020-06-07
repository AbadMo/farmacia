<?php

require_once 'conexion.php';

class Modelo
{
	protected $db;

	public function __construct(){
		$this->db = new Database;
	}
}

?>