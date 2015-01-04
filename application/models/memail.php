<?php
class Memail extends MY_Model {

    protected $_table = "email";

    public function __construct() {
        parent::__construct();
    }
    public  function listAll()
    {
        $query = $this->db->query('SELECT * FROM email ORDER By id DESC');
        return $query->result_array();
    }
    public function insertEmail($n, $m)
    {
        $query = $this->db->query('INSERT INTO email (name, email) VALUES ("'.$n.'", "'.$m.'")');
    }
}