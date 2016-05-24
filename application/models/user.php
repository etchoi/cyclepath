<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	function create_user($data) {
		$query = "INSERT INTO users (first_name, last_name, email, password, created_on, updated_on) VALUES(?,?,?,?, NOW(), NOW())";
		$values = array($data['first_name'], $data['last_name'], $data['email'], $data['password']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	function update_user($data) {
		$query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, updated_on = NOW()
					WHERE id = ?";
		$values = array($data['first_name'], $data['last_name'], $data['email'], $data['user_id']);
		$this->db->query($query, $values);
	}

	function get_user_by_email($email) {
		$query = "SELECT * FROM users WHERE email = ?";
		$values = array($email);
		return $this->db->query($query, $values)->row_array();
	}
	function get_user_by_id($id) {
		$query = "SELECT users.id AS user_id, first_name, last_name, email, link, images.id AS image_id, password
					FROM users JOIN images ON images.id = users.image_id WHERE users.id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}

	function change_image($data) {

		$query = "UPDATE users SET image_id = ? WHERE id = ?";
		$values = array($data['image_id'], $data['user_id']);
		$this->db->query($query, $values);
	}

	public function validate($data) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
       	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
		if($this->form_validation->run()){
			return true;
		} else {
			return false; 
		}
	}	
	public function update_validate($data){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
       $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		if($this->form_validation->run()){
			return true;
		} else {
			return false; 
		}
	}

	public function active_per_user($id)
	{
		$query = "SELECT * FROM items WHERE seller_id = ? AND active_status = 'active'";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}

	public function inactive_per_user()
	{

	}
}
