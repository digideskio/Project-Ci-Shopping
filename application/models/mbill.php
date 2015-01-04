<?php
class Mbill extends MY_Model{
	protected $_table="book2_bill";
	public function __construct(){
		parent::__construct();
	}
	public function listall($offset,$start, $cid){
		$this->db->where("book2_bill_customer_id", $cid);
        $this->db->limit($offset,$start);
        $this->db->order_by("book2_bill_id","desc");
         return $this->db->get($this->_table)->result_array();
     }
     public function count_all($cid){
     	$this->db->where("book2_bill_customer_id", $cid);
         return $this->db->count_all($this->_table);
     }

     public function listall2($offset,$start, $key, $val){
        if($key !=null && $val !=null)
        {
           
           if($key == "book2_bill_date_end")
           {
                $w = array(
                        "book2_bill_status" => 1,
                        "book2_bill_date_end <" => $val,
                    );
                $this->db->where($w);
           }elseif ($key == "today") {
               $w = array(
                        "book2_bill_status" => 1,
                        "book2_bill_date_end " => $val,
                    );
                $this->db->where($w);
           }

           else{
               $this->db->where($key, $val);
           } 
        }
        $this->db->limit($offset,$start);
        $this->db->order_by("book2_bill_id desc");
         return $this->db->get($this->_table)->result_array();
     }
     public function count_all2(){
         return $this->db->count_all($this->_table);
     }
     public function view1($where)
     {
      $this->db->where($where);
      $this->db->order_by("book2_bill_id desc");
      return $this->db->get($this->_table)->result_array();
     }
}