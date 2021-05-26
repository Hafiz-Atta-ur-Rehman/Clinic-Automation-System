<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receptionist extends CI_Controller
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
        $this->load->view('Backend/Receptionist/dashboard');
    } 
    public function appointment_list()
    {    
        $this->load->view('Backend/Receptionist/Appointment/appointment_list');
    }  
    
    public function addappointment()
    {    
        $this->load->view('Backend/Receptionist/forms/addappointment');
    } 
    public function requested_appointment()
    {    
        $this->load->view('Backend/Receptionist/Appointment/requested_appointment');
    } 
    public function approveform()
    {    
        $this->load->view('Backend/Receptionist/forms/approveform');
    }
    public function patients()
    {    
        $this->load->view('Backend/Receptionist/patients');
    } 
    public function addpatient()
    {    
        $this->load->view('Backend/Receptionist/forms/addpatient');
    }  
    public function payroll()
    {    
        $this->load->view('Backend/Receptionist/payroll');
    }  
    public function profile()
    {    
        $this->load->view('Backend/Receptionist/profile');
    }  
}
?>
