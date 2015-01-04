<?php
class Comment extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata['user'] || $this->session->userdata['level'] != 1)
		{
			header("location:".base_url()."verify/login");
			exit();
		}
	}
	public function index()
	{
			$this->load->library('pagination'); 
		    $config['base_url']   = base_url(). "backend/comment/index";
		    $config['total_rows'] = $this->Mcomment->countall2();
		    $config['per_page']   = 4;
		    $config['uri_segment'] = 4; // xác định segment chứa page number
		    $config['full_tag_open'] = '<p>';
		    $config['full_tag_close'] = '</p>'; 
		    $this->pagination->initialize($config);            
		    $start = $this->uri->segment(4);
		    $this->load->library("pagination",$config);
		    $data['link'] = $this->pagination->create_links();
		    $data['data'] = $this->Mcomment->listall2($config['per_page'],$start);
			$data['title'] = 'Đánh giá';
	        $data['template'] = 'comment';
	        $this->load->view("layout",$data); 
	}
}