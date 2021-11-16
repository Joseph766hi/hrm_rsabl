<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacancies extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('vacancies_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('position_model');
        $this->load->model('general_model');
        if($this->user_model->isNotLogin() || $this->session->userdata('user_logged')->role != 0) redirect(site_url('login'));
    }

	public function index()
	{
        $vacancies = $this->vacancies_model;
        $validation = $this->form_validation;
        $validation->set_rules($vacancies->rules());

        if ($validation->run()) {
            $vacancies->save();
            $this->general_model->generatePesan("Vacancies was added successfully","success");
            redirect(site_url('vacancies'));
        }
        $position = $this->position_model->getAll();
        $array_position = array();
        foreach($position as $pos) {
            $array_position[$pos->id] = $pos->name;
        }
        $data["array_position"] = $array_position;
        $data['vacancies'] = $this->vacancies_model->getAll();
		$data['content'] = 'index';
		$data['folder']	= 'vacancies';
		$this->load->view('./layouts/app',$data);

    }
    
    public function edit($id = null)    
    {
        if (!isset($id)) redirect('vacancies');

        $vacancies = $this->vacancies_model;
        $validation = $this->form_validation;
        $validation->set_rules($vacancies->rules());

        if ($validation->run()) {
            $vacancies->update();
            $this->general_model->generatePesan("vacancies was successfully edited","success");
            redirect(site_url('vacancies'));
        }

        $position = $this->position_model->getAll();
        $array_position = array();
        foreach($position as $pos) {
            $array_position[$pos->id] = $pos->name;
        }
        $data["array_position"] = $array_position;
        $data['vacancies'] = $vacancies->getById($id);
        if(!$data['vacancies']) show_404();
        $data['content'] = 'edit';
		$data['folder']	= 'vacancies';
        $this->load->view('./layouts/app',$data);
    }

    public function delete($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->vacancies_model->delete($id)) {
            redirect(site_url('vacancies'));
        }
    }
}
