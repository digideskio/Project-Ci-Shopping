<?php
class Logout extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function dologout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('level');
		header("location:".base_url()."verify/login");
		exit();
		
	}
}