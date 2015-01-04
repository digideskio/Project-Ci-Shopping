<?php
// Model xử  lý cơ sỏ dữ liệu của bảng book2_comment
class Mcomment extends MY_Model{
	protected $_table="book2_comment";
	public function __construct(){
		parent::__construct();
	}
	// Đếm tổng số dòng của các nhận xét tướng ứng với sách
	public function countall($id)
	{
		$this->db->where("book2_comment_book_id" , $id);
        return $this->db->count_all($this->_table);
	}
	// Lấy tất cả số dòng của các nhận xét tương ứng với sách gán vào mảng
	public function listall($offset,$start, $id){
		$this->db->where("book2_comment_book_id", $id);
        $this->db->limit($offset,$start);
        $this->db->order_by("book2_comment_id desc");
         return $this->db->get($this->_table)->result_array();
    }

    public function countall2()
    {
    	return $this->db->count_all($this->_table);
    }
    public function listall2($offset,$start)
    {
    	$this->db->limit($offset,$start);
        $this->db->order_by("book2_comment_id desc");
        return $this->db->get($this->_table)->result_array();
    }
}
