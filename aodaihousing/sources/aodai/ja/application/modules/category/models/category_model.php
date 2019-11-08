<?php
class Category_model extends MY_Model {
	private $table = 'category';
	private $table_building = 'building';
	
	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
		$this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));
        $this->db->order_by("id",'desc');
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('`name` LIKE "%'.$this->input->post('content').'%"');
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
			$this->db->where('`name` LIKE "%'.$this->input->post('content').'%"');
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
	function getDetailBuilding($cateid){
		$this->db->select('*');
		$this->db->where('cate_id',$cateid);
		$query = $this->db->get(PREFIX.$this->table_building);
		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	function getAreas($type = 0) {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('type', $type);
        $this->db->or_where('type', 0);
        $query = $this->db->get(PREFIX . $this->table_areas);

        if ($query->result()) {

            return $query->result();
        } else {
            return false;
        }
    }
	
	function saveManagement($fileName=''){
		if($this->input->post('statusAdmincp')=='on'){
			$status = 1;
		}else{
			$status = 0;
		}
		
		if($this->input->post('show_topAdmincp')=='on'){
			$show_top = 1;
		}else{
			$show_top = 0;
		}
		if($this->input->post('popularAdmincp')=='on'){
			$popular = 1;
		}else{
			$popular = 0;
		}
		if($this->input->post('houseExAdmincp')=='on'){
			$house_ex = 1;
		}else{
			$house_ex = 0;
		}
		if($this->input->post('nearBusAdmincp')=='on'){
			$near_bus = 1;
		}else{
			$near_bus = 0;
		}
		
		if($this->input->post('hiddenIdAdmincp')==0){
			$data = array(
				'name'=> json_encode($this->input->post('nameAdmincp')),
                'order'=> $this->input->post('order'),
				'status'=> $status,
				'show_top'=> $show_top,
				'created'=> date('Y-m-d H:i:s',time()),
				'modified'=> date('Y-m-d H:i:s',time()),
                'type'		=> $this->input->post('type'),
                'type_p'		=> $this->input->post('type_p')
			);
			// $dataBuilding = array(
			// 	'name' => json_encode($this->input->post('buildingNameAdmincp')),
			// 	'feature_popular' =>  $popular,
			// 	'feature_house_ex' => $house_ex,
			// 	'feature_near_bus' => $near_bus,
			// 	'building_type' => $this->input->post('buildingType'),
			// 	'district' => $this->input->post('district')
			// );
			if($this->db->insert(PREFIX.$this->table,$data)){
				return true;
			}
		}else{
			// $result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));
			$resultBuilding = $this->getDetailBuilding($this->input->post('hiddenIdAdmincp'));
			$data = array(
				'name'=> json_encode($this->input->post('nameAdmincp')),
				'status'=> $status,
				'show_top'=> $show_top,
				'modified'=> date('Y-m-d H:i:s',time()),
                'type'		=> $this->input->post('type'),
                'type_p'		=> $this->input->post('type_p'),
                'order'=> $this->input->post('order')
			);
			// $dataBuilding = array(
			// 	'name' => json_encode($this->input->post('buildingNameAdmincp')),
			// 	'feature_popular' =>  $popular,
			// 	'feature_house_ex' => $house_ex,
			// 	'feature_near_bus' => $near_bus,
			// 	'building_type' => $this->input->post('buildingType'),
			// 	'district' => $this->input->post('district'),
			// 	'description' => $this->input->post('description')
			// 	);

   //          if ($fileName['images'] == '') {
   //              $fileName['images'] = $resultBuilding[0]->image;
   //          } else {
   //              @unlink(BASEFOLDER . 'static/uploads/category/' . $resultBuilding[0]->image);
   //          }
   //          $dataBuilding['image'] = $fileName['images'];

			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if($this->db->update(PREFIX.$this->table,$data)){
				// $this->db->where('cateid',$this->input->post('hiddenIdAdmincp'));
				// $this->db->update(PREFIX.$this->table_building,$dataBuilding);
				return true;
			}
		}
		return false;
	}

	function hideCatDetail($cat_id = 0)
	{
	   return true;
		
	}
}