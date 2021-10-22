<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('common_model');
		$this->load->library('session');
			
	}
	
	public function index()
	{
		$data['list'] =  $this->common_model->getDetails();
		$this->load->view('list_view',$data);
	}

	//Edit Function
	public function edit($country_id)
	{
		$country_id =  base64_decode($country_id);
		$data['details'] =  $this->common_model->getRow($country_id);
		$this->load->view('edit_view',$data);
	}

	//Update function
	public function editupdate()
	{
		if($this->input->post()){
			$postdata = $this->input->post() ;
			$condition 	 = array('country_id'=>$postdata['id']);
			$update_data = array(
								'incomeLevel_value'=>$postdata['incomeLevel_value'],
								'capitalCity'=>$postdata['capitalCity'],
								'longitude'=>$postdata['longitude'],
								'latitude'=>$postdata['latitude'],
							);
			$this->common_model->update('table_country',$update_data,$condition);
			$this->session->set_flashdata('message_name', '<div class="alert alert-success" role="alert">Updated Successfully</div>');
			redirect('home');
		}
	}
}
