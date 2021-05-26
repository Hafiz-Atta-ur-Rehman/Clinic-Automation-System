<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountant extends CI_Controller
{
	public function __construct()
	{
		Parent::__construct();
		$this->load->helper('url');
	}
	public function dashboard()
	{
		$this->load->view('Backend/Accountant/dashboard');
	}

    public function payroll()
	{
		$this->load->view('Backend/Accountant/payroll');
	}

    public function profile()
	{
		$this->load->view('Backend/Accountant/profile');
	}

	public function add_invoice()
	{
		$this->load->view('Backend/Accountant/forms/add_invoice');
	}

	public function manage_invoice()
	{
		$this->load->view('Backend/Accountant/manage_invoice');
	}


}
?>