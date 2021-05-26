<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nurse extends CI_Controller
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
    //Dashboard
    public function dashboard()
    {    
        $this->load->view('Backend/Nurse/dashboard');
    } 
    //patient
    public function patient()
    {    
        $this->load->view('Backend/Nurse/patient');
    } 
    public function addpatient()
    {    
        $this->load->view('Backend/Nurse/forms/addpatient');
    } 
    // Manage Bed
    public function managebed()
    {    
        $this->load->view('Backend/Nurse/bedroom/managebed');
    } 
    public function editbed()
    {    
        $this->load->view('Backend/Nurse/forms/editbed');
    } 
    public function addbed()
    {    
        $this->load->view('Backend/Nurse/forms/addbed');
    }
    // Bed Allotment
    public function bedallotment()
    {    
        $this->load->view('Backend/Nurse/bedroom/bedallotment');
    } 
    public function editbedallotment()
    {    
        $this->load->view('Backend/Nurse/forms/editbedallotment');
    } 
    public function addbedallotment()
    {    
        $this->load->view('Backend/Nurse/forms/addbedallotment');
    }
    //Manage Blood Bank
    public function managebloodbank()
    {    
        $this->load->view('Backend/Nurse/bloodbank/managebloodbank');
    } 
    public function editbloodbank()
    {    
        $this->load->view('Backend/Nurse/forms/editbloodbank');
    } 
    //Donor
    public function blooddonor()
    {    
        $this->load->view('Backend/Nurse/bloodbank/blooddonor');
    } 
    public function addblooddonor()
    {    
        $this->load->view('Backend/Nurse/forms/addblooddonor');
    }
    public function editblooddonor()
    {    
        $this->load->view('Backend/Nurse/forms/editblooddonor');
    } 
    //Report
    public function report()
    {    
        $this->load->view('Backend/Nurse/report');
    } 
    public function addreport()
    {    
        $this->load->view('Backend/Nurse/forms/addreport');
    } 
    public function editreport()
    {    
        $this->load->view('Backend/Nurse/forms/editreport');
    } 
    //Payroll
    public function payroll()
    {    
        $this->load->view('Backend/Nurse/payroll');
    } 
    //Profile
    public function profile()
    {    
        // echo 'ok';
        $this->load->view('Backend/Nurse/profile');
    } 
    
}
?>
