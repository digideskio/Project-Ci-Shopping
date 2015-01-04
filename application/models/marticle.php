<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Author : Quan Minh Nguyen */

class Marticle extends MY_Model {

    protected $_table = "article";

    public function __construct() {
        parent::__construct();
    }

    public function insertArticle($t, $c, $p, $id, $img) {
        date_default_timezone_set("Asia/Saigon");
        $date = date('Y-m-d H:i:s');
        $query = $this->db->query('INSERT INTO article (title, content, public, userid, img) VALUES ("' . $t . '", "' . $c . '", "' . $p . '", "' . $id . '", "' . $img . '")');
    }

    public function listAll() {
        $query = $this->db->query('SELECT * FROM article T1 INNER JOIN users T2 ON T2.userid=T1.userid ORDER BY id DESC');
        return $query->result_array();
    }

    public function articlebyid($id) {
        $query = $this->db->query("SELECT * FROM article WHERE id ='" . $id . "'");
        return $query->row_array();
    }

    public function editArticle($title, $content, $public, $img, $id) {
        if ($img != "[]") {
            $query = $this->db->query('UPDATE article set title="' . $title . '", content= "' . $content . '", public ="' . $public . '",img= "' . $img . '" WHERE id ="' . $id . '"');
        } else {
            $query = $this->db->query('UPDATE article set title="' . $title . '", content= "' . $content . '", public ="' . $public . '" WHERE id ="' . $id . '"');
        }
    }

    public function listArticlePublicTrue() {
        $query = $this->db->query('SELECT * FROM  article WHERE public != 1 ORDER BY id DESC LIMIT 5');
        return $query->result_array();
    }

    public function listAllPagin($number, $offset) {
        $this->db->join('users', 'users.userid = article.userid');
        $this->db->where("public !=", "1");
        $this->db->order_by("id", "desc");
        $query = $this->db->get('article', $number, $offset);
        return $query->result_array();
    }

    public function countAllPagin() {
        return $this->db->count_all('article');
    }

    public function showById($id) {
        $query = $this->db->query('SELECT * FROM article T1 INNER JOIN users T2 ON T1.userid = T2.userid WHERE id ="' . $id . '"');
        return $query->row_array();
    }

    public function updateView($id) {
        $query = $this->db->query('UPDATE article set view = view+1 WHERE id="'.$id.'"');
    }
    public function topView()
    {
        $query = $this->db->query('SELECT * FROM article ORDER BY view DESC LIMIT 10');
        return $query->result_array();
    }

}
