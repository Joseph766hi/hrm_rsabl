<?php

class Vacancies_model extends CI_model 
{
    private $_table = "vacancies";

    public $id;
    public $title;
    public $description;

    
    public function rules()
    {
        return [
            ['field' => 'title',
            'label' => 'Title',
            'rules' => 'required'],
            
            ['field' => 'position_id',
            'label' => 'Position',
            'rules' => 'required'],

            ['field' => 'description',
            'label' => 'Desciption',
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
        $this->title = $post['title'];
        $this->position_id = $post['position_id'];
        $this->description = $post['description'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->title = $post['title'];
        $this->position_id = $post['position_id'];
        $this->description = $post['description'];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));

    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}