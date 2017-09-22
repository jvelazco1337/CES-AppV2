<?php 

class Submit_controller extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('submit_model');
		
	}

	
	public function index()
	{	
		echo validation_errors();
		/* sets he rules with 3 arguments:
		first arg is name of input
		second arg is lbel for error log
		third arg is validation rule
		*/
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		// check for validation rules
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('submit_view');
		}
		else
		{
			// info for database: database column ->...->(name of input)
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				"dob"=>$this->input->post("year")."/".$this->input->post("month")."/".$this->input->post("day"), 
				'favcolor' => $this->input->post('favcolor'),
			);

			$this->submit_model->submit_data($data);

			$data['message'] = 'Data Submitted Successfully';


			$this->load->view('submit_view', $data);
		}


	}

}
