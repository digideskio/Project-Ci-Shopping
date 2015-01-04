<?php
class Mcate extends MY_Model{
	protected $_table="streams";
	public function __construct(){
		parent::__construct();
	}
	public function updateStream($id, $name)
	{
		$query = $this->db->query("UPDATE streams SET name='".$name."' WHERE streamid = '".$id."'");
		if($query->num_rows() > 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function issetStream($name)
	{
		$query = $this->db->query("SELECT * FROM streams WHERE name = '".$name."'");
		if($query->num_rows() > 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function insertStream($name, $parent, $datecreated)
	{
		$query = $this->db->query("INSERT INTO streams (name, parent, datecreated) VALUES ('".$name."','".$parent."','".$datecreated."')");
		if($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function showCatebyParentId()
	{
		$this->db->where("book2_category_parent_id", 0);
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
	public function showCatebynotParent()
	{
		$query=$this->db->query("select * from book2_category where book2_category_parent_id !='0'");
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	public function checkIssetcatebyId($id)
	{
		$this->db->where("book2_category_id", $id);
		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
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
	public function showParentCate($id)
	{
		$this->db->where("book2_category_id", $id);
		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}

	public function listall2($offset,$start){
        $this->db->limit($offset,$start);
        $this->db->order_by("book2_category_id desc");
         return $this->db->get($this->_table)->result_array();
     }
     public function count_all(){
         return $this->db->count_all($this->_table);
     }
}