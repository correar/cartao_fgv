<?php
class Enderecos_model extends CI_Model {

    public function __construct()
    {
	$this->load->database();
    }

    public function get_Enderecos()
    {
	$this->db->select('*');
	$this->db->from('endereco');
	if($query = $this->db->get())
	{
	    if($query->num_rows() > 0)
	    {
		foreach($query->result() as $row)
		{
		    $data[] = $row;
		}
		return $data;
	    }
	    else
	    {
		return $this->db->error();
	    }
	}
	else
	{
	    return $this->db->error();
	}
    }

    public function get_Enderecos_Unidade($idUnidade)
    {
	$this->db->select('endereco.*, unidade_endereco.numero');
	$this->db->from('endereco');
	$this->db->join('unidade_endereco','fkUnidade = '.$idUnidade);
	$this->db->where('fkEndereco = idEndereco');
	$this->db->order_by('logradouro', 'ASC');
	if($query = $this->db->get())
	{
	    if($query->num_rows() > 0)
	    {
		foreach($query->result() as $row)
		{
		    $data[] = $row;
		}
		return $data;
	    }
	    else
	    {
		return $this->db->error();
	    }
	}
	else
	{
	    return $this->db->error();
	}
    }

}

?>