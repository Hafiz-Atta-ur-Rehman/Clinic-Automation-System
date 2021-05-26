<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller
{
	public function __construct()
	{
		Parent::__construct();
        $this->load->helper('url');
        $this->load->model('Admin_model');
        if(!isset($_SESSION['IDENTITY_WHO_LOGINS']) && !isset($_SESSION['LOGGED_IN']) && !isset($_SESSION['ID'])){
            $this->session->set_flashdata('failure','Access Denied ! Please Log In First!');
            redirect('index.php/home/login', 'refresh');
        }
	}
    public function dashboard()
    {    
        $this->load->view('Backend/Patient/dashboard');
    }
    public function appointment_list()
    {
        $this->load->view('Backend/Patient/Appointment/Appointment_list');
    }
    public function requested_appointment()
    {    
        $this->load->view('Backend/Patient/Appointment/Requested_Appointment');
    }
    public function prescription()
    {    
        $this->load->view('Backend/Patient/prescription');
    }

    public function doctors()
    {    
        $this->load->view('Backend/Patient/doctors');
    }
    public function admit_history()
    {    
        $this->load->view('Backend/Patient/admit_history');
    }
    public function bloodbank()
    {    
        $this->load->view('Backend/Patient/bloodbank');
    }
    public function invoice()
    {    
        $this->load->view('Backend/Patient/invoice');
    }
    public function payroll()
    {    
        $this->load->view('Backend/Patient/payroll');
    }
    public function message()
    {
        $data['doctors'] = (object)$this->Admin_model->get_doctors();
        $this->load->view('Backend/Patient/message',compact('data'));
    }
    public function profile()
    {    
        $this->load->view('Backend/Patient/profile');
    }
    public function addappointment()
    {    
        $this->load->view('Backend/Patient/forms/addappointment');
    }

    public function addprescription()
    {    
        $this->load->view('Backend/Patient/forms/addprescription');
    }
    public function addhistory()
    {    
        $this->load->view('Backend/Patient/forms/addhistory');
    }
    
    public function adddoctor()
    {    
        $this->load->view('Backend/Patient/forms/adddoctor');
    }
    public function bloodbankstatus()
    {    
        $this->load->view('Backend/Patient/bloodbankstatus');
    }

    public function addoperationreport()
    {    
        $this->load->view('Backend/Patient/forms/addoperationreport');
    }
    public function addbirthreport()
    {    
        $this->load->view('Backend/Patient/forms/addbirthreport');
    }
    public function adddeathreport()
    {    
        $this->load->view('Backend/Patient/forms/adddeathreport');
    }

    public function adddiagnosisreport()
    {    
        $this->load->view('Backend/Patient/forms/adddiagnosisreport');
    }
    public function medication_history($pid='')
    {
        $this->load->view('Backend/Patient/medicationhistory');
    }
    public function insert_msg()
    {
        $msg=$_POST['msg'];
        $did=$_POST['did'];
        $res=$this->db->insert('chats',['patient_id'=>$_SESSION['PROFILE_ID'],'doctor_id'=>$did,'send_by'=>'patient','recieved_by'=>'doctor','msg'=>$msg]);
        $inserted_id=$this->db->insert_id();
        if($res)
        {
            $img=$this->Admin_model->getpatientby_id($_SESSION['PROFILE_ID'])->icon;
            $name=$this->Admin_model->getpatientby_id($_SESSION['PROFILE_ID'])->name;
            $created_at=$this->db->get_where('chats', array('id' =>$inserted_id))->row()->created_at;
            echo '<div class="chat-message right">
                                        <img class="message-avatar" src="'.$img.'" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#">'.$name.'</a>
                                            <span class="message-date">'.date("D M d Y - h:i:s A",strtotime($created_at)).'</span>
                                            <span class="message-content">'.$msg.'</span>
                                        </div>
                                    </div>';
        }
    }
    public function get_doctor_chat()
    {
        $did = $_POST['did'];
        $msgs = $this->Admin_model->get_total_msgs_with_doctor($did);
        $html1='<input type="hidden" id="send_to_id" value="'.$did.'">';
        $html2='';
        if ($msgs > 0) {
            $this->Admin_model->set_msg_status_read_for_patient($did);
            $chats = $this->Admin_model->get_all_chat_with_doctor($did,$_SESSION['PROFILE_ID']);
            foreach ($chats as $chat) {
                $ordering = $chat->send_by == 'doctor' && $chat->recieved_by == 'patient' ? 'left' : 'right';
                if($ordering=='left')
                {
                    $img=$this->Admin_model->getdoctorby_id($chat->doctor_id)->icon;
                    $name=$this->Admin_model->getdoctorby_id($chat->doctor_id)->name;
                }
                else
                {
                    $img=$this->Admin_model->getpatientby_id($chat->patient_id)->icon;
                    $name=$this->Admin_model->getpatientby_id($chat->patient_id)->name;
                }
                $html2.='<div class="chat-message '.$ordering.'">
                                        <img class="message-avatar" src="'.$img.'" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#">'.$name.'</a>
                                            <span class="message-date">'.date("D M d Y - h:i:s A",strtotime($chat->created_at)).'</span>
                                            <span class="message-content">'.$chat->msg.'</span>
                                        </div>
                                    </div>';
            }
            $html2.=$html1;
            echo $html2;
        } else {
            $html2.='<div class="alert alert-danger">
                   Sorry! There is no Chat with that patient
                </div>';
            $html2.=$html1;
            echo $html2;
        }
    }
    public function get_unread_msgs()
    {
        $did=$_POST['did'];
        $unread_msgs=$this->Admin_model->get_unread_msgs_for_patient($did);
        echo $unread_msgs;
    }
    public function reviewrating()
    {
        $this->load->view('Backend/patient/reviewrating');
    }
    public function doctor_profile()
    {
        if(isset($_GET['did']) && $_GET['did']!=''){
            $doctor=(Array)$this->Admin_model->getdoctorby_id($_GET['did']);
            $this->load->view('Backend/Patient/doctor_profile',compact('doctor'));
        }else{
            echo "Doctor Not Found";
        }
    }
    public function fetch_all_ratings()
    {
        $did=$_POST['did'];
        $ratings=$this->Admin_model->get_ratings_by_doctor_id($did);
        $html='';
        if($ratings){
            foreach ($ratings as $rating){
                $html.='<div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle img-responsive" src="'.$this->Admin_model->getpatientby_id($rating->patient_id)->icon.'">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">
                                            <div class="rateYo" data-did="'.$rating->doctor_id.'" data-pid="'.$rating->patient_id.'"></div>
                                            </small>
                                            <strong>'.$this->Admin_model->getpatientby_id($rating->patient_id)->name.'</strong> posted feedback on <strong>'.$this->Admin_model->getdoctorby_id($rating->doctor_id)->name.'</strong> Profile. <br>
                                            <small class="text-muted">'.date("D M d Y - h:i:s A",strtotime($rating->created_at)).'</small>
                                            <div class="well">'.$rating->review.'</div>
                                            <div class="pull-right">';
                            if($_SESSION['PROFILE_ID']==$rating->patient_id){
                                $html.='<button data-toggle="modal" data-ddoctorid="'.$rating->doctor_id.'" data-target="#edtmodal" class="btn btn-xs btn-white edtrat"><i class="fa fa-thumbs-up"></i> Edit </button>';
                            }
                $html.='</div>
                                        </div>
                                    </div>';
            }
            echo $html;
        }else{
            echo "There are no Ratings and Feedbacks given to that Doctor";
        }
    }
    public function fetch_stars()
    {
        $row=$this->db->get_where('ratings', array('doctor_id'=>$_POST['did'],'patient_id'=>$_POST['pid']))->row();
        echo $row->stars;
    }
    public function payment_method()
    {    
        $this->load->view('Backend/Patient/payment_method');
    } 
}
?>