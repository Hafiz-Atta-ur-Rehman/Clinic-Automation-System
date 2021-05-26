<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		Parent::__construct();
		$this->load->helper('url');	
		$this->load->model('Admin_model');
	}
	public function index()
	{
		$this->load->view('Frontend/Home');
	}
	public function doctors()
	{
		$this->load->view('Frontend/Doctors');
	}
	public function about()
	{
		$this->load->view('Frontend/About');
	}
	public function appointment()
	{
		$this->load->view('Frontend/Appointment');
	}
	public function blog()
	{
		$this->load->view('Frontend/Blog');
	}
	public function contact()
	{
		$this->load->view('Frontend/Contact');
	}
	public function login()
	{
		if($this->check_session_exists())
		{
			switch($_SESSION['IDENTITY_WHO_LOGINS'])
			{
				case 'admin':
				return redirect('index.php/admin/dashboard');
				break;
				case 'doctor':
				return redirect('index.php/doctor/dashboard');
				break;
				case 'nurse':
				return redirect('index.php/nurse/dashboard');
				break;
				case 'patient':
				return redirect('index.php/patient/dashboard');
				break;
				case 'pharmacist':
				return redirect('index.php/pharmacist/dashboard');
				break;
				case 'laboratorist':
				return redirect('index.php/laboratorist/dashboard');
				break;
				case 'accountant':
				return redirect('index.php/accountant/dashboard');
				break;
				case 'receptionist':
				return redirect('index.php/receptionist/dashboard');
				break;
			}
		}
		else
		$this->load->view('Frontend/Login');
	}
	public function doctorDetails($doctorID=null)
	{
		$this->load->view('Frontend/Response');
	}
	public function department($detp_id=null)
	{
		if($detp_id==null)
		{
			$this->load->view('Frontend/Alldepartments');
		}
		else
		{
			$this->load->view('Frontend/department');
		}
	}
	public function check_session_exists()
	{
		if($this->session->has_userdata('IDENTITY_WHO_LOGINS') && $_SESSION['LOGGED_IN']==true){
			return true;
		}
		else
			return false;
	}
}
