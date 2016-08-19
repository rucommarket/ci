<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {


	public function index()
	{
        $this->load->model('subscription_m');
        $row = $this->subscription_m->row_company();
        $config['base_url']= base_url().'Subscription/';
		$config['total_rows']= $row;
		$config['per_page']= '10';
        $this->pagination->initialize($config);
        $datan['company'] = $this->subscription_m->get_company($config['per_page'],$this->uri->segment(2));
        $datan['subs_t'] = $this->subscription_m->get_subs_t();
        $datan['row_subs_t'] = $this->subscription_m->row_subs_t();
        $datan['subs'] = $this->subscription_m->get_subs();
		$this->load->view('subscription',$datan);
	}
    public function get_subs_c()
    {
        $id = $this->input->post('id');
        $company = $this->input->post('company');
        $uid = $this->input->post('uid');
        $this->load->model('Subscription_m');
        $dt = $this->Subscription_m->check_subs($id, $company, $uid);
        echo $dt;
         
    }
    public function add_subs_c()
    {
        $id = $this->input->post('id');
        $company = $this->input->post('company');
        $uid = $this->input->post('uid');
        $this->load->model('Subscription_m');
    }
}