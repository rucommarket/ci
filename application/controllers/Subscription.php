<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subscription extends CI_Controller {


	public function index()
	{
	   $user_log = '1';
        $this->load->model('subscription_m');
        $row = $this->subscription_m->row_company();
        $config['base_url']= base_url().'Subscription/';
		$config['total_rows']= $row;
		$config['per_page']= '20';
        $this->pagination->initialize($config);
        $datan['user_log'] = $user_log; 
        $datan['company'] = $this->subscription_m->get_company($config['per_page'],$this->uri->segment(2));
        $datan['subs_t'] = $this->subscription_m->get_subs_t();
        $datan['row_subs_t'] = $this->subscription_m->row_subs_t();
        $datan['subs'] = $this->subscription_m->get_subs();
        $datan['company_p'] = $this->subscription_m->get_company_p($config['per_page'],$this->uri->segment(2),$user_log);
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
        $chs = $this->input->post('chs');
        $add['type'] = $this->input->post('id');
        $add['company'] = $this->input->post('company');
        $add['user'] = $this->input->post('uid');
        $add['date'] = date("Y-m-d");
        $this->load->model('Subscription_m');
        $subn = $this->Subscription_m->row_subs($add);
        if ($chs == 'true' && $subn == '0') 
        {
        $this->Subscription_m->add_subs($add);
        echo "add";
        } else {
        if ($chs == 'false' && $subn == '1') 
        {
        $this->Subscription_m->del_subs($add);
        echo "del";
        } else {echo " 0 ";}};
    }
    public function get_search()
    {
        $svl = $this->input->post('svl');
        $this->load->model('Subscription_m');
        $dt = $this->Subscription_m->search_g($svl);
        echo $dt;
    }
}