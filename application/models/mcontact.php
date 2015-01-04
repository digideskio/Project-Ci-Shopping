<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Mcontact extends MY_Model {

    protected $_table = "contact";

    public function __construct() {
        parent::__construct();
    }
    public  function listAll()
    {
        $query = $this->db->query('SELECT * FROM contact ORDER By id DESC');
        return $query->result_array();
    }
    public function insertContact($t, $c, $f, $m, $p)
    {
        $query = $this->db->query('INSERT INTO contact (title, content, fullname, email, phone) VALUES ("'.$t.'", "'.$c.'", "'.$f.'", "'.$m.'", "'.$p.'")');
    }
}
