<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades {

    protected $CI;

    public function __construct()
    {
	$this->CI =& get_instance();
	$this->CI->load->model('unidades_model');
	$this->CI->load->helper('array');
    }

    public function get_Unidades($params)
    {
	$idioma = element('idioma', $params);
	$data = $this->CI->unidades_model->get_Unidades($idioma);
	return $data;
    }

    public function set_Unidade($params)
    {

    }
}

?>