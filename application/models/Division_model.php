<?php

class Division_model extends CI_model 
{
    private $_table = "division";

    public $id;
    public $name;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = $this->getAll();
        $name = strtolower($post['name']);
        foreach ($data as $key => $value) {
            if ($name == strtolower($value->name)) {
                return false;
            }   
        }
        $this->name = $post['name'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = $this->getAll();
        $name = strtolower($post['name']);
        foreach ($data as $key => $value) {
            if ($name == strtolower($value->name)) {
                return false;
            }   
        }
        $this->id = $post['id'];
        $this->name = $post['name'];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));

    }

    public function delete($id)
    {
        return $this->db->delete($this->_table,array('id' => $id));
    }
}