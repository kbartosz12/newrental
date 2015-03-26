<?php

class MY_Model extends CI_Model {

    protected $table;
    protected $id;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function get_all() {

        $all = $this->db->get($this->table)->result();

        return $all;
    }

}
