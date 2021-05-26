<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Mail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function send()
    {
        {
              $message = 'Welcome to Online CLinic Automation System';
              $this->load->library('email');
              $this->email->set_newline("\r\n");
              $this->email->from('uahtesham735@gmail.com'); // change it to yours
              $this->email->to('freelancerahtesham@gmail.com');// change it to yours
              $this->email->subject('Hi Ahtesham ul haq');
              $this->email->message($message);
              if($this->email->send())
             {
              echo 'Email sent.';
             }
             else
            {
             show_error($this->email->print_debugger());
            }
        
        }
    }
}
