<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Mpage extends MY_Model {

    protected $_table = "page";

    public function __construct() {
        parent::__construct();
    }
    public  function listAll()
    {
        $query = $this->db->query('SELECT * FROM page');
        return $query->result_array();
    }
    public function updateContact($content)
    {
        $query = $this->db->query('UPDATE page SET content = "'.$content.'" WHERE id = 1');
    }
    public function updateAbout($content)
    {
        $query = $this->db->query('UPDATE page SET content = "'.$content.'" WHERE id = 2');
    }
    public  function showContact()
    {
        $query = $this->db->query('SELECT * FROM page WHERE id = 1');
        return $query->row_array();
    }
    public  function showAbout()
    {
        $query = $this->db->query('SELECT * FROM page WHERE id = 2');
        return $query->row_array();
    }
}
