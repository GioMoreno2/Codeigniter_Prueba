<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //En este apartado Carga la base de datos 
        // nos vamos a asegurarnos de configurar la application/config/database.php)
        $this->load->database(); 
    }

    // Método para insertar el usuario en la tabla
    public function registrar_usuario($datos) {
        return $this->db->insert('us_usuarios', $datos);
    }
}