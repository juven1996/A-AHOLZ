<?php
class Order_model extends CI_Model {
 
    
    public function __Order_modelconstruct()
    {
        $this->load->database();
    }

    
    public function get_manufacture_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('order');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }    

    
    public function get_order($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('*');
		$this->db->from('order');

		if($search_string){
			$this->db->like('name', $search_string);
		}
		$this->db->group_by('id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }
        
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    
    function count_order($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('order');
		if($search_string){
			$this->db->like('name', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    
    function store_manufacture($data)
    {
		$insert = $this->db->insert('order', $data);
	    return $insert;
	}

    
    function update_manufacture($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('order', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    
	function delete_manufacture($id){
		$this->db->where('id', $id);
		$this->db->delete('order'); 
	}
 
}
?>	
