<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_model extends CI_Model
{
    private $_table = "salary";

    public $id;
    public $employee_id;
    public $salary;
    public $allowance;
    public $overtime;
    public $total;
    public $month;
    public $year;

    
    public function rules()
    {
        return [
            ['field' => 'employee_id',
            'label' => 'Karyawan',
            'rules' => 'required'],

            ['field' => 'salary',
            'label' => 'Gaji',
            'rules' => 'required'],

            ['field' => 'allowance',
            'label' => 'Tunjangan',
            'rules' => 'required'],

            ['field' => 'overtime',
            'label' => 'Lembur',
            'rules' => 'required'],

            ['field' => 'month',
            'label' => 'Bulan',
            'rules' => 'required'],

            // ['field' => 'year',
            // 'label' => 'Tahun',
            // 'rules' => 'required'],
        ];
    }
    function simpan($data = array())
    {
        $jumlah = count($data);
 
        if ($jumlah > 0)
        {
            $this->db->insert_batch('salary', $data);
        }
    }

    public function getAll()
    {
        $this->db->select('*, salary.id as id');
        $this->db->join('employees','employees.id = salary.employee_id');
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        $this->db->select('*, salary.id as id, position.name as position, employees.name as nama');
        $this->db->join('employees','employees.id = salary.employee_id');
        $this->db->join('position','position.id = employees.position_id');
        return $this->db->get_where($this->_table, ['salary.id' => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $check = $this->db->query("SELECT * FROM salary WHERE employee_id = '".$post['employee_id']."' AND month = '".$post['month']."' AND year = '".$post['year']."' ")->row();
        if ($check) {
            return false;
        }
        // var_dump($post["year"]);die;
        $this->employee_id = $post["employee_id"];
        $this->salary = $post["salary"];
        $this->allowance = $post["allowance"];
        $this->overtime = $post["overtime"];
        $this->total =  $post["salary"] + $post["allowance"] + $post["overtime"];
        $this->month = $post["month"];
        $this->year = $post["year"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->employee_id = $post["employee_id"];
        $this->salary = $post["salary"];
        $this->allowance = $post["allowance"];
        $this->overtime = $post["overtime"];
        $this->total =  $post["salary"] + $post["allowance"] + $post["overtime"];
        $this->month = $post["month"];
        $this->year = $post["year"];

        return $this->db->update($this->_table, $this, ['id' => $post["id"]]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

    function findByDate($get)
    {
        $sql = "SELECT a.id, b.nik, b.name, a.month, a.year, a.total FROM salary a JOIN employees b ON a.employee_id = b.id WHERE a.month = '".$get["month"]."' AND a.year = '".$get["year"]."' ";

        if ($get['employee_id'] !== "all_employee") {
            $sql .= "AND a.employee_id = ".$get['employee_id']."";
        }

        $sql .= "ORDER BY a.month ASC";
        // var_dump($sql);die;
        return $this->db->query($sql)->result();
    }
}