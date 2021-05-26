<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacist extends CI_Controller
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

        $this->load->view('Backend/Pharmacist/dashboard');
    } 
    public function medicinecategory()
    {    
        $this->load->view('Backend/Pharmacist/medicinecategory');
    } 
    public function addmedicinecategory()
    {    
        $this->load->view('Backend/Pharmacist/forms/addmedicinecategory');
    } 
    public function managemedicine()
    {    
        $this->load->view('Backend/Pharmacist/medicines/managemedicine');
    }
    public function addmedicine()
    {    
        $this->load->view('Backend/Pharmacist/forms/addmedicine');
    } 
    public function medicinesales()
    {    
        $this->load->view('Backend/Pharmacist/medicines/medicinesales');
    }
    public function addmedicinesale()
    {    
        $this->load->view('Backend/Pharmacist/forms/addmedicinesale');
    } 
    public function payroll()
    {    
        $this->load->view('Backend/Pharmacist/payroll');
    }
    public function profile()
    {    
        $this->load->view('Backend/Pharmacist/profile');
    }
}
?>
