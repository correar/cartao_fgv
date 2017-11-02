<?php



class Cartoes extends CI_Controller {

    public function __construct()
    {
	parent::__construct();
	$this->load->library('parser');
	$this->load->library('unidades');
	$this->load->library('setores');
	$this->load->library('enderecos');
	$this->load->helper('url');
	$this->load->model('unidades_model');
	$this->load->model('setores_model');
    }

    public function index()
    {
	//Inicializa a tela de cartao, com idioma em Bilingue, Unidade 1, Setor 1, endereco 1
	$unidade = array('idioma' => 1);
	$setor = array('idSetor' => '', 'idUnidade' => 1);
	$endereco = array('idEndereco' => '', 'idUnidade' => 1);
	$data = array(
	    'unidades' => $this->unidades->get_Unidades($unidade),
	    'setores' => $this->setores->get_Setores($setor),
	    'enderecos' => $this->enderecos->get_Enderecos($endereco)
	);
	$this->load->view('templates/header');
	$this->load->view('templates/menu');
	$this->parser->parse('cartoes/index', $data);
	$this->load->view('templates/footer');
    }

    public function listarSetor()
    {
	$setor = array('idSetor' => '', 'idUnidade' => $this->uri->segment(3));
	$data = array(
	    'setores' => $this->setores->get_Setores($setor)
	);
	$this->parser->parse('cartoes/listaSetor', $data);
    }

    public function listarEndereco()
    {
	$endereco = array('idEndereco' => '', 'idUnidade' => $this->uri->segment(3));
	$data = array(
	    'enderecos' => $this->enderecos->get_Enderecos($endereco)
	);
	$this->parser->parse('cartoes/listaEndereco', $data);
    }

    public function pdf()
    {
	$dados = explode(",",$this->uri->segment(3));

	$setor = array('idSetor' => $dados[1], 'idUnidade' => '');
	$data['nomes'] = str_replace('%20',' ',$dados[0]);
	$data['setores'] = $this->setores->get_Setores($setor);
	
	$this->load->view('pdf/pdf', $data);
    }

}