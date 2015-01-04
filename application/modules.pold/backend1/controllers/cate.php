<?php
class Cate extends Admin_Controller
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
		if($this->Mcate->listall("book2_category_id") != FALSE){
				//$data['listall'] = $this->Mcate->listall("book2_category_id");
				$this->load->library('pagination'); 
		        $config['base_url']   = base_url(). "backend/cate/listall";
		        $config['total_rows'] = $this->Mcate->count_all();
		        $config['per_page']   = 15;
		        $config['uri_segment'] = 4; // xác định segment chứa page number
		        $config['full_tag_open'] = '<p>';
		        $config['full_tag_close'] = '</p>'; 
		        $this->pagination->initialize($config);            
		        $start = $this->uri->segment(4);
		        $this->load->library("pagination",$config);
		        $data['link'] = $this->pagination->create_links();
		        $data['listall'] = $this->Mcate->listall2($config['per_page'],$start);
				$data['title'] = 'Danh sách thể loại sách';
				$data['template'] = 'cate_list';
				$this->load->view("layout",$data);
			}else
			{
				echo 'Chua co danh sach the loai';
			}
		
	}
	public function add()
	{
		if($this->Mcate->showCatebyParentId() != FALSE)
		{
			$data['cate'] = $this->Mcate->showCatebyParentId();
		}
		$data['title'] = 'Thêm mới thể loại sách';
		$data['template'] = 'cate_add';
		$this->load->view("layout",$data);
	}
	public function edit()
	{
		$id= $this->uri->segment(4);
		$data['id']=$id;
		if($this->Mcate->showCatebyParentId() != FALSE)
		{
			$data['cate'] = $this->Mcate->showCatebyParentId();
		}
		if($this->Mcate->checkIssetcatebyId($id) == FALSE)
			{
				echo 'Không tồn tại thể loại.';
			}
			else
			{
				$data['mycate'] = $this->Mcate->checkIssetCatebyId($id);
				$data['title'] = 'Sửa thể loại';
				$data['template'] = 'cate_edit';
				$this->load->view("layout",$data);
			}
	}
	public function del()
	{
		$id= $this->uri->segment(4);
		if($this->Mcate->checkIssetcatebyId($id) == FALSE)
			{
				echo 'Không tồn tại thể loại này.';
			}
			else
			{
				$where = array(
                            "book2_cate_id" => $this->uri->segment(4)
                            );
				$this->Mcate->delete($where);
				$where2 = array(
                            "book2_book_parent_id" => $this->uri->segment(4)
                            );
				$this->Mbook->delete($where2);
				header("location:".base_url()."backend/cate/listall");
				exit();
			}
		header("location:".base_url()."backend/cate/listall");
	}
}