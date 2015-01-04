<?php
class User extends Admin_Controller
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
	public function listall()
	{
			//$data['data'] = $this->Muser->listall("book2_user_id");
			$this->load->library('pagination'); 
	        $config['base_url']   = base_url(). "backend/user/listall";
	        $config['total_rows'] = $this->Muser->count_all();
	        $config['per_page']   = 15;
	        $config['uri_segment'] = 4; // xác định segment chứa page number
	        $config['full_tag_open'] = '<p>';
	        $config['full_tag_close'] = '</p>'; 
	        $this->pagination->initialize($config);            
	        $start = $this->uri->segment(4);
	        $this->load->library("pagination",$config);
	        $data['link'] = $this->pagination->create_links();
	        $data['data'] = $this->Muser->listall2($config['per_page'],$start);
			$data['title'] = 'Danh sách người dùng';
			$data['template'] = 'user_listall';
			$this->load->view("layout",$data);
	}
	public function add()
	{
			$data['title'] = 'Thêm người dùng';
			$data['template'] = 'user_add';
			$this->load->view("layout",$data);
	}
	public function edit()
	{
			$id= $this->uri->segment(4);
			if($this->Muser->checkIssetUserbyId($id) == FALSE)
			{
				echo 'Thành viên này không tồn tại.';
			}
			else
			{
				$data['user'] = $this->Muser->checkIssetUserbyId($id);
				$data['title'] = 'Sửa người dùng';
				$data['template'] = 'user_edit';
				$this->load->view("layout",$data);
			}
	}
	public function delete()
	{
		$id= $this->uri->segment(4);
			if($this->Muser->checkIssetUserbyId($id) == FALSE)
			{
				echo 'Không tồn tại người dùng này.';
			}
			else
			{
				$where = array(
                            "book2_user_id" => $this->uri->segment(4)
                            );
				$this->Muser->delete($where);
				header("location:".base_url()."backend/user/listall");
				exit();
			}
	}
}