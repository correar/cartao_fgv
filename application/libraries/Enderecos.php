<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enderecos {

    protected $CI;

    public function __construct()
    {
	$this->CI =& get_instance();
	$this->CI->load->model('enderecos_model');
	$this->CI->load->helper('array');
    }

    public function get_Enderecos($params)
    {
	$idEndereco = element('idEndereco', $params);
	$idUnidade = element('idUnidade', $params);
	//Se o Endereco estiver vazio busca todas os Enderecos
	if((!$idEndereco) and (!$idUnidade))
	{
	    $data = $this->CI->enderecos_model->get_Enderecos();
	}
	else if((!$idEndereco) and ($idUnidade))
	{
	    $data = $this->CI->enderecos_model->get_Enderecos_Unidade($idUnidade);
	}
	else if($idEndereco)
	{
	    $data = $this->CI->enderecos_model->get_Endereco($idEndreco);
	}
	return $data;
    }

}

?>