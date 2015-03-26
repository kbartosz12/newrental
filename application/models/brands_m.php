<?php

class Brands_m extends MY_Model{
    
    

public function __construct() 
{
    parent::__construct();
    $this->load->database();
    $this->table = 'brands';
    $this->id = 'brand_id';
}

}

