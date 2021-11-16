<?php

class Paidleave_model extends CI_model 
{
    private $_table = "paid_leave";
    
    public function rules()
    {
        return [
            ['field' => 'nik',
            'label' => 'NIK',
            'rules' => 'required'],
            ['field' => 'from_',
            'label' => 'From',
            'rules' => 'required'],
            ['field' => 'to_',
            'label' => 'To',
            'rules' => 'required'],
            ['field' => 'cause',
            'label' => 'Cause',
            'rules' => 'required'],
        ];
    }

    public function getAll($wherein)
    {
        $this->db->select('*, paid_leave.id as paid_leave_id');
        $this->db->from($this->_table);
        $this->db->join('employees', 'employees.nik = '.$this->_table.'.nik', 'inner');
        $this->db->where_in('type',$wherein);
        return $this->db->get()->result();
    }

    public function getAsEmployee($nik,$whereIn)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('nik', $nik);
        $this->db->where_in('type', $whereIn);
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function get_per_tahun($nik, $tahun, $type)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('nik', $nik);
        $this->db->where('type', $type);
        $this->db->like('from_', $tahun, 'both');
        return $this->db->get()->result();
    }

    public function save($filename)
    {
        $post = $this->input->post();
        $this->nik = $post['nik'];
        $this->from_ = $post['from_'];
        $this->to_ = $post['to_'];
        $this->cause = $post['cause'];
        $this->file = $filename;
        $this->type = $post['type'];
        return $this->db->insert($this->_table, $this);
    }

    public function update($filename)
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nik = $post['nik'];
        $this->from_ = $post['from_'];
        $this->to_ = $post['to_'];
        $this->cause = $post['cause'];
        $this->file = $filename;
        $this->type = $post['type'];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));

    }

    function findByDate($get,$wherein)
    {
        $im = implode(",",$wherein);
        $sql = "SELECT *, p.id as paid_leave_id FROM paid_leave p JOIN employees e ON p.nik = e.nik WHERE p.from_ BETWEEN '".$get['from']."' AND '".$get['to']."' ";

        if ($get['employee_id'] !== "all_employee") {
            $sql .= "AND e.nik = ".$get['employee_id']."";
        }

        $sql .= "AND p.type IN (".$im.")";

        $sql .= " ORDER BY p.from_ ASC";
        // var_dump($sql);die;
        return $this->db->query($sql)->result();
    }

    public function approve($id)
    {
        return $this->db->update($this->_table, ["status" => 1], array('id' => $id));
    }

    public function reject($id)
    {
        return $this->db->update($this->_table, ["status" => 0], array('id' => $id));
    }
    
    public function delete($id)
    {
        return $this->db->delete($this->_table,array('id' => $id));
    }

}