<?php
class Mbilldetail extends MY_Model{
	protected $_table="book2_bill_detail";
	public function __construct(){
		parent::__construct();
	}
	public function listall($offset,$start, $cid){
		$this->db->where("book2_bill_detail_customer_id", $cid);
        $this->db->limit($offset,$start);
        $this->db->order_by("book2_bill_detail_id","desc");
         return $this->db->get($this->_table)->result_array();
     }
     public function count_all($cid){
     	$this->db->where("book2_bill_detail_customer_id", $cid);
         return $this->db->count_all($this->_table);
     }
     public function detail($code)
     {
     	$this->db->where("book2_bill_detail_bill_code", $code);
     	$this->db->from('book2_bill_detail b1');
		$this->db->join('book2_bill b2', 'b2.book2_bill_code = b1.book2_bill_detail_bill_code');
		$q = $this->db->get();
		if($q->num_rows() > 0)
		{
			return $q->result_array();
		}else
		{
			return FALSE;
		}
     }
}