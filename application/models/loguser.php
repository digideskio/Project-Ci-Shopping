<?php
class Loguser extends MY_Model{
	protected $_table="user_logs";
	public function __construct(){
		parent::__construct();
	}
	public function insertLoguser($uid, $date, $ip)
	{
		$query = $this->db->query('INSERT INTO user_logs (userid, logindate, ipaddress) VALUES ("'.$uid.'", "'.$date.'", "'.$ip.'")');
	}
}