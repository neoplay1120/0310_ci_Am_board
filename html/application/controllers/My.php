<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('Sample_model'); 
			// $this->Sample_model
	}

	public function index()
	{
			$data['news'] = $this->Sample_model->get_select();

			print_r($data);
	}
 
 
}
