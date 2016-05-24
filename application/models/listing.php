<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Model {

	function get_active_listings_by_seller_id($id) {
		$query = 'SELECT items.id, items.name, items.description, items.price, images.link FROM items JOIN images ON items.image_id = images.id WHERE seller_id = ? AND active_status = "Active"';
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}

	function get_inactive_listings_by_seller_id($id) {
		$query = 'SELECT items.id, items.name, items.description, items.price, images.link FROM items JOIN images  ON images.id = items.image_id WHERE seller_id = ? AND active_status = "inactive"';
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}

	function inactivate_listing($id){
		$query = "UPDATE items SET active_status='inactive' WHERE id={$id};";

		$this->db->query($query);
	}

	public function search_results()
	{
		$query = "SELECT id, name, description FROM categories";

		return $this->db->query($query)->result_array();
	}

	public function search($category)
	{
		$query = "SELECT categories.name as category_name , items.id , items.name as item_name, items.description, items.price, images.link 
			FROM items
			JOIN categories
			ON items.categories_id = categories.id
			JOIN images
			ON items.image_id = images.id
			WHERE categories.name LIKE ? AND items.active_status = 'active'";
		$category = '%' . $category . '%';
		return $this->db->query($query, $category)->result_array();
	}


	public function category_values($id)
	{
		$query = "SELECT items.id, items.name, items.description, items.price, brands.name AS brand_name, users.email FROM items JOIN users ON items.seller_id = users.id JOIN items_has_brands ON items_has_brands.items_id = items.id JOIN brands ON brands.id = items_has_brands.brands_id WHERE items.categories_id = {$id}";
		return $this->db->query($query)->result_array();
	}

	public function create_item($name, $category, $brand, $description, $price)
	{

		$cat = "SELECT id FROM categories WHERE name = ?";

		$cat_id = $this->db->query($cat, array($category))->row_array();

		$brandquery = "SELECT id FROM brands WHERE name = ?";
		$brand_id = $this->db->query($brandquery, $brand)->row_array();

		//Set variable $user_id to user id from session data
		$user_id = $this->session->userdata('user_id');

		//Last line inserts ID of the user that created the posting
		$query = "INSERT INTO items(name, description, price, created_on, updated_on, categories_id, seller_id) 
			VALUES (?, ?, ?, NOW(), NOW(), {$cat_id['id']}, $user_id)";

		$this->db->query($query, array('name' => $name, 'description' => $description, 'price' => $price));

		$item_id = $this->db->insert_id();
		$query2 = "INSERT INTO items_has_brands (items_id, brands_id) VALUES ({$item_id}, {$brand_id['id']})";
		$this->db->query($query2);

		return $item_id;
	}

	public function display_item($num)
	{
		$query = "SELECT items.id, items.name, items.description, items.price, categories.name AS category, 
			brands.name AS brand_name, users.email , images.link
			FROM items 
			JOIN users ON items.seller_id = users.id 
			JOIN categories ON categories.id = items.categories_id 
			JOIN items_has_brands ON items_has_brands.items_id = items.id 
			JOIN brands ON brands.id = items_has_brands.brands_id 
			JOIN images on items.image_id = images.id
			WHERE items.id = {$num}";

		return $this->db->query($query)->result_array();
	}

	function add_image_to_item($data) {
		$query = "UPDATE items SET image_id = ? WHERE id = ?";
		$values = array($data['image_id'], $data['item_id']);
		 $this->db->query($query, $values);

	}

	function destroy_listing($item_id) {
		$query = "DELETE FROM items WHERE id = ?";
		$values = array($item_id);
		$this->db->query($query, $values);
	}

	function validate($data) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|regex_match[/^\d{0,15}(\.\d{0,2})?$/]');
		if($this->form_validation->run()){
			return true;
		} else {
			return false;
		}
	}

}