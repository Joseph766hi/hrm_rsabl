<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    private $_table = "employees";

    public $id;
    public $user_id;
    public $nik;
    public $name;
    public $position_id;
    public $division_id;
    public $religion_id;
    public $gender;
    public $place_of_birth;
    public $date_of_birth;
    public $address;
    public $account_number = null;
    public $bank_id = null;
    public $photo = "default.jpg";

    public function rules()
    {
        return [

            ['field' => 'nik',
            'label' => 'NIK',
            'rules' => 'required|is_unique[employees.nik]'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required|is_unique[employees.email]'],

            ['field' => 'no_telp',
            'label' => 'No HP',
            'rules' => 'required|is_unique[employees.no_telp]'],

            ['field' => 'account_number',
            'label' => 'Account Number',
            'rules' => 'required|is_unique[employees.account_number]'],

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
    }

    public function getAll()
    {
        $this->db->select("*, users.id as id, employees.name as employee, position.name as position,division.name as division,religion.name as religion,employees.id as employee_id, bank.name as bank");
        $this->db->join("position","position.id = employees.position_id");
        $this->db->join("users","users.id = employees.user_id");
        $this->db->join("division","division.id = employees.division_id");
        $this->db->join("religion","religion.id = employees.religion_id");
        $this->db->join("bank","bank.id = employees.bank_id");
        $this->db->order_by("employees.nik");
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        $this->db->select("*, users.id as id, employees.name as employee, position.name as position,division.name as division,religion.name as religion,employees.id as employee_id, bank.name as bank");
        $this->db->join("position","position.id = employees.position_id");
        $this->db->join("users","users.id = employees.user_id");
        $this->db->join("division","division.id = employees.division_id", 'left');
        $this->db->join("religion","religion.id = employees.religion_id", 'left');
        $this->db->join("bank","bank.id = employees.bank_id", 'left');
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function getByNik($nik)
    {
        $this->db->select("*, users.id as id, employees.name as employee, position.name as position,division.name as division,religion.name as religion,employees.id as employee_id, bank.name as bank");
        $this->db->join("position","position.id = employees.position_id");
        $this->db->join("users","users.id = employees.user_id");
        $this->db->join("division","division.id = employees.division_id");
        $this->db->join("religion","religion.id = employees.religion_id");
        $this->db->join("bank","bank.id = employees.bank_id");
        return $this->db->get_where($this->_table, ["nik" => $nik])->row();
    }

    public function getByUserId($id)
    {
        $this->db->select("*, users.id as id, employees.name as employee, position.name as position,division.name as division,religion.name as religion,employees.id as employee_id, bank.name as bank");
        $this->db->join("position","position.id = employees.position_id");
        $this->db->join("users","users.id = employees.user_id");
        $this->db->join("division","division.id = employees.division_id");
        $this->db->join("religion","religion.id = employees.religion_id");
        $this->db->join("bank","bank.id = employees.bank_id");
        return $this->db->get_where($this->_table, ["employees.id" => $id])->row();
    }

    public function save($id)
    {
        $post = $this->input->post();
        $this->user_id = $id;
        $this->nik = $post["nik"];
        $this->name = $post["name"];
        $this->email = $post["email"];
        $this->no_telp = $post["no_telp"];
        $this->position_id = $post["position_id"];
        $this->division_id = $post["division_id"];
        $this->religion_id = $post["religion_id"];
        $this->gender = $post["gender"];
        $this->place_of_birth = $post["place_of_birth"];
        $this->date_of_birth = $post["date_of_birth"];
        $this->address = $post["address"];
        $this->tanggal_bergabung = $post["tanggal_bergabung"];
        $this->account_number = $post["account_number"];
        $this->bank_id = $post["bank_name"];
        
        return $this->db->insert($this->_table, $this);
    }
    public function update($id)
    {
        $post = $this->input->post();

        $data = $this->getAll();
        $err = array();
        // $name = strtolower($post['username']);
        foreach ($data as $key => $value) {
             if ($value->id !== $id) {
                if ($post['nik'] == $value->nik) {
                    $err['nik'] = "NIK already exists";
                }
                if ($post['email'] == $value->email) {
                    $err['email'] = "email already exists";
                }
                if ($post['no_telp'] == $value->no_telp) {
                    $err['no_telp'] = "No Telp already exists";
                }
                if ($post['account_number'] == $value->account_number) {
                    $err['account_number'] = "Account Number already exists";
                }
             }
        }
        if (count($err) > 0){
            $msg = ['st' => 400, 'ar'=> $err];
            return $msg;
        }
        $this->id = $post["employee_id"];
        $this->user_id = $id;
        $this->nik = $post["nik"];
        $this->name = $post["name"];
        $this->email = $post["email"];
        $this->no_telp = $post["no_telp"];
        $this->position_id = $post["position_id"];
        $this->division_id = $post["division_id"];
        $this->religion_id = $post["religion_id"];
        $this->gender = $post["gender"];
        $this->place_of_birth = $post["place_of_birth"];
        $this->date_of_birth = $post["date_of_birth"];
        $this->address = $post["address"];
        $this->tanggal_bergabung = $post["tanggal_bergabung"];
        $this->account_number = $post["account_number"];
        $this->bank_id = $post["bank_name"];

        $this->db->update($this->_table, $this, array('user_id' => $id));
        $msg = ['st' => 200, 'ar'=> $err];
        return $msg;
    }

    public function delete($id)
    {
        $this->db->delete("users",array("id" => $id));
        return $this->db->delete($this->_table, array("user_id" => $id));
    }

    public function updateProfile($id,$filename = null)
    {
        $post = $this->input->post();
        $data = $this->getAll();
        $err = array();
        // $name = strtolower($post['username']);
        foreach ($data as $key => $value) {
             if ($value->id !== $id) {
                if ($post['nik'] == $value->nik) {
                    $err['nik'] = "NIK already exists";
                }
                if ($post['email'] == $value->email) {
                    $err['email'] = "email already exists";
                }
                if ($post['no_telp'] == $value->no_telp) {
                    $err['no_telp'] = "No Telp already exists";
                }
                if ($post['account_number'] == $value->account_number) {
                    $err['account_number'] = "Account Number already exists";
                }
             }
        }
        if (count($err) > 0){
            $msg = ['st' => 400, 'ar'=> $err];
            return $msg;
        }
        if ($filename !== null) {
            $data = [
                'name'              => $post['name'],
                'religion_id'       => $post['religion_id'],
                'gender'            => $post['gender'],
                'place_of_birth'    => $post['place_of_birth'],
                'date_of_birth'     => $post['date_of_birth'],
                'address'           => $post['address'],
                'account_number'    => $post['account_number'],
                'bank_id'         => $post['bank_name'],
                'email'     => $post['email'],
                'no_telp'     => $post['no_telp'],
                'tanggal_bergabung'     => $post['tanggal_bergabung'],
                'photo'             => $filename
            ];
        }else {
            $data = [
                'name'              => $post['name'],
                'religion_id'       => $post['religion_id'],
                'gender'            => $post['gender'],
                'place_of_birth'    => $post['place_of_birth'],
                'date_of_birth'     => $post['date_of_birth'],
                'address'           => $post['address'],
                'account_number'    => $post['account_number'],
                'bank_id'         => $post['bank_name'],
                'email'     => $post['email'],
                'no_telp'     => $post['no_telp'],
                'tanggal_bergabung'     => $post['tanggal_bergabung']
            ];
        }

        $this->db->update($this->_table, $data, array('user_id' => $id));
        $msg = ['st' => 200, 'ar'=> $err];
        return $msg;
    }

    public function getAllNotInMe($id)
    {
        $sql = "SELECT a.user_id, a.nik, a.id, b.name as position, a.name, a.photo FROM employees a JOIN position b ON a.position_id = b.id WHERE a.id != ".$id."
         ORDER BY a.name";
        return $this->db->query($sql)->result();
        // var_dump($this->db);die;
        // return $this->db->get_where($this->_table,['employees.id','!=',$id])->result();
    }
}