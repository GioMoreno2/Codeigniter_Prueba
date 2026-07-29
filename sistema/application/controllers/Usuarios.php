<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->helper('url');

        $this->load->database();
        $this->load->model('Login_model');
    }



    // FORMULARIO DE REGISTRO
    public function index()
    {
        $this->load->view('registro_usuarios');
    }


    // GUARDAR USUARIO
    public function guardar()
    {

        $this->form_validation->set_rules(
            'us_curp',
            'CURP',
            'required|regex_match[/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[A-Z0-9][0-9]$/]'
        );


        $this->form_validation->set_rules(
            'us_name',
            'Nombre',
            'required'
        );


        $this->form_validation->set_rules(
            'us_sexo',
            'Sexo',
            'required'
        );


        $this->form_validation->set_rules(
            'us_telefono',
            'Teléfono',
            'required'
        );


        $this->form_validation->set_rules(
            'us_email',
            'Correo',
            'required|valid_email'
        );


        $this->form_validation->set_rules(
            'us_password',
            'Contraseña',
            'required|min_length[8]'
        );


        if($this->form_validation->run()==FALSE){

            $this->load->view('login');


        }else{


            $datos=array(

                'us_curp'=>$this->input->post('us_curp'),

                'us_name'=>$this->input->post('us_name'),

                'us_sexo'=>$this->input->post('us_sexo'),

                'us_telefono'=>$this->input->post('us_telefono'),

                'us_email'=>$this->input->post('us_email'),

                'us_password'=>password_hash(
                    $this->input->post('us_password'),
                    PASSWORD_BCRYPT
                )

            );


            if($this->db->insert('us_usuarios',$datos)){


                $this->session->set_flashdata(
                    'exito',
                    '¡Usuario registrado correctamente!'
                );


                redirect('usuarios/lista');


            }else{


                echo "Error al registrar usuario";


            }

        }

    }



    // LISTA DE USUARIOS
  public function lista()
{

    $data['usuarios'] = $this->db
    ->get('us_usuarios')
    ->result();


    // Datos para gráfica

    $data['total']=$this->db->count_all('us_usuarios');


    $data['hombres']=$this->db
    ->where('us_sexo','H')
    ->count_all_results('us_usuarios');


    $data['mujeres']=$this->db
    ->where('us_sexo','M')
    ->count_all_results('us_usuarios');


    $this->load->view(
        'lista_usuarios',
        $data
    );

}



    // EDITAR
    public function editar($id)
    {

        $data['usuario']=$this->db
        ->where('id',$id)
        ->get('us_usuarios')
        ->row();


        $this->load->view(
            'editar_usuario',
            $data
        );

    }



    // ACTUALIZAR
    public function actualizar($id)
    {


        $datos=array(

            'us_curp'=>$this->input->post('us_curp'),

            'us_name'=>$this->input->post('us_name'),

            'us_sexo'=>$this->input->post('us_sexo'),

            'us_telefono'=>$this->input->post('us_telefono'),

            'us_email'=>$this->input->post('us_email')

        );


        $this->db
        ->where('id',$id)
        ->update(
            'us_usuarios',
            $datos
        );


        redirect('usuarios/lista');

    }



    // ELIMINAR
    public function eliminar($id)
    {

        $this->db
        ->where('id',$id)
        ->delete('us_usuarios');


        redirect('usuarios/lista');

    }



    // GRAFICA
    public function grafica()
    {

        $total=$this->db->count_all('us_usuarios');


        $hombres=$this->db
        ->where('us_sexo','H')
        ->count_all_results('us_usuarios');


        $mujeres=$this->db
        ->where('us_sexo','M')
        ->count_all_results('us_usuarios');


        $datos=array(

            'total'=>$total,

            'hombres'=>$hombres,

            'mujeres'=>$mujeres

        );


        $this->load->view(
            'grafica_usuarios',
            $datos
        );

    }

}