<?php
class Maddtime extends MY_Model{
	protected $_table="book2_addtime";
	public function __construct(){
		parent::__construct();
	}
	public function listAll()
	{
		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}
}