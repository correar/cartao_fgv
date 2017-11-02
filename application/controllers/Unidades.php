<?php

class Unidades extends CI_Controller {

    public function __construct()
    {
	parent::__construct();
	$this->load->model('unidades_model');
    }

    public function Unidades()
    {


    }

    public function get_Unidades()
    {
	$data = array(
	    'unidades' => $UN->unidades_model->get_Unidades();
	);
	return $data;

    }

    public function set_Unidades()
    {

    }

    public function delete_Unidades()
    {

    }


}