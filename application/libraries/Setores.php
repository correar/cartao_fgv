<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setores {

    protected $CI;

    public function __construct()
    {
	$this->CI =& get_instance();
	$this->CI->load->model('setores_model');
	$this->CI->load->helper('array');
    }

    public function get_Setores($params)
    {
	$idSetor = element('idSetor',$params);
	$idUnidade = element('idUnidade',$params);
	//Se o Setor estiver vazio busca todos os setores
	if((!$idSetor) and (!$idUnidade))
	{
	    $data = $this->CI->setores_model->get_Setores();
	}
	else if((!$idSetor) and ($idUnidade))
	{
	    $data = $this->CI->setores_model->get_Setores_Unidade($idUnidade);
	}
	else if($idSetor)
	{
	    $data = $this->CI->setores_model->get_Setor($idSetor);
	}
	return $data;

    }

}
?>