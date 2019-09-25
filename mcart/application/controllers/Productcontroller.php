<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productcontroller extends MY_controller
{
	public function __construct()
	{
		parent::__construct();
	}

	//view all product
	public function index()
	{
		if (isset($_GET['product'])) {
			$categoryid = $_GET['product'];
			$this->Productmodel->setCategoryId($categoryid);
			if ($this->Productmodel->category_find()) {
				$product_category_name['productname'] = $this->Productmodel->category_find();
				// print_r($product_category_name);
				// echo $product_category_name;

				// foreach($product_category_name as $row){
				// 	$data_view['productname'] = $row->product_category;
				// 	$name=$row->product_category;
				// 		// print_r($name);

				// 	// echo $row;

				// }
				$data_header['title'] = "Products ";
				$this->render($data_header, 'porducts/product', $product_category_name);
			}
		} else {
			$categoryid = 'all';
			$this->Productmodel->setCategoryId($categoryid);
			if ($this->Productmodel->category_find()) {
				$product_category_name['productname'] = $this->Productmodel->category_find();
				$data_header['title'] = "Products ";
				$this->render($data_header, 'porducts/product', $product_category_name);
			}
		}
	}
	public function addproduct_category()
	{

		if ($this->session->userdata('user_vh')) {
			$data_header['title'] = "Add Category";
			$data_header['title1'] = "All Category";
			$product_cat['all_cat'] =	$this->Productmodel->all_category();
			$this->render($data_header, 'porducts/addcategory', $product_cat);
		} else {
			$this->session->set_flashdata('error', 'Please Login as Seller');
			redirect(BASEURL . 'login');
		}
	}
	function add_category()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('add_category', '\'Category Name\'', 'trim|required|alpha|max_length[30]');
		// $this->form_validation->set_rules('add_category', 'Category Name', 'trim|required|alpha');
		if ($this->form_validation->run() == FALSE) {
			$this->addproduct_category();
		} else {
			$add_category = $this->input->post('add_category');
			$this->Productmodel->setCategoryName($add_category);
			if ($this->Productmodel->find_category()) {
				$this->session->set_flashdata('error', 'Category Name alredy Exist please try with another category name');
				redirect(BASEURL . 'seller/addcategory');
			} else {

				if ($this->Productmodel->add_category()) {
					$this->session->set_flashdata('success', 'Category Name added  Sucessfuly');
					redirect(BASEURL . 'seller/addcategory');
				} else {
					$this->session->set_flashdata('error', 'Some Error occure please try again later');
					redirect(BASEURL . 'seller/addcategory');
				}
			}
		}
	}

	//product add by seller
	public function addproduct()
	{
		if ($this->session->userdata('user_vh')) {
			$data_header['title'] = "Add Product";
			$data_header['all_product'] = "All Product";
			$data_view['product_category'] = $this->Productmodel->all_category();

			$this->render($data_header, 'porducts/addprodcut', $data_view);
		}
	}
	public function action_addproduct()
	{
		// if ($_POST['add_product']) {
			$this->load->library('form_validation');
			$config['upload_path'] = BASEURL . 'assets/uploads/products';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['file_name'] = $_FILES['product_image']['name'];

			// $this->load->library('upload', $config);
			// $this->upload->initialize($config);

			$this->form_validation->set_rules('product_name', 'Product Name', 'required|alpha');
			$this->form_validation->set_rules('product_price', 'Product Price', 'required|numeric');
			$this->form_validation->set_rules('product_qty', 'Product Quantity', 'required|numeric');
			$this->form_validation->set_rules('product_meta', 'Product Meta', 'required');
			$this->form_validation->set_rules('product_image', 'Product Image', 'callback_image_upload');
			$this->form_validation->set_rules('product_description', 'Product Description', 'required');
			$this->form_validation->set_rules('category_id', 'Category Id', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', 'Please enter Product Details');
				redirect(BASEURL . 'seller/addproduct');
			}else{}
		}

		// else{
		// 	$this->session->set_flashdata('error', 'Please enter prouct details');
		// 	redirect(BASEURL . 'seller/addproduct');

		// }
	// }
	function image_upload(){
		if($_FILES['product_image']['size'] != 0){
		  $upload_dir = BASEURL.'assets/uploads/products';
		//   if (!is_dir($upload_dir)) {
		// 	   mkdir($upload_dir);
		//   }	
		  $config['upload_path']   = $upload_dir;
		  $config['allowed_types'] = 'jpg|png|jpeg';
		  $config['file_name']     = 'product_image'.'_'.substr(md5(rand()),0,7);
		//   $config['overwrite']     = false;
		  $config['max_size']	 = '5120';
  
		  $this->load->library('upload', $config);
		  if (!$this->upload->do_upload('product_image')){
			  $this->form_validation->set_message('image_upload', $this->upload->display_errors());
			  return false;
		  }	
		  else{
			  $this->upload_data['file'] =  $this->upload->data();
			  return true;
		  }	
	  }	
	  else{
		  $this->form_validation->set_message('image_upload', "No file selected");
		  return false;
	  }
  }
}
?>

<!-- assets\uploads\products -->