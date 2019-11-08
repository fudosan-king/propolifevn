<?php
class Customer_comment_model extends MY_Model {
    private $table = 'customer_comment';

    function getsearchContent($limit,$page){
        $this->db->select('*');
        $this->db->limit($limit,$page);
        $this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
        if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
            $this->db->where('`title` LIKE "%'.$this->input->post('content').'%"');
        }
        if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')==''){
            $this->db->where('created >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
        }
        if($this->input->post('dateFrom')=='' && $this->input->post('dateTo')!=''){
            $this->db->where('created <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
        }
        if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')!=''){
            $this->db->where('created >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
            $this->db->where('created <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
        }
        $query = $this->db->get(PREFIX.$this->table);

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }

    function getTotalsearchContent(){
        $this->db->select('*');
        if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
            $this->db->where('`title` LIKE "%'.$this->input->post('content').'%"');
        }
        if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')==''){
            $this->db->where('created >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
        }
        if($this->input->post('dateFrom')=='' && $this->input->post('dateTo')!=''){
            $this->db->where('created <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
        }
        if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')!=''){
            $this->db->where('created >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
            $this->db->where('created <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
        }
        $query = $this->db->get(PREFIX.$this->table);

        if($query->result()){
            return count($query->result());
        }else{
            return false;
        }
    }

    function getDetailManagement($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $query = $this->db->get(PREFIX.$this->table);

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }

    function saveManagement(){
        if($this->input->post('statusAdmincp')=='on'){
            $status = 1;
        }else{
            $status = 0;
        }



        if($this->input->post('hiddenIdAdmincp')==0){
            $data = array(
                'title'=> $this->input->post('titleAdmincp'),
                'status'=> $status,
                'created'=> date('Y-m-d H:i:s',time()),
                'updated'=> date('Y-m-d H:i:s',time()),
                'description' => $this->input->post('description'),
                'order' => $this->input->post('order'),
            );
            if($this->db->insert(PREFIX.$this->table,$data)){
                return true;
            }
        }else{
            $result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));

            $data = array(
                'title'=> $this->input->post('titleAdmincp'),
                'status'=> $status,
                'updated'=> date('Y-m-d H:i:s',time()),
                'description' => $this->input->post('description'),
                'order' => $this->input->post('order'),
            );
            $this->db->where('id',$this->input->post('hiddenIdAdmincp'));
            if($this->db->update(PREFIX.$this->table,$data)){
                return true;
            }
        }
        return false;
    }

    function getCustomerComment(){
        $this->db->select('*');
        $this->db->where('status',1);
        $this->db->order_by('order','asc');
        $query = $this->db->get(PREFIX.$this->table);

        if($query->result()){
            return $query->result();
        }else{
            return array();
        }
    }


}