<?php
class Mbook extends MY_Model{
	protected $_table="book2_book";
	public function __construct(){
		parent::__construct();
	}
	public function checkIssetBookCode($code)
	{
		$this->db->where("book2_book_code", $code);
		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function showBookbyId($id)
	{
		$this->db->where("book2_book_id", $id);
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
		$this->db->from('book2_category c');
		$this->db->join('book2_book b', 'b.book2_book_cate = c.book2_category_id');
		$q = $this->db->get();
		if($q->num_rows() > 0)
		{
			return $q->result_array();
		}else
		{
			return FALSE;
		}
	}
	public function product($where)
	{
		$this->db->limit("15", "0");
		$this->db->order_by("$where desc");
		
		$q = $this->db->get($this->_table);
		if($q->num_rows() > 0)
		{
			return $q->result_array();
		}else
		{
			return FALSE;
		}
	}
	public function productindex($where)
	{
		$this->db->limit("12", "0");
		$this->db->order_by("$where desc");
		
		$q = $this->db->get($this->_table);
		if($q->num_rows() > 0)
		{
			return $q->result_array();
		}else
		{
			return FALSE;
		}
	}
	public function book($id)
	{
		$this->db->where("book2_book_id", $id);
		$this->db->from('book2_category c');
		$this->db->join('book2_book b', 'b.book2_book_cate = c.book2_category_id');
		$q = $this->db->get();
		if($q->num_rows() > 0)
		{
			return $q->row_array();
		}else
		{
			return FALSE;
		}
	}
	public function showookByparentid($id)
	{
		$this->db->where("book2_book_cate", $id);
		$this->db->limit("5", "0");
		$this->db->order_by("book2_book_id desc");	
		$q = $this->db->get($this->_table);
		if($q->num_rows() > 0)
		{
			return $q->result_array();
		}else
		{
			return FALSE;
		}
	}
	public function listallByCateid($offset,$start, $cid){
		$this->db->where("book2_book_cate", $cid);
        $this->db->limit($offset,$start);
        $this->db->order_by("book2_book_id desc");
         return $this->db->get($this->_table)->result_array();
     }
     public function count_allBycateid($cid){
     	$this->db->where("book2_book_cate", $cid);
         return $this->db->count_all($this->_table);
     }
     public function listallSearch($offset,$start, $keytype, $cid){
		$this->db->where($keytype, $cid);
        $this->db->limit($offset,$start);
        $this->db->order_by("book2_book_id desc");
         return $this->db->get($this->_table)->result_array();
     }
     public function count_allSearch($keytype, $cid){
     	$this->db->where($keytype, $cid);
         return $this->db->count_all($this->_table);
     }

     public function listall2($offset,$start){
        $this->db->limit($offset,$start);
        $this->db->order_by("book2_book_id desc");
        $this->db->from('book2_category c');
		$this->db->join('book2_book b', 'b.book2_book_cate = c.book2_category_id');
		$q = $this->db->get();
        return $q->result_array();
     }
     public function count_all(){
         return $this->db->count_all($this->_table);
     }
}