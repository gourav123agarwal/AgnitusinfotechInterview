<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiData extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('common_model');
	}
	
	public function index()
	{
	
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.worldbank.org/v2/country?format=json&page=',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$data =  json_decode($response);
		for ($i=1; $i <= $data[0]->pages  ; $i++) { 
			$this->getData($i);
		}
	}


	public function getData($page_id='')
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.worldbank.org/v2/country?format=json&page='.$page_id.'',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data =  json_decode($response);
		if (!empty($data)) {
			foreach ($data[1] as $key => $value) {
				$inserData = array(
							'id' => $value->id	,
							'iso2Code' => $value->iso2Code	,
							'name' => $value->name	,
						 	'region_id' => $value->region->id,	
						 	'region_iso2code' => $value->region->iso2code,	
						 	'region_value' => $value->region->value	,
							'adminregion_id' => $value->adminregion->id,	
						 	'adminregion_iso2code' => $value->adminregion->iso2code,	
						 	'adminregion_value' => $value->adminregion->value	,
							'incomeLevel_id' => $value->incomeLevel->id,	
						 	'incomeLevel_iso2code' => $value->incomeLevel->iso2code,	
						 	'incomeLevel_value' => $value->incomeLevel->value	,
						 	'lendingType_id' => $value->lendingType->id,	
						 	'lendingType_iso2code' => $value->lendingType->iso2code,	
						 	'lendingType_value' => $value->lendingType->value	,
						 	'capitalCity' => $value->capitalCity	,
						 	'latitude' => $value->latitude	,
						 	'longitude' => $value->longitude	,
				);
				$id = $this->common_model->add('table_country', $inserData);
			}
		}
	}
}
