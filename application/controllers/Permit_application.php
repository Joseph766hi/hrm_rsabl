<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permit_application extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('paidleave_model');
        $this->load->model('employee_model');
        $this->load->model('general_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        if($this->user_model->isNotLogin() || $this->session->userdata('user_logged')->role != 0) redirect(site_url('login'));
    }

	public function index()
	{
        $wherein = [3,4];
        if ($this->input->get()) {
            $get = $this->input->get();
            $data['permit_application'] = $this->paidleave_model->findByDate($get,$wherein);
            // var_dump($data['permit_application']);die;
            $data["default_from"] = $get["from"];
            $data["default_to"] = $get["to"];
        } else {
            $month = date("m");
            $year = date("Y");
            $last_day = date("t");
            $data["default_from"] = $year."-".$month."-01";
            $data["default_to"] = $year."-".$month."-".$last_day;
            $data['permit_application'] = $this->paidleave_model->getAll($wherein);
        }
		$data['content'] = 'index';
		$data['folder']	= 'permit_application';
		$this->load->view('./layouts/app',$data);

    }


    public function report()
    {
        $data['permit_application'] = [];
        $wherein = [3,4];
        if ($this->input->get()) {
            $get = $this->input->get();
            $data['permit_application'] = $this->paidleave_model->findByDate($get,$wherein);
            // var_dump($data['permit_application']);die;
            $data["default_from"] = $get["from"];
            $data["default_to"] = $get["to"];
        } else {
            $month = date("m");
            $year = date("Y");
            $last_day = date("t");
            $data["default_from"] = $year."-".$month."-01";
            $data["default_to"] = $year."-".$month."-".$last_day;
        }
        // var_dump( $data['permit_application']);die;
        $data['employees']  = $this->employee_model->getAll();
        $data['content'] = 'report';
        $data['folder']	= 'permit_application';
        $this->load->view('./layouts/app',$data);   
    }

    public function approve($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->paidleave_model->approve($id)) {
            redirect(site_url('permit_application'));
        }
    }

    public function reject($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->paidleave_model->reject($id)) {
            redirect(site_url('permit_application'));
        }
    }

    public function delete($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->paidleave_model->delete($id)) {
            redirect(site_url('permit_application'));
        }
    }
}
