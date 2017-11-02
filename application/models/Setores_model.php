<?php
class Setores_model extends CI_Model {

    public function __construct()
    {
	$this->load->database();
	$this->load->dbutil();
    }

    public function get_Setores()
    {
	$this->db->select('*');
	$this->db->from('setores');
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

    public function get_Setores_Unidade($idUnidade)
    {
	$this->db->select('setores.*');
	$this->db->from('setores');
	$this->db->join('unidade_setor','fkUnidade = '.$idUnidade);
	$this->db->where('fkSetor = idSetor');
	$this->db->order_by('nome', 'ASC');
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

    public function get_Setor($idSetor)
    {
	$this->db->select('*');
	$this->db->from('setores');
	$this->db->where('idSetor = 1');
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
	    return false;
	}
	else
	{
	    return $this->db->error();
	}

    }

}

?>