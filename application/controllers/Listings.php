<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listings extends CI_Controller {

	// public function __construct()
	// {
	// 	parent:: __construct();
	// 	$this->load->model("listing");
	// } 

	public function index()
	{
		$this->load->model('listing');
		$matches = $this->listing->search_results();
		$this->load->view('homeii', array('matches' => $matches));
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function contact()
	{
		$this->load->view('contact_us');
	}

	public function build() {
		if($this->session->userdata('is_logged_in')) {
			$this->load->view('create_listing');
		} else {
			show_404();
		}
	}

	public function create_item() {
		if($this->session->userdata('is_logged_in')) {
			$this->load->model('listing');
			$data = $this->input->post();
			//validate item data
			if(!$this->listing->validate($data)) {
				//validation failed
				$errors = array(validation_errors());
				$this->session->set_flashdata('errors', $errors);
				redirect("/listings/build");
			}
			//validate image data
			$item_id = $this->listing->create_item(

				$this->input->post('name'),
				$this->input->post('category'),
				$this->input->post('brand'),
				$this->input->post('description'),
				$this->input->post('price')
			);
			$this->do_upload($item_id);
			redirect('/users/show/' . $this->session->userdata('user_id'));
		} else {
			show_404();
		}
	}

	private function do_upload($item_id) {
		$this->load->model('Listing');
		//create the users folder if it doesn't exist
		$path = './assets/images/items/'.$item_id."/";
		if(!is_dir($path)) { //create the folder if it's not already exists
			mkdir($path,0755,TRUE);
		}
		//set the path, define what file types we will allow, and the name of the file
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = 'item_image';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()) {
			//add errors and redirect
			if ("You did not select a file to upload." != $this->upload->display_errors("","")) {
				//destroy the item we made
				$this->listing->destroy_listing($item_id);
				//destroy the folder we made
				rmdir($path);
				$this->session->set_flashdata("errors", array("You can only upload a jpeg, jpg, gif, or png file"));
				redirect("/listings/build/");

			}
			else {
				// here they did not provide a file upload so we dont care
				//defaults to 2, we dont need to do anything

			}
		} else {
			//create the image in the db:
			//remove the initial ./ from the path
			$path = substr($path, 1);
			$path .= $this->upload->data()['file_name'];
			$this->load->model('Image');
			$image_id = $this->Image->create_image($path);
			//update the user image_id to update to the new image tag

			//connect image to item
			$data = array('image_id' => $image_id, 'item_id' => $item_id);
			$this->Listing->add_image_to_item($data);
			//end function, continue
		}
	}

	public function search($category)
	{
		$this->load->model('listing');
		$search_result = $this->listing->search($category);
		$this->load->view('listings', array('results' => $search_result));		
	}

	public function item_page($num)
	{
		$this->load->model('listing');
		$results = $this->listing->display_item($num);

		$this->load->view('item_page',array('ind_item' => $results));
	}

	public function inactivate($id)
	{
		$this->load->model('listing');
		$this->listing->inactivate_listing($id);

		redirect('/users/show/'.$this->session->userdata('user_id'));
	}
}