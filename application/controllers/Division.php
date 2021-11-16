<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('division_model');
        $this->load->model('general_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        if($this->user_model->isNotLogin() || $this->session->userdata('user_logged')->role != 0) redirect(site_url('login'));
    }

	public function index()
	{
        $division = $this->division_model;
        $validation = $this->form_validation;
        $validation->set_rules($division->rules());

        if ($validation->run()) {
            $res = $division->save();
            if ($res) {
                $this->general_model->generatePesan("Division was added successfully","success");
                redirect(site_url('division'));
            }else{
                $this->general_model->generatePesan("Division already exists","error");
                redirect(site_url('division'));
            }
        }

        $data['division'] = $this->division_model->getAll();
		$data['content'] = 'index';
		$data['folder']	= 'division';
		$this->load->view('./layouts/app',$data);

    }
    
    public function edit($id = null)    
    {
        if (!isset($id)) redirect('division');

        $division = $this->division_model;
        $validation = $this->form_validation;
        $validation->set_rules($division->rules());

        if ($validation->run()) {
            $res = $division->update();
            if ($res) {
                $this->general_model->generatePesan("Division was successfully edited","success");
                redirect(site_url('division'));
            }else{
                $this->general_model->generatePesan("Division already exists","error");
                redirect(site_url('division/edit/'.$id));
            }
        }

        $data['division'] = $division->getById($id);
        if(!$data['division']) show_404();
        $data['content'] = 'edit';
		$data['folder']	= 'division';
        $this->load->view('./layouts/app',$data);
    }

    public function delete($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->division_model->delete($id)) {
            redirect(site_url('division'));
        }
    }
}
