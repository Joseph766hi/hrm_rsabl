<?php

class General_model extends CI_Model {

	function __construct() {
        parent::__construct();        
    }
	function generatePesan($pesan, $type) {
        if ($type == "success") {
            $str = '<div class="alert alert-success alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>'.$pesan.'</strong></div>';
        } elseif($type=="error") {
            $str = '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>'.$pesan.'</strong></div>';
        }else{
            $str = '<div class="alert alert-warning alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>'.$pesan.'</strong></div>';
        }
        
        $this->session->set_flashdata('message',$str);

		return $str;
    }	

    public function upload_file($filename){ 
        $this->load->library('upload'); 
        $config['upload_path'] = './excel/';    
        $config['allowed_types'] = 'xlsx';    
        $config['max_size']  = '2048';    
        $config['overwrite'] = true;    
        $config['file_name'] = $filename;         
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
            return $return;   
        }else{
             $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      
             return $return;    
        }
    }

    public function insert_multiple($data){    
        $this->db->insert_batch('siswa', $data);  
    }
}
