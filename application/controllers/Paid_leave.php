<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paid_leave extends CI_Controller {

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
        $wherein = [1,2];
        if ($this->input->get()) {
            $get = $this->input->get();
            $data['paid_leave'] = $this->paidleave_model->findByDate($get,$wherein);
            // var_dump($data['paid_leave']);die;
            $data["default_from"] = $get["from"];
            $data["default_to"] = $get["to"];
        } else {
            $month = date("m");
            $year = date("Y");
            $last_day = date("t");
            $data["default_from"] = $year."-".$month."-01";
            $data["default_to"] = $year."-".$month."-".$last_day;
            $data['paid_leave'] = $this->paidleave_model->getAll($wherein);
        }
		$data['content'] = 'index';
		$data['folder']	= 'paid_leave';
		$this->load->view('./layouts/app',$data);

    }


    public function report()
    {
        $data['paid_leave'] = [];
        $wherein = [1,2];
        if ($this->input->get()) {
            $get = $this->input->get();
            $data['paid_leave'] = $this->paidleave_model->findByDate($get,$wherein);
            // var_dump($data['paid_leave']);die;
            $data["default_from"] = $get["from"];
            $data["default_to"] = $get["to"];
        } else {
            $month = date("m");
            $year = date("Y");
            $last_day = date("t");
            $data["default_from"] = $year."-".$month."-01";
            $data["default_to"] = $year."-".$month."-".$last_day;
        }
        // var_dump( $data['paid_leave']);die;
        $data['employees']  = $this->employee_model->getAll();
        $data['content'] = 'report';
        $data['folder']	= 'paid_leave';
        $this->load->view('./layouts/app',$data);   
    }

    public function approve($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->paidleave_model->approve($id)) {
            redirect(site_url('paid_leave'));
        }
    }

    public function reject($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->paidleave_model->reject($id)) {
            redirect(site_url('paid_leave'));
        }
    }

    public function delete($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->paidleave_model->delete($id)) {
            redirect(site_url('paid_leave'));
        }
    }
}
