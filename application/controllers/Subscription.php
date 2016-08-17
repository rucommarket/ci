<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {


	public function index()
	{
        $this->load->view('subscription.css');
		$this->load->view('subscription');
	}
}
