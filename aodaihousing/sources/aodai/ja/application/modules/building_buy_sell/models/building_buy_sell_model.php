<?php

class Building_buy_sell_model extends MY_Model {

	private $table = 'cli_building_buy_sell';
    private $path_folder_image = 'static/uploads/building_buy_sell';

	/**
	 * Check exists data
	 */
	public function checkExistsData($data = array()) {
		if ($data) {
			$this->db->select('*');
			$data['status'] = 1;
	        $this->db->where($data);
	        $this->db->limit(1);
	        $this->db->order_by('created', 'desc');
	        $query = $this->db->get($this->table);

	        if ($query->result()) {
	        	$response = $query->result();
	            return isset($response[0]->id) ? $response[0]->id : false;
	        }
       	}
        return false;
	}

    function getsearchContent($limit, $page) {
		$this->db->select('*');
		$this->db->limit($limit, $page);
		$this->db->order_by($this->input->post('func_order_by'), $this->input->post('order_by'));
        $this->db->order_by("modified", 'desc');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $content = json_encode($this->input->post('content'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);

            $this->db->where('(
                `title` LIKE "%' . $content . '%" OR
                description LIKE "%' . $content . '%" OR
                title_description_more LIKE "%' . $content . '%" OR
                description_more LIKE "%' . $content . '%" OR
                id LIKE "%' . $content . '%"
            )');
        }

        // search with key word title
        if ($this->input->post('title') != '') {
            $content = json_encode($this->input->post('title'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $content = $this->removeCommaAndDot($content);
            $this->db->where('(REPLACE (title, ",", " ") LIKE "%' . $content . '%" )');
        }

        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') == '') {
            $this->db->where('modified >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('modified <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('modified >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('modified <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }

		$query = $this->db->get($this->table);

		if ($query->result()) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	function getTotalsearchContent(){
		$this->db->select('*');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $content = json_encode($this->input->post('content'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $this->db->where('(
                `title` LIKE "%' . $content . '%" OR
                description LIKE "%' . $content . '%" OR
                title_description_more LIKE "%' . $content . '%" OR
                description_more LIKE "%' . $content . '%" OR
                id LIKE "%' . $content . '%"
            )');
        }

        // search with key word title
        if ($this->input->post('title') != '') {
            $content = json_encode($this->input->post('title'));
            $content = str_replace('"', '', $content);
            $content = str_replace('\\', '%\\\\\\\\%', $content);
            $content = $this->removeCommaAndDot($content);
            $this->db->where('(REPLACE (title, ",", " ") LIKE "%' . $content . '%")');
        }

        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') == '') {
            $this->db->where('modified >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('modified <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('modified >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('modified <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
		
		$query = $this->db->get($this->table);

		if ($query->result()) {
			return count($query->result());
		} else {
			return false;
		}
	}

    /**
     * Get data by condition
     */
    public function getDataByCondition($per_page = 2, $cur_page = 0, $condition = array()) {
        $condition_origin = array('status' => 1);
        $condition = array_merge($condition, $condition_origin);
        $data = array();
        if ($condition) {
            $this->db->distinct();
            $this->db->select('id, title, image, description, title_description_more, description_more, order, status, created, modified, deleted');
            $this->db->where($condition);
            $this->db->order_by('order','asc');
            $this->db->order_by('modified', 'desc');
            $this->db->limit($per_page, $cur_page);
            $query = $this->db->get($this->table);

            if ($query->result()) {
                $data = $query->result();
            }
        }
        return $data;
    }

    /**
     * Total data by condition
     */
    public function getCountData($condition = array()){
        $condition_origin = array('status' => 1);
        $condition = array_merge($condition, $condition_origin);
        $data = array();
        if ($condition) {
            $this->db->select('count(id) as count');
            $this->db->where($condition);
            $data = $this->db->count_all_results($this->table);
        }
        return $data;
    }

    function getDetailManagement($id) {
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);

		if ($query->result()) {
			$result = $query->result();
            if (!empty($result[0])) {
                return $result[0];
            }
		} else {
			return array();
		}
	}

	/**
	 * Delete by id
	 */
	public function deleteById($id) {
        $data = $this->getDetailManagement($id);
        if (!empty($data->image)) {
            @unlink(BASEFOLDER . $this->path_folder_image . '/' . $data->image);
        }
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	function saveManagement($fileName='') {
		if ($this->input->post('statusAdmincp')=='on') {
			$status = 1;
		} else {
			$status = 0;
		}

        $title = json_encode($this->input->post('buildingTitleAdmincp'));
        $description = json_encode($this->input->post('descriptionAdmincp'));
        $title_description_more = json_encode($this->input->post('buildingTitleMoreAdmincp'));
        $description_more = json_encode($this->input->post('descriptionMoreAdmincp'));
        $order = $this->input->post('order');
        $id = $this->input->post('hiddenIdAdmincp');

		if ($id == 0) {
			$data = array(
                'image'                  => $fileName['images'],
                'title'                  => $title,
                'order'                  => $order,
                'description'            => $description,
                'title_description_more' => $title_description_more,
                'description_more'       => $description_more,
                'status'                 => $status,
                'created'                => current_date_time(),
                'modified'               => current_date_time(),
			);
			
            if ($this->db->insert($this->table, $data)) {
				return true;
			}
		} else {
			$result = $this->getDetailManagement($id);
			$data   = array(
                'title'                  => $title,
                'order'                  => $order,
                'description'            => $description,
                'title_description_more' => $title_description_more,
                'description_more'       => $description_more,
                'modified'               => current_date_time(),
                'status'                 => $status,
            );

            if ($fileName['images'] == '') {
                $fileName['images'] = $result->image;
            } else {
                @unlink(BASEFOLDER . $this->path_folder_image . '/' . $result->image);
            }
            
            $data['image'] = $fileName['images'];
			$this->db->where('id', $id);
			if ($this->db->update($this->table, $data)) {
				return true;
			}
		}
		return false;
	}

    function hideCatDetail($cat_id = 0) {
        return true;
    }
}
