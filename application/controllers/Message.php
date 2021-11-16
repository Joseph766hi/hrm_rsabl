<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        $this->load->model('employee_model');
        $this->load->model('message_model');  
		if($this->user_model->isNotLogin()) redirect(site_url('login'));
	}

	public function index()
	{
        $id = $this->session->userdata('user_logged')->id;
        $data['id'] = $id;
        $data['employee'] = $this->employee_model->getAllNotInMe($id);
        // var_dump($data['employee']);die;
		$data['content'] = 'index';
		$data['folder']	= 'message';
		$this->load->view('./layouts/app',$data);

	}

    public function showMessage($reciever)
    {
        $sender = $this->session->userdata('user_logged')->id;
        $getUser = $this->employee_model->getByUserId($reciever);
        $message = $this->message_model->getMessage($sender,$reciever);

        if ($message->num_rows() > 0) {
            $getMessage = $message->result();
            $data = [
                'user' => $getUser,
                'message' => $getMessage,
                'status'    => 200
            ];
        }else {
            $data = [
                'user' => $getUser,
                'message' => 'Tidak ada percakapan',
                'status'    => 400
            ];
        }
        // var_dump($data);die;
        echo json_encode($data);
    }

    public function sendMessage()
    {
        $post = $this->input->post();
        $post['datetime'] = date('Y-m-d H:i:s');
        
        $config['upload_path'] = './upload/attachment'; //siapkan path untuk upload file
        $config['allowed_types']    = 'png|jpg|jpeg|zip|rar|xlsx|pdf|docx'; //siapkan format file
        $config['file_name']        =  time(); //rename file yang diupload

		$this->load->library('upload', $config);
        // $this->upload->initialize($config);
 
        if ($this->upload->do_upload('attachment')) {
            //fetch data upload
            $file   = $this->upload->data();
            // $result['file'] = $file;
        } 
		// else {
        //     $result['response'] = 'failed';
        //     $result['message'] = strip_tags($this->upload->display_errors());
        //     $result['code'] = 500;
        //     header ( 'Content-Type: application/json;charset=utf-8' );
        //     echo json_encode ($result);
        //     die;
        // }
        // $this->load->library('upload', $config);
        $this->load->library('upload');
        $this->upload->initialize($config);

        if(isset($file)) {
            $input_data = array(
                "sender" => $post["sender"],
                "reciever" => $post["reciever"],
                "message" => $post["message"],
                "filename" => $file["raw_name"],
                "ext" => $file["file_ext"],
                "datetime" => $post["datetime"]
            );
        } else {
            $input_data = $post;
        }
        $this->db->insert("message" , $input_data);
        
		$result['response'] = 'success';
		$result['code'] = 200;
		header ( 'Content-Type: application/json;charset=utf-8' );
        echo json_encode ($result);
    }
}
