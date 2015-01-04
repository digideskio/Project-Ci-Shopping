<?php
class Login extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model("Muser");
	}
	public function index()
	{
		$data['template'] = 'login';
		$data['title'] = 'Đăng nhập quản trị';
		$this->load->view("layout",$data);
	}
	public function hello()
	{
		if($this->session->userdata['user'] && $this->session->userdata['level'] ==1 )
			echo $this->session->userdata['user'];
			echo '<a href="'.base_url().'verify/logout/dologout">Logout</a>';
	}
}