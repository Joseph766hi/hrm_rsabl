<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('bank_model');
        $this->load->model('general_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        if($this->user_model->isNotLogin() || $this->session->userdata('user_logged')->role != 0) redirect(site_url('login'));
    }

	public function index()
	{
        $bank = $this->bank_model;
        $validation = $this->form_validation;
        $validation->set_rules($bank->rules());

        if ($validation->run()) {
            $res = $bank->save();
            if ($res) {
                $this->general_model->generatePesan("Bank was added successfully","success");
                redirect(site_url('bank'));   
            }else{
                $this->general_model->generatePesan("Bank already exists","error");
                redirect(site_url('bank'));
            }
        }

        $data['bank'] = $this->bank_model->getAll();
		$data['content'] = 'index';
		$data['folder']	= 'bank';
		$this->load->view('./layouts/app',$data);

    }
    
    public function edit($id = null)    
    {
        if (!isset($id)) redirect('bank');

        $bank = $this->bank_model;
        $validation = $this->form_validation;
        $validation->set_rules($bank->rules());

        if ($validation->run()) {
            $res = $bank->update();
            if ($res) {
                $this->general_model->generatePesan("Bank was successfully edited","success");
                redirect(site_url('bank'));
            }else{
                $this->general_model->generatePesan("Bank already exists","error");
                redirect(site_url('bank/edit/'.$id));
            }
        }

        $data['bank'] = $bank->getById($id);
        if(!$data['bank']) show_404();
        $data['content'] = 'edit';
		$data['folder']	= 'bank';
        $this->load->view('./layouts/app',$data);
    }

    public function delete($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->bank_model->delete($id)) {
            redirect(site_url('bank'));
        }
    }
}
