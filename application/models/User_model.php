<?php

class User_model extends CI_model 
{
    private $_table = "users";
    public $id;
    public $username;
    public $password;
    public $role;

    public function doLogin()
    {
        $post = $this->input->post();
        $this->db->select("*","users.id as id");
        $this->db->join("employees","employees.user_id = users.id");
        $this->db->where('username', $post['username']);
        $user = $this->db->get($this->_table)->row();

        if($user)
        {
            $isPasswordTrue = password_verify($post['password'],$user->password);
            if ($isPasswordTrue)
            {
                
                $session_set_value = $this->session->all_userdata();
                // Check for remember_me data in retrieved session data
                if (isset($session_set_value['remember_me']) && $session_set_value['remember_me'] == "1") {

                    return true;

                } else {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $remember = $this->input->post('remember_me');
                    if ($remember) {
                    
                        // Set remember me value in session
                        $this->session->set_userdata('remember_me', TRUE);
                    }
                    $sess_data = array(
                        'username' => $username,
                        'password' => $password
                    );
                    $this->session->set_userdata('user_logged', $user);
                    $this->_updateLastLogin($user->id);
                    return true;
                }
                $this->session->set_userdata(['user_logged' => $user]);
                return true;
            }
        }
        return false;
    }

    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($id_user)
    {
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE id={$id_user}";
        $this->db->query($sql);
    }


    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required|is_unique[users.username]'],

            ['field' => 'role',
            'label' => 'Role User',
            'rules' => 'required'],
        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->username = $post['username'];
        $this->password = password_hash(123123,PASSWORD_BCRYPT);
        $this->role = $post['role'];
        return $this->db->insert($this->_table,$this);
    }

    public function getId()
    {
        $this->db->select("*");
        $this->db->order_by("id","desc");
        $this->db->from($this->_table);
        return $this->db->get()->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $data = $this->getAll();
        $name = strtolower($post['username']);
        foreach ($data as $key => $value) {
             if ($value->id !== $post['id']) {
                if ($name == strtolower($value->username)) {
                    return false;
                }
             }
        }
        $this->id = $post['id'];
        $user = $this->db->get_where($this->_table, ['id' => $post['user_id']])->row();
        $this->username = $post['username'];
        $this->role = $post['role'];

        $this->password = ($post['password'] == '') ? $user->password : password_hash($post['password'],PASSWORD_BCRYPT);

        return $this->db->update($this->_table, $this, array('id' => $post['user_id']));

    }

    public function delete($id)
    {
        return $this->db->delete($this->_table,array('id' => $id));
    }
}