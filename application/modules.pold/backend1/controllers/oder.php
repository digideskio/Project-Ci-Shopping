<?php
class Oder extends Admin_Controller
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
			$key = $this->uri->segment(4);
			$this->load->library('pagination'); 
	        $config['base_url']   = base_url(). "backend/oder/listall/".$key."/";
	        $config['total_rows'] = $this->Mbill->count_all2();
	        $config['per_page']   = 15;
	        $config['uri_segment'] = 5; // xác định segment chứa page number
	        $config['full_tag_open'] = '<p>';
	        $config['full_tag_close'] = '</p>'; 
	        $this->pagination->initialize($config);            
	        $start = $this->uri->segment(5);
	        $this->load->library("pagination",$config);
	        $data['link'] = $this->pagination->create_links();
	        switch ($key) {
	        	case 'all':
	        		$data['data'] = $this->Mbill->listall2($config['per_page'],$start, null, null);
	        		break;
	        	case '0':
	        		$data['data'] = $this->Mbill->listall2($config['per_page'],$start, "book2_bill_status", "0");
	        		break;	
	        	case '1':
	        		$data['data'] = $this->Mbill->listall2($config['per_page'],$start, "book2_bill_status", "1");
	        		break;
	        	case 'end':
	        		date_default_timezone_set('Asia/Ho_Chi_Minh');
	        		$now = date("Y-m-d");
	        		$data['data'] = $this->Mbill->listall2($config['per_page'],$start, "book2_bill_date_end", $now);
	        		break;
	        	case 'end2':
	        		$data['data'] = $this->Mbill->listall2($config['per_page'],$start, "book2_bill_status", "2");
	        		break;	
	        	case 'today':
	        		date_default_timezone_set('Asia/Ho_Chi_Minh');
	        		$now = date("Y-m-d");
	        		$data['data'] = $this->Mbill->listall2($config['per_page'],$start, "today", $now);
	        		break;		
	        	default:
	        		# code...
	        		break;
	        }
			$data['title'] = 'Các hóa đơn';
			$data['template'] = 'oder_listall';
			$this->load->view("layout",$data);
	}
	public function del()
	{
		$id= $this->uri->segment(4);
		$where = array(
                            "book2_bill_id" => $this->uri->segment(4)
                            );
		$this->Mbill->delete($where);
		header("location:".base_url()."backend/oder/listall/all");
		exit();
	}
}