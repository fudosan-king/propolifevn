<?php
class Admincp_model extends MY_Model {

	function checkLogin($user){
		$this->db->select('*');
		$this->db->where('username', $user);
		$query = $this->db->get('admin_users');
		
		foreach ($query->result() as $row){
			$pass = $row->password;
		}
		
		if(!empty($pass)){
			return $pass;
		}else{
			return false;
		}
	}
		
	public function getGroup($user_id = 0)
	{
		$this->db->select('groups.name,groups.id');
		$this->db->from('admin_group AS groups');
		$this->db->join('admin_user_group AS user_groups','user_groups.group_id = groups.id');
		$this->db->join('admin_users AS users','users.id = user_groups.user_id');
		$this->db->where('users.id',$user_id);
		$this->db->where('groups.status',1);
		$this->db->order_by('groups.name','ASC');
		$query = $this->db->get();
		
		if($query->result())
		{
			return $query->result();
		}else{
			return false;
		}
	}
	//,$group_id = 0 mod_per.group_id = {$group_id} AND
	public function _getChildPer($parent_id = 0,$user_id = 0,$group_id = 0)
	{
		$sql = "select per.name 
		from admin_permission AS per 
		join admin_module_permission AS mod_per ON mod_per.permission_id = per.id
		join admin_modules AS mods ON mods.id = mod_per.module_id 
		join admin_group_module AS group_mod ON group_mod.module_id = mods.id 
		join admin_group AS groups ON groups.id = group_mod.group_id
		join admin_user_group user_group ON user_group.group_id = groups.id
		join admin_users AS user ON user.id = user_group.user_id 
		where per.status = 1 AND mods.id = {$parent_id} AND user.id = {$user_id} AND mod_per.group_id = {$group_id} AND  mod_per.user_id NOT IN ({$user_id})";
		$query = $this->db->query($sql);
		
		if($query->result())
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	function _getChildPerByUser($parent_id,$user_id = 0)
	{
		$this->db->select('per.name');
		$this->db->from('admin_permission AS per');
		$this->db->join("admin_module_permission AS mod_per",'mod_per.permission_id = per.id','LEFT');
		$this->db->join('admin_users AS user','user.id = mod_per.user_id','LEFT');
		$this->db->where('user.id',$user_id);
		$this->db->where('mod_per.module_id',$parent_id);
		$query = $this->db->get();
		$result = $query->result();
		
		if($result)
		{
			return count($result);
		}else{
			return false;
		}
	}
	
	function getModule($user_id = 0)
	{
		$this->db->select("mods.id,mods.name");
		$this->db->from("admin_modules AS mods");
		$this->db->join("admin_group_module AS group_mod","group_mod.module_id = mods.id","LEFT");
		$this->db->join("admin_group AS groups","groups.id = group_mod.group_id","LEFT");
		$this->db->join("admin_user_group AS user_group","user_group.group_id = groups.id","LEFT");
		$this->db->join("admin_users AS user","user.id = user_group.user_id","LEFT");
		$this->db->where("mods.status",1);
		$this->db->where("user.id",$user_id);
		$query = $this->db->get();
		
		if($query->result())
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	function getPermission($user_id = '')
	{
		// Select mod - per
		//$sql ="select per.* from admin_modules ";
		$this->db->select("mods.*");
		$this->db->from("admin_modules AS mods");
		$this->db->join("admin_user_mod AS user_mod","user_mod.mod_id = mods.id","LEFT");
		$this->db->join("admin_users AS user","user.id = user_mod.user_id","LEFT");
		$this->db->where("mods.status",1);
		$this->db->where("user.username",$user_id);
		$query = $this->db->get();
		/*$sql = "select 
		per.*,mods.title from admin_permission AS per 
		join admin_mod_per AS mod_per ON mod_per.per_id = per.id 
		join admin_modules AS mods ON mods.id = mod_per.mod_id 
		join admin_user_mod AS user_mod ON user_mod.mod_id = mods.id 
		join admin_users AS user ON user.id = user_mod.user_id 
		where per.status = 1 AND user.username = '{$user_id}'";*/
			
		//$query = $this->db->query($sql);
		
		if($query->result())
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	function getPerModule($user_id = '')
	{
		/*$sql = "select module.* 
		from admin_modules as module 
		join admin_users as user on user.module = module.id 
		where module.status = 1 AND user.username = '{$user_id}'";*/
		$this->db->select('mods.title');
		$this->db->from("admin_user_mod AS user_mod");		
		$this->db->join('admin_users AS user','user.id = user_mod.user_id','left');
		$this->db->join('admin_modules AS mods','mods.id = user_mod.mod_id','left');
		$this->db->where('user_mod.status',1);
		$this->db->where('user.username',$user_id);
		$query = $this->db->get();
		if($query->result())
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	function getIdUser($user = '')
	{
		$this->db->select('*');
		$this->db->where('username',$user);
		$query = $this->db->get('admin_users');
		$result = $query->result();
		if($result)
		{
			return $result;
		}else{
			return false;
		}
	}
	
	function load_menu()
	{
		$this->db->select('*');
		$this->db->where('is_admin',0);
		$query = $this->db->get('admin_modules');
		if($query->result())
		{
			return $query->result();
		}else{
			return false;
		}
	}
}