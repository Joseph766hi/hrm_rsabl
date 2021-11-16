<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('user_model');
        $this->load->model('position_model');
        $this->load->model('division_model');
        $this->load->model('religion_model');
        $this->load->model('bank_model');
        $this->load->model('general_model');
        $this->load->library('form_validation');
        if($this->user_model->isNotLogin() || $this->session->userdata('user_logged')->role != 0) redirect(site_url('login'));
    }

	public function index()
	{
        $data['employees'] = $this->employee_model->getAll();
		$data['content'] = 'index';
		$data['folder']	= 'employee';
		$this->load->view('./layouts/app',$data);

    }

    public function add()
    {
        $employee = $this->employee_model;
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($employee->rules());
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->save();
            $id = $user->getId();
            // var_dump($id->id);die;
            $employee->save($id->id);
            $this->general_model->generatePesan("Employee was added successfully","success");
            redirect(site_url('employee'));
        }
        $data['position']   = $this->position_model->getAll();
        $data['bank']   = $this->bank_model->getAll();
        $data['division']   = $this->division_model->getAll();
        $data['religion']   = $this->religion_model->getAll();
        $data['content'] = 'create';
		$data['folder']	= 'employee';
		$this->load->view('./layouts/app',$data);
    }
    
    public function edit($id = null)    
    {
        $employee = $this->employee_model;
        $user = $this->user_model;
        $validation = $this->form_validation;
        $rule = [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'role',
            'label' => 'Role User',
            'rules' => 'required'],

            ['field' => 'nik',
            'label' => 'NIK',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'no_telp',
            'label' => 'No HP',
            'rules' => 'required'],

            ['field' => 'account_number',
            'label' => 'Account Number',
            'rules' => 'required'],

            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'position_id',
            'label' => 'Position',
            'rules' => 'required'],
            
            ['field' => 'division_id',
            'label' => 'Division',
            'rules' => 'required'],
            
            ['field' => 'religion_id',
            'label' => 'Religion',
            'rules' => 'required'],

            ['field' => 'gender',
            'label' => 'Gender',
            'rules' => 'required'],

            ['field' => 'place_of_birth',
            'label' => 'Place Of Birth',
            'rules' => 'required'],

            ['field' => 'date_of_birth',
            'label' => 'Date Of Birth',
            'rules' => 'required'],

            ['field' => 'address',
            'label' => 'Address',
            'rules' => 'required']
        ];
        $validation->set_rules($rule);

        $err = array();

        if ($validation->run()) {
            $u = $user->update();
            $e = $employee->update($id);
            if($e['st'] == 400 && !$u){
                $err['username'] = "Username already exists";
                $error = array_merge($err,$e['ar']);
                $msg = implode(", ",$error);
                $this->general_model->generatePesan($msg,"error");
                redirect(site_url('employee/edit/'.$id));
            }elseif (!$u) {
                $err['username'] = "Username already exists";
                $this->general_model->generatePesan($err['username'],"error");
                redirect(site_url('employee/edit/'.$id));
            }elseif ($e['st'] == 400) {
                $msg = implode(", ",$e['ar']);
                $this->general_model->generatePesan($msg,"error");
                redirect(site_url('employee/edit/'.$id));
            }
            $this->general_model->generatePesan("Employee was updated successfully","success");
            redirect(site_url('employee'));
        }
        $data['position']   = $this->position_model->getAll();
        $data['division']   = $this->division_model->getAll();
        $data['religion']   = $this->religion_model->getAll();
        $data['bank']   = $this->bank_model->getAll();
        $data['user'] = $this->employee_model->getById($id);
        if(!$data['user']) show_404();
        $data['content'] = 'edit';
		$data['folder']	= 'employee';
		$this->load->view('./layouts/app',$data);
    }

    public function delete($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->employee_model->delete($id)) {
            redirect(site_url('employee'));
        }
    }

    public function view($id)
    {
        $data['user'] = $this->employee_model->getById($id);
        if(!$data['user']) show_404();
        $data['content'] = 'view';
		$data['folder']	= 'employee';
		$this->load->view('./layouts/app',$data);
    }
}
