<?php
class Book extends Admin_Controller
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
		if($this->Mbook->listall("book2_book_id") == FALSE)
		{
			echo 'Chua co du lieu.';
		}
		else
		{
			//$data['book'] = $this->Mbook->listall("book2_book_id");
			//$data['book'] = $this->Mbook->listAll();
			$this->load->library('pagination'); 
		    $config['base_url']   = base_url(). "backend/book/listall";
		    $config['total_rows'] = $this->Mbook->count_all();
		    $config['per_page']   = 4;
		    $config['uri_segment'] = 4; // xác định segment chứa page number
		    $config['full_tag_open'] = '<p>';
		    $config['full_tag_close'] = '</p>'; 
		    $this->pagination->initialize($config);            
		    $start = $this->uri->segment(4);
		    $this->load->library("pagination",$config);
		    $data['link'] = $this->pagination->create_links();
		    $data['book'] = $this->Mbook->listall2($config['per_page'],$start);
			$data['title'] = 'Danh sách các sách';
	        $data['template'] = 'book_list';
	        $this->load->view("layout",$data); 
	    }
	}
	public function add()
	{
		if($this->Mcate->showCatebynotParent() != FALSE)
		{
			$data['cate'] = $this->Mcate->showCatebynotParent();
		}
		$data['title'] = 'Thêm mới sách';
        $data['template'] = 'book_add';
        $this->load->view("layout",$data);  
	}
	public function edit()
	{
		$id= $this->uri->segment(4);
		$data['id']=$id;
		if($this->Mcate->showCatebynotParent() != FALSE)
		{
			$data['cate'] = $this->Mcate->showCatebynotParent();
		}
		if($this->Mbook->showBookbyId($id) ==FALSE)
		{
			echo 'Sach nay khong ton tai.';
		}else
		{
			$data['book'] = $this->Mbook->showBookbyId($id);
			$data['title'] = 'Chỉnh sửa sách';
        	$data['template'] = 'book_edit';
        	$this->load->view("layout",$data);  
		}
		
	}
	public function del()
	{
		$id= $this->uri->segment(4);
			if($this->Mbook->showBookbyId($id) == FALSE)
			{
				echo 'Không tồn tại sách này.';
			}
			else
			{
				$where = array(
                            "book2_book_id" => $this->uri->segment(4)
                            );
				$this->Mbook->delete($where);
				header("location:".base_url()."backend/book/listall");
				exit();
			}
	}
}