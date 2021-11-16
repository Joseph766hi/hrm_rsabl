<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('general_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->input->post())
        {
            if($this->User_model->doLogin()) {
                redirect(site_url('home'));
            } else {
                $this->general_model->generatePesan("Username or password Wrong!!","failed");
                redirect(site_url('login'));
            }
        }

        if ($this->session->userdata('user_logged') != null) redirect(site_url('home'));

        $this->load->view('v_login.php');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}