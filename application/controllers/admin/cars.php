<?php

class Cars extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('brands_m');
        $this->load->model('cars_m');
        $this->load->model('engine_m');
        $this->load->model('models_m');
    }

    public function index() {
        $data = array();

        $data['cars'] = $this->cars_m->get_all();
        //zobacz zawartość tablicy cars po dadaniu join i przed
        //brands już nie potrzebujemy skoro dodaliśmy join
        //$data['brands'] = $this->brands_m->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/cars/cars', $data);
        $this->load->view('admin/footer');
    }

    /*  public function show() {
      $lista = $this->cars_m->get_all();
      $this->load->view('admin/header');
      $this->load->view('admin/users/lista', $data);
      $this->load->view('admin/footer');
      } */

    public function addCar() {

        $this->form_validation->set_rules('models', 'model', 'required|integer');
        $this->form_validation->set_rules('car_type', 'password', 'required');
        $this->form_validation->set_rules('engine', 'password2', 'required');
        $this->form_validation->set_rules('seats', 'seats', 'integer');
        $this->form_validation->set_rules('color', 'color', '');
        if ($this->form_validation->run()) {
            // tu wiemy że post przeszedł walidację
            $data = array(
                'model_id' => $this->input->post('models'),
                'car_type' => $this->input->post('car_type'),
                'engine_id' => $this->input->post('engine'),
                'seats' => $this->input->post('seats'),
                'color' => $this->input->post('color')
            );


            $this->cars_m->insert($data);
            //tu redirect do car-list
        } else {
            
        }
        $view_data['brands'] = $this->brands_m->get_all();
        $view_data['engine'] = $this->engine_m->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/cars/new', $view_data);
        $this->load->view('admin/footer');
    }
    
    public function getModels() {
        $this->form_validation->set_rules('brand_id', 'brand', 'required|integer');
        if ($this->form_validation->run()) {
            $brand_id  = $this->input->post('brand_id');
            $models_ret = $this->models_m->getByBrand($brand_id);
            $models = array();
            foreach ($models_ret as $model)
            {
                $models[$model->model_id] = $model->name;
            }
            echo form_dropdown('models', $models);
        }
    }

}
