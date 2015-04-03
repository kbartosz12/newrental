<?php

class Cars_m extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'cars';
        $this->id = 'car_id';
    }
    
    
    

    public function get($car_id) {
        $this->db->where('car_id', $car_id);
        return $this->db->get($this->table)->row();
    }
    
    public function get_all()
    {
        // Join "dołączy" do zapytania drugą tabelę brands, dzięki czemu będziemy mieć dostęp do nazwy marki
        $this->db->join('brands', 'cars.brand_id = brands.brand_id');
        $this->db->join('engine', 'cars.engine_id = engine.engine_id');
        return parent::get_all();
    }
}
