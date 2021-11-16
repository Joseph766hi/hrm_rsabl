<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('position_model');
        $this->load->model('general_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        if($this->user_model->isNotLogin() || $this->session->userdata('user_logged')->role != 0) redirect(site_url('login'));
    }

	public function index()
	{
        $position = $this->position_model;
        $validation = $this->form_validation;
        $validation->set_rules($position->rules());

        if ($validation->run()) {
            $res = $position->save();
            if ($res) {
                $this->general_model->generatePesan("Position was successfully added","success");
                redirect(site_url('position'));
            }else{
                $this->general_model->generatePesan("Position already exists","error");
                    redirect(site_url('position'));
            }
        }

        $data['position'] = $this->position_model->getAll();
		$data['content'] = 'index';
		$data['folder']	= 'position';
		$this->load->view('./layouts/app',$data);

    }
    
    public function edit($id = null)    
    {
        if (!isset($id)) redirect('position');

        $position = $this->position_model;
        $validation = $this->form_validation;
        $validation->set_rules($position->rules());

        if ($validation->run()) {
            $res = $position->update();
            if ($res) {
                $this->general_model->generatePesan("Position was successfully edited","success");
                redirect(site_url('position'));
            }else{
                $this->general_model->generatePesan("Position already exists","error");
                    redirect(site_url('position/edit/'.$id));
            }
        }

        $data['position'] = $position->getById($id);
        if(!$data['position']) show_404();
        $data['content'] = 'edit';
		$data['folder']	= 'position';
        $this->load->view('./layouts/app',$data);
    }

    public function delete($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->position_model->delete($id)) {
            redirect(site_url('position'));
        }
    }
}
