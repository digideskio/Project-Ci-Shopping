<?php

/**
 * @property CI_DB_active_record $db
 *
 */
class MY_Model extends CI_Model
{

    protected $table= '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        
    }

    public function insert($data)
    {
        $this->open();
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function update($data, $condition = array())
    {
        $this->open();
        if (!empty($condition) && is_array($condition))
            foreach ($condition as $key => $value)
                if (is_numeric($key))
                    $this->db->where($value);
                else
                    $this->db->where($key, $value);
        $this->db->update($this->_table, $data);
    }

    public function delete($condition)
    {
        $this->open();
        if (!empty($condition) && is_array($condition))
            foreach ($condition as $key => $value)
                if (is_numeric($key))
                    $this->db->where($value);
                else
                    $this->db->where($key, $value);
        $this->db->delete($this->_table);
    }

    public function excuteQuery($sql)
    {
        $this->open();
        $r = $this->db->query($sql);
        if (empty($r) || !is_object($r))
        {
            return NULL;
        }
        return $r->result_array();
    }
    
    private $isConnected = false;

    public function open()
    {
        if ($this->isConnected)
        {
            if (empty($this->db))
            {
                $CI = & get_instance();
                $CI->load->database();
                $this->db = $CI->db;
            }
            return;
        }
        
        $this->isConnected = true;
        $CI = & get_instance();
        if (empty($CI->db))
        {
            $CI->load->database();
            $this->db = $CI->db;
        }
        
        $this->table = $this->dbprefix($this->table);
    }

    public function close()
    {
        if (!empty($this->db))
            $this->db->close();
        $this->isConnected = false;
    }

    public function dbprefix($table2) {
        if (!$this->isConnected)
            $this->open();
        if (empty($this->db->dbprefix) || startsWith($table2, $this->db->dbprefix))
            return $table2;
        return $this->db->dbprefix($table2);
    }

    public function beginTransaction()
    {
        $this->db->trans_begin();
    }
    
    public function finishTransaction()
    {
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }        
    }
    
    public function commit()
    {
        $this->db->trans_commit(); 
    }
    
    public function rollback()
    {
        $this->db->trans_rollback();
    }
    public function listall($value)
    {
        $this->open();
        $this->db->order_by("$value desc");
        $query = $this->db->get($this->_table);
        if($query->num_rows > 0 ){
            return $query->result_array();
        }else
        {
            return FALSE;
        }
    }
}