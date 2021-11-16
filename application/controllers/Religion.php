<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Religion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('religion_model');
        $this->load->model('general_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        if($this->user_model->isNotLogin() || $this->session->userdata('user_logged')->role != 0) redirect(site_url('login'));
    }

	public function index()
	{
        $religion = $this->religion_model;
        $validation = $this->form_validation;
        $validation->set_rules($religion->rules());

        if ($validation->run()) {
            $res = $religion->save();
            if ($res) {
                $this->general_model->generatePesan("Religion was added successfully","success");
                redirect(site_url('religion'));
            }else{
                $this->general_model->generatePesan("Religion already exists","error");
                redirect(site_url('religion'));
            }
        }

        $data['religion'] = $this->religion_model->getAll();
		$data['content'] = 'index';
		$data['folder']	= 'religion';
		$this->load->view('./layouts/app',$data);

    }
    
    public function edit($id = null)    
    {
        if (!isset($id)) redirect('religion');

        $religion = $this->religion_model;
        $validation = $this->form_validation;
        $validation->set_rules($religion->rules());

        if ($validation->run()) {
            $res = $religion->update();
            if ($res) {
                $this->general_model->generatePesan("Religion was updated successfully","success");
                redirect(site_url('religion'));
            }else{
                $this->general_model->generatePesan("Religion already exists","error");
                redirect(site_url('religion/edit/'.$id));
            }
        }

        $data['religion'] = $religion->getById($id);
        if(!$data['religion']) show_404();
        $data['content'] = 'edit';
		$data['folder']	= 'religion';
        $this->load->view('./layouts/app',$data);
    }

    public function delete($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->religion_model->delete($id)) {
            redirect(site_url('religion'));
        }
    }
}
