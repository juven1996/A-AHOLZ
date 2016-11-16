<?php
class Products_model extends CI_Model {
 
    
    public function __construct()
    {
        $this->load->database();
    }

    
    public function get_product_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    
    public function get_products($manufacture_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end)
    {
	    
		$this->db->select('products.id');
		$this->db->select('products.description');
		$this->db->select('products.stock');
		$this->db->select('products.cost_price');
		$this->db->select('products.sell_price');
		$this->db->select('products.manufacture_id');
		$this->db->select('manufacturers.name as manufacture_name');
		$this->db->from('products');
		if($manufacture_id != null && $manufacture_id != 0){
			$this->db->where('manufacture_id', $manufacture_id);
		}
		if($search_string){
			$this->db->like('description', $search_string);
		}

		$this->db->join('manufacturers', 'products.manufacture_id = manufacturers.id', 'left');

		$this->db->group_by('products.id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}


		$this->db->limit($limit_start, $limit_end);
		//$this->db->limit('4', '4');


		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    
    function count_products($manufacture_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('products');
		if($manufacture_id != null && $manufacture_id != 0){
			$this->db->where('manufacture_id', $manufacture_id);
		}
		if($search_string){
			$this->db->like('description', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    
    function store_product($data)
    {
		$insert = $this->db->insert('products', $data);
	    return $insert;
	}

    
    function update_product($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('products', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    
	function delete_product($id){
		$this->db->where('id', $id);
		$this->db->delete('products'); 
	}
 
}
?>	
