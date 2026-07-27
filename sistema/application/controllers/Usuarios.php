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
    $this->form_validation->set_rules(
        'us_curp',
        'CURP',
        'required|regex_match[/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[A-Z0-9][0-9]$/]'
    );

    $this->form_validation->set_rules(
        'us_name',
        'Nombre',
        'required|regex_match[/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/]'
    );

    $this->form_validation->set_rules(
        'us_sexo',
        'Sexo',
        'required|in_list[H,M]'
    );

    $this->form_validation->set_rules(
        'us_telefono',
        'Teléfono',
        'required|regex_match[/^[0-9]{10}$/]'
    );

    $this->form_validation->set_rules(
        'us_email',
        'Correo Electrónico',
        'required|valid_email'
    );

    $this->form_validation->set_rules(
        'us_password',
        'Contraseña',
        'required|min_length[8]'
    );

    if ($this->form_validation->run() == FALSE) {

        $this->load->view('registro_usuarios');

    } else {

        $datos_usuario = array(
            'us_curp'      => $this->input->post('us_curp'),
            'us_name'      => $this->input->post('us_name'),
            'us_sexo'      => $this->input->post('us_sexo'),
            'us_telefono'  => $this->input->post('us_telefono'),
            'us_email'     => $this->input->post('us_email'),
            'us_password'  => password_hash(
                $this->input->post('us_password'),
                PASSWORD_BCRYPT
            )
        );

        if ($this->db->insert('us_usuarios', $datos_usuario)) {

            $this->session->set_flashdata(
                'exito',
                '¡Usuario registrado correctamente!'
            );

            redirect('usuarios');

        } else {

            $error = $this->db->error();

            echo "<h3>Error directo en la base de datos PostgreSQL:</h3>";
            echo "Código: " . $error['code'] . "<br>";
            echo "Mensaje: " . $error['message'] . "<br>";

            die();
        }
    }
    
}

public function grafica()
{
    // Total de usuarios
    $total = $this->db->count_all('us_usuarios');

    // Usuarios hombres
    $hombres = $this->db
        ->where('us_sexo', 'H')
        ->count_all_results('us_usuarios');

    // Usuarios mujeres
    $mujeres = $this->db
        ->where('us_sexo', 'M')
        ->count_all_results('us_usuarios');

    $datos = array(
        'total' => $total,
        'hombres' => $hombres,
        'mujeres' => $mujeres
    );

    $this->load->view('grafica_usuarios', $datos);
}

}
