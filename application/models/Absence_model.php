<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Absence_model extends CI_Model {
 
    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            ['field' => 'from',
            'label' => 'From',
            'rules' => 'required'],

            ['field' => 'to',
            'label' => 'To',
            'rules' => 'required'],
            
            ['field' => 'employee_id',
            'label' => 'Employee',
            'rules' => 'required'],
        ];
    }
 
    function simpan($data = array())
    {
        $jumlah = count($data);
 
        if ($jumlah > 0)
        {
            $this->db->insert_batch('absence', $data);
        }
    }

    function findByDate($get)
    {
        $sql = "SELECT b.nik, b.name, c.name as position, a.tanggal, a.masuk, a.keluar FROM absence a JOIN employees b ON a.nik = b.nik JOIN position c ON b.position_id = c.id WHERE a.tanggal BETWEEN '".$get['from']."' AND '".$get['to']."' ";

        if ($get['employee_id'] !== "all_employee") {
            $sql .= "AND a.nik = '".$get['employee_id']."'";
        }

        $sql .= " ORDER BY a.tanggal ASC";
        // var_dump($sql);die;
        return $this->db->query($sql)->result();
    }
}
