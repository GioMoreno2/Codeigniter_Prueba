<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function buscarCorreo($correo)
    {

        return $this->db
                    ->where('us_email',$correo)
                    ->get('us_usuarios')
                    ->row();

    }

}