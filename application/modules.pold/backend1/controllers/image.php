<?php
class Image extends Admin_Controller
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
	public function slide()
	{
		if(isset($_POST['submit']))
		{
					$config['upload_path']='./public/upload/slider';
					$config['allowed_types']='jpg';
					$config['max_size']='9000';
					$config['max_width']='10240';
					$config['max_height']='7680';
					$this->load->library("upload",$config);
			if($this->upload->do_upload("file1"))
			{
					$image = $this->upload->data();
					$this->load->library("image_lib");
					//Create 120px x 185px version
					
					$config = array();
					$config['source_image'] = './public/public/upload/slider/'.$image['file_name'];
					$config['image_library'] = 'gd2';
					$config['maintain_ratio'] = TRUE;
					$this->image_lib->initialize($config);
					$this->image_lib->clear();
					unset($config);
					$img = array("book2_slider_url" => $image['client_name']);
					$where = array("book2_slider_id" => 4);
					$this->Mslider->update($img, $where);
			}
			if($this->upload->do_upload("file2"))
			{
					$image = $this->upload->data();
					$this->load->library("image_lib");
					//Create 120px x 185px version
					
					$config = array();
					$config['source_image'] = './public/public/upload/slider/'.$image['file_name'];
					$config['image_library'] = 'gd2';
					$config['maintain_ratio'] = TRUE;
					$this->image_lib->initialize($config);
					$this->image_lib->clear();
					unset($config);
					$img = array("book2_slider_url" => $image['client_name']);
					$where = array("book2_slider_id" => 3);
					$this->Mslider->update($img, $where);
			}
			if($this->upload->do_upload("file3"))
			{
					$image = $this->upload->data();
					$this->load->library("image_lib");
					//Create 120px x 185px version
					
					$config = array();
					$config['source_image'] = './public/public/upload/slider/'.$image['file_name'];
					$config['image_library'] = 'gd2';
					$config['maintain_ratio'] = TRUE;
					$this->image_lib->initialize($config);
					$this->image_lib->clear();
					unset($config);
					$img = array("book2_slider_url" => $image['client_name']);
					$where = array("book2_slider_id" => 2);
					$this->Mslider->update($img, $where);
			}
			if($this->upload->do_upload("file4"))
			{
					$image = $this->upload->data();
					$this->load->library("image_lib");
					//Create 120px x 185px version
					
					$config = array();
					$config['source_image'] = './public/public/upload/slider/'.$image['file_name'];
					$config['image_library'] = 'gd2';
					$config['maintain_ratio'] = TRUE;
					$this->image_lib->initialize($config);
					$this->image_lib->clear();
					unset($config);
					$img = array("book2_slider_url" => $image['client_name']);
					$where = array("book2_slider_id" => 1);
					$this->Mslider->update($img, $where);
			}
			$data['success'][]='Cập nhật hình ảnh mới thành công.';
		}
		$data['list'] = $this->Mslider->listall("book2_slider_id");
		$data['title'] = 'Slides';
        $data['template'] = 'slide';
        $this->load->view("layout",$data); 
	}
}