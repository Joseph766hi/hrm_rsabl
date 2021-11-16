<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('position_model');
		$this->load->model('vacancies_model');
		if($this->user_model->isNotLogin()) redirect(site_url('login'));
	}

	public function index()
	{
        $position = $this->position_model->getAll();
        $array_position = array();
        foreach($position as $pos) {
            $array_position[$pos->id] = $pos->name;
        }
		$data["array_position"] = $array_position;
		
        $data['vacancies'] = $this->vacancies_model->getAll();
		$data['content'] = 'home';
		$data['folder']	= './';
		$this->load->view('./layouts/app',$data);

	}
}
