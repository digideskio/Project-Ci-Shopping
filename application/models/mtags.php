<?php 
class Mtags extends MY_Model {

    protected $_table = "tags";

    public function __construct() {
        parent::__construct();
    }
    public  function listAll()
    {
        $query = $this->db->query('SELECT * FROM tags');
        return $query->result_array();
    }
}