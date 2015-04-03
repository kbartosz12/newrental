<?php

class Engine_m extends MY_Model{
    
    

public function __construct() 
{
    parent::__construct();
    $this->load->database();
    $this->table = 'engine';
    $this->id = 'engine_id';
}

}