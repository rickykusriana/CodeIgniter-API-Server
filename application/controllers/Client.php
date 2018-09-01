<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	private $api = 'https://www.metaweather.com/api/location/search/?query=san';

	public function index()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL 				=> $this->api,
			CURLOPT_RETURNTRANSFER 		=> true,
			CURLOPT_TIMEOUT 			=> 30,
			CURLOPT_HTTP_VERSION 		=> CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST 		=> "GET",
			CURLOPT_HTTPHEADER 			=> array("cache-control: no-cache"),
		));
		
		$data['get_url'] = curl_exec($curl);
		$this->load->view('welcome_message', $data);

		$err = curl_error($curl);
		curl_close($curl);
	}

	public function haha()
	{
		$a = '[{"id":"02012","product_name":"as","product_qty":"axx","utilities":"xa","date_of_return":"sa","btn_action":[null,null]},{"id":"23111","product_name":"ax","product_qty":"sa","utilities":"xa","date_of_return":"da","btn_action":[null,null]}]';

		$data = json_decode($a, true);

		foreach ($data as $key => $value) {
			unset($data[$key]['id']);
			unset($data[$key]['btn_action']);
			$data[$key]['transaction_id'] = 'aaa';
		}


		print_r($data);


	}
}