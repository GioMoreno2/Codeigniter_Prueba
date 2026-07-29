<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $this->load->database();
        $this->load->model('Login_model');
        $this->load->library('session');
        $this->load->helper('url');

    }

    // Mostrar formulario
    public function index(){

        $this->load->view('login');

    }

    // Validar acceso
    public function autenticar(){

        $correo = $this->input->post('correo');

        $password = $this->input->post('password');

        $usuario = $this->Login_model->buscarCorreo($correo);

        if($usuario){

            if(password_verify($password,$usuario->us_password)){

                $datos = array(

                    'id'=>$usuario->id,

                    'nombre'=>$usuario->us_name,

                    'correo'=>$usuario->us_email,

                    'login'=>TRUE

                );

                $this->session->set_userdata($datos);

                redirect('usuarios/lista');

            }

        }

        $this->session->set_flashdata('error','Correo o contraseña incorrectos');

        redirect('login');

    }

    // Cerrar sesión
    public function salir(){

        $this->session->sess_destroy();

        redirect('login');

    }

}