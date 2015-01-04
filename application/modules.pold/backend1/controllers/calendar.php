<?php
class Calendar extends Admin_Controller
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
			/*$data['title'] = 'Calendar';
			$data['template'] = 'calendar_index';
			$this->load->view("layout",$data);*/
			$this->display();
	}
	public function display()
	{
		$config = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url().'backend/calendar/index'
             );
		$config['day_type'] = 'long'; 
		$config['template'] = '
    {cal_cell_content}<span class="day_listing">{day}</span>&nbsp;&bull; {content}&nbsp;{/cal_cell_content}
    {cal_cell_content_today}<div class="today"><span class="day_listing">{day}</span>&bull; {content}</div>{/cal_cell_content_today}
    {cal_cell_no_content}<span class="day_listing">{day}</span>&nbsp;{/cal_cell_no_content}
    {cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span></div>{/cal_cell_no_content_today}
'; 
	$config['template'] = '
    {table_open}<table class="calendar">{/table_open}
    {week_day_cell}<th class="day_header">{week_day}</th>{/week_day_cell}
    {cal_cell_content}<span class="day_listing">{day}</span>&nbsp;&bull; {content}&nbsp;{/cal_cell_content}
    {cal_cell_content_today}<div class="today"><span class="day_listing">{day}</span>&bull; {content}</div>{/cal_cell_content_today}
    {cal_cell_no_content}<span class="day_listing">{day}</span>&nbsp;{/cal_cell_no_content}
    {cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span></div>{/cal_cell_no_content_today}
'; 
	$this->load->library('calendar', $config);
	$month = (!$this->uri->segment(5)) ? date('m') : $this->uri->segment(5);
	$year = (!$this->uri->segment(4)) ? date('y') : $this->uri->segment(4);
	$cal_data=array();
	for($i=1; $i<32; $i++){
		$cal_data[$i]="<a title='Xem thông tin các hóa đơn trong ngày' href='".base_url()."backend/calendar/view/".$i."/".$month."/".$year."/view1'>Bắt đầu thuê</a> | <a title='Xem thông tin các hóa đơn trong ngày' href='".base_url()."backend/calendar/view/".$i."/".$month."/".$year."/view2'>Hết hạn</a>";
	}	
	$data['cal']=$this->calendar->generate($this->uri->segment(4), $this->uri->segment(5), $cal_data);	
	$data['title'] = 'Administration';
	$data['template'] = 'calendar_index';
	$this->load->view("layout",$data);
	}

	public function view()
	{
		$day = $this->uri->segment(4);
		$month = $this->uri->segment(5);
		$year = $this->uri->segment(6);
		$action = $this->uri->segment(7);
		switch ($action) {
			case 'view1':
				$where=array(
					  
                      "day(book2_bill_date_start)" => $day,
                      "month(book2_bill_date_start)" => $month,
                      "year(book2_bill_date_start)" => $year
					);
				$data['data'] = $this->Mbill->view1($where);
				$data['title'] = 'Chi tiết';
				$data['template'] = 'calendar_view';
				$this->load->view("layout",$data);
				break;
			case 'view2':
				$where=array(
					 
                      "day(book2_bill_date_end)" => $day,
                      "month(book2_bill_date_end)" => $month,
                      "year(book2_bill_date_end)" => $year
					);
				$data['data'] = $this->Mbill->view1($where);
				$data['title'] = 'Chi tiết';
				$data['template'] = 'calendar_view';
				$this->load->view("layout",$data);
				break;
			break;
			default:
				$where=array(

                      "day(book2_bill_date_start)" => $day,
                      "month(book2_bill_date_start)" => $month,
                      "year(book2_bill_date_start)" => $year
					);
				$data['data'] = $this->Mbill->view1($where);
				$data['title'] = 'Chi tiết';
				$data['template'] = 'calendar_view';
				$this->load->view("layout",$data);
				break;
			
		}
	}
}