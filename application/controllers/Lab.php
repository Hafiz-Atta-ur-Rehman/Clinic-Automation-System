<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends CI_Controller
{
	public function __construct()
	{
		Parent::__construct();
		$this->load->helper('url');
        if (!isset($_SESSION['IDENTITY_WHO_LOGINS']) && !isset($_SESSION['LOGGED_IN']) && !isset($_SESSION['ID'])) {
            $this->session->set_flashdata('failure', 'Access Denied ! Please Log In First!');
            redirect('index.php/home/login', 'refresh');
        }
	}
    public function dashboard()
	{
		$this->load->view('Backend/Labortorist/dashboard');
	}
    public function blood_bank()
	{
		$this->load->view('Backend/Labortorist/bloodbank');
	}
    public function blood_donor()
	{
		$this->load->view('Backend/Labortorist/blooddonor');
	}
    public function pathology_report()
	{
		$this->load->view('Backend/Labortorist/pathologyreport');
	}
    public function payroll()
	{
		$this->load->view('Backend/Labortorist/payroll');
	}
    public function profile()
	{
		$this->load->view('Backend/Labortorist/profile');
	}

    public function addblooddonor()
	{
		$this->load->view('Backend/Labortorist/forms/addblooddonor');
	}
}
?>