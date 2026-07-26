<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargamos lo indispensable para que el formulario funcione
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        
        // Cargamos la base de datos de manera directa aquí
        $this->load->database(); 
    }

    public function index() {
        // Reglas de validación
        $this->form_validation->set_rules('us_name', 'Nombre', 'required');
        $this->form_validation->set_rules('us_email', 'Correo Electrónico', 'required|valid_email');
        $this->form_validation->set_rules('us_password', 'Contraseña', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Muestra tu archivo de vista ordinario
            $this->load->view('registro_usuarios');
        } else {
            // Preparamos los datos del formulario
            $datos_usuario = array(
                'us_name'   => $this->input->post('us_name'),
                'us_email'    => $this->input->post('us_email'),
                'us_password' => password_hash($this->input->post('us_password'), PASSWORD_BCRYPT) 
            );

            // 🔥 SOLUCIÓN DIRECTA: Insertamos directamente en la tabla 'usuarios' sin usar el modelo
            if ($this->db->insert('us_usuarios', $datos_usuario)) {
                $this->session->set_flashdata('exito', '¡Usuario registrado correctamente!');
                redirect('usuarios'); 
            } else {
                // Si PostgreSQL rechaza los datos por nombres de columnas mal puestos, aquí saldrá
                $error = $this->db->error();
                echo "<h3>Error directo en la base de datos PostgreSQL:</h3>";
                echo "Código: " . $error['code'] . "<br>";
                echo "Mensaje: " . $error['message'] . "<br>";
                die(); 
            }
        }
    }
}
