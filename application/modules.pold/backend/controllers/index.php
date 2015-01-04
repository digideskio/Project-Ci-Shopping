<?php
class Index extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('layout');
	}
	public function user()
	{
		$data['title'] = "User Manager";
		$data['view'] = "users";
		$this->load->view('layout', $data);
	}
	public function stream()
	{
		$data['title'] = "Stream Manager";
		$data['view'] = "streams";
		$data['streams'] = $this->load->model('Mcate');
		$this->load->view('layout', $data);
	}
}