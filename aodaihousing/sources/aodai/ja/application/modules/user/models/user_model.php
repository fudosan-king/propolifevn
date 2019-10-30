<?php
class User_model extends MY_Model {

    private $table = 'admin_users';
    private $module = 'user';

    function getsearchContent($limit, $page) {
        $this->db->select('*');
        $this->db->limit($limit, $page);
        $content = $this->input->post('content');
        $this->db->order_by($this->input->post('func_order_by'), $this->input->post('order_by'));
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $this->db->where("(`email` LIKE '%$content%' OR `fullname` LIKE '%$content%')");
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') == '') {
            $this->db->where('created >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('created <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('created >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('created <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        $query = $this->db->get($this->table);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getTotalsearchContent() {
        $this->db->select('*');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $$this->db->where("(`email` LIKE '%$content%' OR `fullname` LIKE '%$content%')");
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') == '') {
            $this->db->where('created >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('created <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('created >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('created <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        $query = $this->db->get($this->table);

        if ($query->result()) {
            return $this->db->count_all_results();
        } else {
            return false;
        }
    }

    function getDetailManagement($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function saveManagement($fileName = '') {
        if ($this->input->post('statusAdmincp') == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }

        if ($this->input->post('hiddenIdAdmincp') == 0) {
            $data = array(
                'password' => md5($this->input->post('vs_password')),
                'email' => $this->input->post('vs_email'),
                'fullname' => $this->input->post('vs_fullname'),
                'username' => $this->input->post('vcp_username'),
                'type' => $this->input->post('type'),
                'status' => $status,
                'created' => date('Y-m-d H:i:s', time()),
            );
            if ($this->db->insert($this->table, $data)) {
                return true;
            }
        } else {
            $data = array(
                'email' => $this->input->post('vs_email'),
                'fullname' => $this->input->post('vs_fullname'),
                'username' => $this->input->post('vcp_username'),
                'type' => $this->input->post('type'),
                'status' => $status,
                'date_modified' => date('Y-m-d H:i:s', time())
            );
            $pass = $this->input->post('vs_password');
            if ($pass != '') {
                $data['password'] = md5($pass);
            }
            $this->db->where('id', $this->input->post('hiddenIdAdmincp'));
            if ($this->db->update($this->table, $data)) {
                return true;
            }
        }
        return false;
    }

    function user_checklogin($email, $password) {
        $this->db->select('id');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function user_getInfoByEmail($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get($this->table);
        if ($query->num_rows() >= 1) {
            return false;
        } else {
            return true;
        }
    }

    function user_getActivecodeByEmail($email) {
        $this->db->select('activate_code');
        $this->db->where('email', $email);

        $query = $this->db->get($this->table);
        foreach ($query->result() as $row) {
            return $row->activate_code;
        }
    }

    function user_register() {
        $data = array(
            'email' => trim($this->input->post('email')),
            'password' => md5($this->input->post('password')),
            'fullname' => trim($this->input->post('fullname')),
            'phone' => $this->input->post('phone'),
            'created' => date('Y-m-d H:i:s', time()),
            'status' => 1
        );
        
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
        }
        return false;
    }

    function user_update() {
        $password = $this->input->post('password');
        if ($password && $password !='jvit') {
            $data['password'] = md5($this->input->post('password'));
        }
        $data['fullname'] = trim($this->input->post('fullname'));
        $data['phone'] = $this->input->post('phone');
        //$data['date_modified'] = date('Y-m-d H:i:s', time());
        $userdata = $this->session->userdata('userdata');
        $this->db->where('id', $userdata->id);
        if ($this->db->update($this->table, $data)) {
            return true;
        }
        return false;
    }

    function user_forgetPassword($email, $password) {
        $data = array(
            'password' => $password
        );

        $this->db->where('email', trim($email));
        if ($this->db->update($this->table, $data)) {
            return true;
        }
        return false;
    }

    


    function user_getInfo($email, $password) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->row();
        }
        return false;
    }
    function user_getProfile($email) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->row();
        }
        return false;
    }
    function user_getInfoById($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->row();
        }
        return false;
    }
    
    function getGuestInfo() {
        $this->db->select('m.id,m.first_name,m.last_name,m.last_name,m.guid,m.title,m.login_token,m.email');
        $this->db->from('dom_members AS m');
        $this->db->where('m.id', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{
            return false;
        }
    }

    function getUserAdd($userId) {
        $this->db->select('*');
        $this->db->where('member_id', $userId);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('dom_members_addresses');
        $result = $query->result();
        if ($result) {
            return $result;
        }
        return false;
    }



}

?>