<?php
class Msearch extends MY_Model{
	protected $_table="book2_search_option";
	public function __construct(){
		parent::__construct();
	}
	public function listAll(){
		$query=$this->db->get($this->_table);
		return $query->result_array();
	}
}