<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Productmodel extends CI_Model{
    private $_category_id;
    private $_categoryName;
    function setCategoryId($categoryid){
	
		$this->_category_id= $categoryid;
    }
    
    function category_find(){
        if($this->_category_id != 'all'){
		$this->db->from('product_category');
		$this->db->select('product_category');
		$this->db->where('product_id_category', $this->_category_id);
		$category_query = $this->db->get();
        return $category_query->result(); 
        }else{
            $this->db->from('product_category');
            $this->db->select('product_category');
            $category_query = $this->db->get();
            return $category_query->result(); 
        }
    }
    
    function all_category()
	{
		$this->db->from('product_category');
		$this->db->select('product_category, product_id_category');
		
		$product_category_query = $this->db->get();
		return $product_category_query->result();
	}
	//add category
	
	
	
	function setCategoryName($category_name){
		$this->_categoryName= $category_name;
		$this->_category_id= md5($category_name);
	}
	function add_category(){
		
		$data_arr = array(
			'product_category'=> $this->_categoryName,
			'product_id_category'=> $this->_category_id,
		
		);
		$register_query = $this->db->insert('product_category', $data_arr);
		return $register_query;

	}
	//add category 3
	//find category
	function find_category(){
		$this->db->from('product_category');
		$this->db->select('product_category');
		$this->db->where('product_category', $this->_categoryName);
		$category_query = $this->db->get();
				if($category_query->result()){
					return true;
				}else{
					return false;
				}
	}
  //find category end
}
?>