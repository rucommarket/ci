<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_m extends CI_Model {


	public function __construct()
	{
        parent::__construct();
	}
    
    public function get_company($num,$offset)
    {
        $query = $this->db->get('company_info',$num,$offset);
        return $query->result_array();
    }
    public function get_company_pp($user)
    {
        $this->db->where('user',$user);
        $query = $this->db->get('subscription');
        return $query->result_array();
    }
    public function get_company_p($num,$offset,$id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('company_info',$num,$offset);
        return $query->result_array();
    }
    
    public function row_company()
    {
        $query = $this->db->get('company_info');
		return $query->num_rows(); 
    }
    
    public function get_subs_t()
    {
        $query = $this->db->get('subscription_type');
        return $query->result_array();
    }
    
    public function row_subs_t()
    {
        $query = $this->db->get('subscription_type');
		return $query->num_rows(); 
    }
    public function get_subs()
    {
        $query = $this->db->get('subscription');
        return $query->result_array();
    }
    public function row_subs($add)
    {
        $this->db->where('company',$add['company']);
        $this->db->where('user',$add['user']);
        $this->db->where('type',$add['type']);
        $query = $this->db->get('subscription');
		return $query->num_rows();
    }
      public function check_subs($id, $company, $uid)
    {
        $this->db->where('type',$id);
        $this->db->where('user',$uid);
        $this->db->where('company',$company);
        $query = $this->db->get('subscription');
        return $query->num_rows();
    }
    public function add_subs($add_s)
    {
        $this->db->insert('subscription',$add_s);
    }
    public function del_subs($del)
    {
        $this->db->where('company',$del['company']);
        $this->db->where('user',$del['user']);
        $this->db->where('type',$del['type']);
        $this->db->delete('subscription');
    }
}
