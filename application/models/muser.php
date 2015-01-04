<?php
class Muser extends MY_Model{
	protected $_table="users";
	public function __construct(){
		parent::__construct();
	}
	public function hiddenUser($id)
	{
		$where = array(
			"id" => $id
		);
		$this->Muser->delete($where);
	}
	public function insertUser($username, $password, $email, $fullname, $active, $usergroups, $datecreated)
	{
		$query = $this->db->query('INSERT INTO users (username, password, email, fullname, active, usergroups, datecreated) VALUES ("'.$username.'", "'.$password.'", "'.$email.'", "'.$fullname.'", "'.$active.'", "'.$usergroups.'", "'.$datecreated.'")');
	}
	public function issetEmail($email)
	{
		$query=$this->db->query("select * from users where email='".$email."'");
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 0;
		}
	}
	public function issetUsername($user)
	{
		$query=$this->db->query("select * from users where username='".$user."'");
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 0;
		}
	}
	public function listAll(){
		$query = $this->db->query("SELECT * FROM users T1 INNER JOIN team T2 ON T1.teamid = T2.teamid 
		INNER JOIN status T3 ON T1.status = T3.statusid");
		return $query->result_array();
	}
	function listGroup()
	{
		$query = $this->db->query("SELECT * FROM usergroups");
		return $query->result_array();
	}
	public function checkUser($u, $p)
	{
		$query=$this->db->query("select * from users where email='".$u."' and password='".$p."'");
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return "false";
		}
	}
	public function checkIssetUserbyId($id)
	{
		$this->db->where("userid", $id);
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
	public function forgot($u, $m)
	{
		$query=$this->db->query("select * from book2_user where book2_user_username='".$u."' and book2_user_email='".$m."'");
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}
	public function checkOldPass($p, $id)
	{
		$query=$this->db->query("select * from users where password='".$p."' and userid='".$id."'");
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function checkUsername($u)
	{
		$this->db->where("book2_user_username", $u);
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

	public function listall2($offset,$start){
        $this->db->limit($offset,$start);
        $this->db->order_by("book2_user_id desc");
         return $this->db->get($this->_table)->result_array();
     }
     public function count_all(){
         return $this->db->count_all($this->_table);
     }
     public function checkDefaultPass($id)
     {
     	$query = $this->db->query("SELECT password FROM users WHERE userid = '".$id."'");
     	return $query->row_array();
     }
     public function updateUserInfo($name, $company, $phone, $address, $id)
     {
     	$query = $this->db->query('UPDATE users SET fullname="'.$name.'", company="'.$company.'", phone = "'.$phone.'", address="'.$address.'" WHERE userid="'.$id.'"');
     }
     public function updateUserPass($pass, $id)
     {
     	$query = $this->db->query('UPDATE users SET password="'.$pass.'" WHERE userid="'.$id.'"');
     }
}