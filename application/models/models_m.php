<?php

class Models_m extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = 'models';
        $this->id = 'model_id';
    }

    public function getByBrand($brand_id) {

        $this->db->where('brand_id', $brand_id);
        return parent::get_all();
    }

}
