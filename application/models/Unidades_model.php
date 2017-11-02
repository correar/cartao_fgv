<?php
class Unidades_model extends CI_Model {

    public function __construct()
    {
	$this->load->database();
    }

    public function get_Unidades()
    {
	$this->db->select('*');
	$this->db->from('unidades');
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