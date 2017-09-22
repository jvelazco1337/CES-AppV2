<?php 

class Submit_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	/*
	insert data to the database function.
	runs code equivalent to:
	INSERT INTO User (firstname, lastname, ect) VALUES ("John", "Doe", etc)
	*/
	function submit_data($data)
	{
		$this->db->insert('User', $data);
	}

	
}

