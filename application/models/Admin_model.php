<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	   public function edit_account_details($name,$email)
	   {
	   		$id=$this->get_logged_in_id();
	   		$data = array(
			        'email' => $email,
			);
			$res=$this->db->where('id', $id)->update('users',$data);
			$res1=$this->db->where('id',$_SESSION['PROFILE_ID'])->update('admins',array('name'=>$name));
			if($res && $res1){
				$session_data=array(
					'ID',
					'IDENTITY_WHO_LOGINS',
					'LOGGED_IN',
					'PROFILE_ID'
				);
				$this->session->unset_userdata($session_data);
				$this->session->set_flashdata('failure','Email and Name Changed!');
					redirect('index.php/home/login', 'refresh');
			}
	   }

	   public function get_logged_in_id()
	   {
	   	 	return $this->session->userdata('ID');
	   }
	   public function get_row_by_id()
	   {
	   	 return $this->db->get_where('users', array('id' => $_SESSION['ID']))->row();
	   }
	   public function get_admin_profile()
	   {
	   	 switch($_SESSION['IDENTITY_WHO_LOGINS'])
	   	 {
	   	 	case 'admin':
	   	 	$profile=$this->db->get_where('admins', array('id' => $_SESSION['PROFILE_ID']))->row();
	   	 	break;
	   	 }
	   	 return $profile;
	   }
	   public function change_pass($pass)
	   {
	   		$id=$this->get_logged_in_id();
	   		$data = array(
			        'password' => password_hash($pass,PASSWORD_DEFAULT),
                    'online_status'=>0,
			);

			$res=$this->db->where('id', $id)->update('users',$data);
			// $res=$this->db->where('id', $id)->update('admins',['unhash_password'=>$pass]);

			if($res){
				$session_data=array(
					'ID',
					'IDENTITY_WHO_LOGINS',
					'LOGGED_IN',
					'PROFILE_ID'
				);
				$this->session->unset_userdata($session_data);
				$this->session->set_flashdata('failure','Password Changed!');
					redirect('index.php/home/login', 'refresh');
			}
	   }
	   public function get_sys_settings()
	   {
	   		return $this->db->get('settings')->row();
	   }
	   public function update_system_settings($settings)
	   {
	   		return $this->db->where('id',1)->update('settings',$settings);
	   }
	   public function add_dept($data)
	   {
	   		return $this->db->insert('departments',$data);
	   }

	   public function add_appointment($data)
	   {
	   		$data['doctor_id']=$_SESSION['PROFILE_ID'];
	   		$data['is_requested']=0;
	   		return $this->db->insert('appointments',$data);
	   }
	   public function update_dept($data)
	   {
	   		$id=$data['hidden_id'];
	   		unset($data['hidden_id']);
	   		$res=$this->db->where('id', $id)->update('departments',$data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }

	   public function update_prescription($data)
	   {
	   		$id=$data['hidden_id'];
	   		unset($data['hidden_id']);
	   		unset($data['files']);
	   		$res=$this->db->where('id', $id)->update('prescriptions',$data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }
	   public function get_depts()
	   {
		   	   $this->db->select("*")->from("departments")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }
    public function get_ratings_by_doctor_id($did)
    {
        $this->db->select("*")->from("ratings")->where(['doctor_id'=>$did]);
        $query = $this->db->get();
        return $query->result();
    }
	   public function delete_dept($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('departments', array('id' =>$id));
	   }
	   public function delete_prescription($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		{
	   			$this->db->select("*")->from("prescriptions")->where(['status'=>1,'id'=>$id]);
			   	$res = $this->db->get()->result(); 
			   	$pid=$res[0]->patient_id;
			   	return $this->db->delete('prescriptions', array('id' =>$id)) && $this->db->delete('diagnosis_reports', array('patient_id' =>$pid));
	   		}
	   		
	   }
	   public function delete_appointment($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('appointments', array('id' =>$id));
	   }
	   public function delete_report($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('reports', array('id' =>$id));
	   }



	   
	   public function getdeptby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('departments', array('id' =>$id))->row();
	   }

	   // Doctor fns
	   public function getdoctorby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('doctors', array('id' =>$id))->row();
	   }

	   public function get_login_details($id,$type)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('users', array('profile_id' =>$id,'type'=>$type))->row();
	   }
	   public function get_doctors()
	   {
	   		$this->db->select("*")->from("doctors")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function update_doctor($data)
	   {
	   		$id=$data['hidden_id'];
	   		$real_pass=$data['password'];
	   		$data['unhash_password']=$real_pass;
	   		$email=$data['email'];
	   		$hash_password=password_hash($real_pass,PASSWORD_DEFAULT);
			unset($data['email']);
			unset($data['hidden_id']);
			unset($data['password']);
			$profile_data=$data;
			$login_data=array('email'=>$email,'password'=>$hash_password);
	   		$res=$this->db->where('id', $id)->update('doctors',$profile_data) && $this->db->where(['profile_id'=>$id,'type'=>'doctor'])->update('users',$login_data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }
	   public function add_doctor($data)
	   {
			$real_pass=$data['password'];
			$email=$data['email'];
	   		$data['unhash_password']=$data['password'];
	   		unset($data['password']);
	   		unset($data['email']);
	   		$profile_data=$data;
	   		$res1=$this->db->insert('doctors',$profile_data);
	   		$id = $this->db->insert_id();
	   		$login_data=['email'=>$email,'password'=>password_hash($real_pass,PASSWORD_DEFAULT),'type'=>'doctor','profile_id'=>$id];
	   		$res2=$this->db->insert('users',$login_data);
	   		return $res1 && $res2;	 		
	      }

	   public function delete_doctor($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('doctors', array('id' =>$id)) && $this->db->delete('users', array('profile_id' =>$id,'type'=>'doctor'));
	   }

	   public function delete_bedallotment($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('bed_allotments', array('id' =>$id));
	   }
	   
	   //Doctor fns

	   // Patient fns
	   public function getpatientby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('patients', array('id' =>$id))->row();
	   }
	   public function getprescriptionby_id($id)
	   {
		   	if($id==0)
			   		return 0;
		   	else
		   	return $this->db->get_where('prescriptions', array('id' =>$id))->row();
	   }
	   public function getreportby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('reports', array('id' =>$id))->row();
	   }
	   public function getreport_file_by_id($id){
		   		if($id==0)
			   		return 0;
			   	else
			   	return $this->db->get_where('reports', array('id' =>$id))->row()->report_file_path;
	   }
	   public function getbedallotmentby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('bed_allotments', array('id' =>$id))->row();
	   }
	   public function get_patients()
	   {
	   		   $this->db->select("*")->from("patients")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function get_prescriptions()
	   {
	   		$this->db->select("*")->from("prescriptions")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }
	   public function update_report($data)
	   {
	   		$id=$data['hidden_id'];
	   		unset($data['hidden_id']);
	   	    return $this->db->where('id', $id)->update('reports',$data);
	   }

	   public function update_patient($data)
	   {
			$id=$data['hidden_id'];
	   		$real_pass=$data['password'];
	   		$data['unhash_password']=$real_pass;
	   		$email=$data['email'];
	   		$hash_password=password_hash($real_pass,PASSWORD_DEFAULT);
			unset($data['email']);
			unset($data['hidden_id']);
			unset($data['password']);
			$profile_data=$data;
			$login_data=array('email'=>$email,'password'=>$hash_password);
	   		$res=$this->db->where('id', $id)->update('patients',$profile_data) && $this->db->where(['profile_id'=>$id,'type'=>'patient'])->update('users',$login_data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }
	   public function add_patient($data)
	   {
	   		$real_pass=$data['password'];
			$email=$data['email'];
	   		$data['unhash_password']=$data['password'];
	   		unset($data['password']);
	   		unset($data['email']);
	   		$profile_data=$data;
	   		$res1=$this->db->insert('patients',$profile_data);
	   		$id = $this->db->insert_id();
	   		$login_data=['email'=>$email,'password'=>password_hash($real_pass,PASSWORD_DEFAULT),'type'=>'patient','profile_id'=>$id];
	   		$res2=$this->db->insert('users',$login_data);
	   		return $res1 && $res2;
	   }
	   public function add_diagnosis($post)
	   {
	   		$post['doctor_id']=$_SESSION['PROFILE_ID'];
	   		return $this->db->insert('diagnosis_reports',$post);
	   }

	   public function get_diagnosis_reports($doctor_id,$patient_id)
	   {
		   	$this->db->select("*")->from("diagnosis_reports")->where(['status'=>1,'doctor_id'=>$doctor_id,'patient_id'=>$patient_id]);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function add_report($post)
	   {
	   		$post['doctor_id']=$_SESSION['PROFILE_ID'];
	   		return $this->db->insert('reports',$post);
	   }

	   public function delete_patient($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('patients', array('id' =>$id)) && $this->db->delete('users', array('profile_id' =>$id,'type'=>'patient'));
	   }
	   
	   //Patient fns

	   // Nurses fns
	   public function getnurseby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('nurses', array('id' =>$id))->row();
	   }
	   public function getdiagnosisby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('diagnosis_reports', array('id' =>$id))->row();
	   }
	   public function get_nurses()
	   {
	   		$this->db->select("*")->from("nurses")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }
	   public function get_beds()
	   {
	   		$this->db->select("*")->from("beds")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function update_nurse($data)
	   {
			$id=$data['hidden_id'];
	   		$real_pass=$data['password'];
	   		$data['unhash_password']=$real_pass;
	   		$email=$data['email'];
	   		$hash_password=password_hash($real_pass,PASSWORD_DEFAULT);
			unset($data['email']);
			unset($data['hidden_id']);
			unset($data['password']);
			$profile_data=$data;
			$login_data=array('email'=>$email,'password'=>$hash_password);
	   		$res=$this->db->where('id', $id)->update('nurses',$profile_data) && $this->db->where(['profile_id'=>$id,'type'=>'nurse'])->update('users',$login_data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }
	   public function add_nurse($data)
	   {
	   		$real_pass=$data['password'];
			$email=$data['email'];
	   		$data['unhash_password']=$data['password'];
	   		unset($data['password']);
	   		unset($data['email']);
	   		$profile_data=$data;
	   		$res1=$this->db->insert('nurses',$profile_data);
	   		$id = $this->db->insert_id();
	   		$login_data=['email'=>$email,'password'=>password_hash($real_pass,PASSWORD_DEFAULT),'type'=>'nurse','profile_id'=>$id];
	   		$res2=$this->db->insert('users',$login_data);
	   		return $res1 && $res2;
	   }

	   public function delete_nurse($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('nurses', array('id' =>$id)) && $this->db->delete('users', array('profile_id' =>$id,'type'=>'nurse'));
	   }
	   
	   //Nurses fns

	   // pharmacists fns
	   public function getpharmacistby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('pharmacists', array('id' =>$id))->row();
	   }
	   public function get_pharmacists()
	   {
	   		$this->db->select("*")->from("pharmacists")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function update_pharmacist($data)
	   {
			$id=$data['hidden_id'];
	   		$real_pass=$data['password'];
	   		$data['unhash_password']=$real_pass;
	   		$email=$data['email'];
	   		$hash_password=password_hash($real_pass,PASSWORD_DEFAULT);
			unset($data['email']);
			unset($data['hidden_id']);
			unset($data['password']);
			$profile_data=$data;
			$login_data=array('email'=>$email,'password'=>$hash_password);
	   		$res=$this->db->where('id', $id)->update('pharmacists',$profile_data) && $this->db->where(['profile_id'=>$id,'type'=>'pharmacist'])->update('users',$login_data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }
	   public function add_pharmacist($data)
	   {
	   		$real_pass=$data['password'];
			$email=$data['email'];
	   		$data['unhash_password']=$data['password'];
	   		unset($data['password']);
	   		unset($data['email']);
	   		$profile_data=$data;
	   		$res1=$this->db->insert('pharmacists',$profile_data);
	   		$id = $this->db->insert_id();
	   		$login_data=['email'=>$email,'password'=>password_hash($real_pass,PASSWORD_DEFAULT),'type'=>'pharmacist','profile_id'=>$id];
	   		$res2=$this->db->insert('users',$login_data);
	   		return $res1 && $res2;
	   }

	   public function delete_pharmacist($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('pharmacists', array('id' =>$id)) && $this->db->delete('users', array('profile_id' =>$id,'type'=>'pharmacist'));
	   }
	   
	   //pharmacists fns

	   // laboratorists funs

	   public function getlaboratoristby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('laboratorists', array('id' =>$id))->row();
	   }
	   public function get_laboratorists()
	   {
	   		$this->db->select("*")->from("laboratorists")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function update_laboratorist($data)
	   {
			$id=$data['hidden_id'];
	   		$real_pass=$data['password'];
	   		$data['unhash_password']=$real_pass;
	   		$email=$data['email'];
	   		$hash_password=password_hash($real_pass,PASSWORD_DEFAULT);
			unset($data['email']);
			unset($data['hidden_id']);
			unset($data['password']);
			$profile_data=$data;
			$login_data=array('email'=>$email,'password'=>$hash_password);
	   		$res=$this->db->where('id', $id)->update('laboratorists',$profile_data) && $this->db->where(['profile_id'=>$id,'type'=>'laboratorist'])->update('users',$login_data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }
	   public function add_laboratorist($data)
	   {
	   		$real_pass=$data['password'];
			$email=$data['email'];
	   		$data['unhash_password']=$data['password'];
	   		unset($data['password']);
	   		unset($data['email']);
	   		$profile_data=$data;
	   		$res1=$this->db->insert('laboratorists',$profile_data);
	   		$id = $this->db->insert_id();
	   		$login_data=['email'=>$email,'password'=>password_hash($real_pass,PASSWORD_DEFAULT),'type'=>'laboratorist','profile_id'=>$id];
	   		$res2=$this->db->insert('users',$login_data);
	   		return $res1 && $res2;
	   }

	   public function delete_laboratorist($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('laboratorists', array('id' =>$id)) && $this->db->delete('users', array('profile_id' =>$id,'type'=>'laboratorist'));
	   }
	   //laboratorists fns

	   //Accountant fns

	   public function getaccountantby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('accountants', array('id' =>$id))->row();
	   }
	   public function get_accountants()
	   {
	   		$this->db->select("*")->from("accountants")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function update_accountant($data)
	   {
			$id=$data['hidden_id'];
	   		$real_pass=$data['password'];
	   		$data['unhash_password']=$real_pass;
	   		$email=$data['email'];
	   		$hash_password=password_hash($real_pass,PASSWORD_DEFAULT);
			unset($data['email']);
			unset($data['hidden_id']);
			unset($data['password']);
			$profile_data=$data;
			$login_data=array('email'=>$email,'password'=>$hash_password);
	   		$res=$this->db->where('id', $id)->update('accountants',$profile_data) && $this->db->where(['profile_id'=>$id,'type'=>'accountant'])->update('users',$login_data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }
	   public function add_accountant($data)
	   {
	   		$real_pass=$data['password'];
			$email=$data['email'];
	   		$data['unhash_password']=$data['password'];
	   		unset($data['password']);
	   		unset($data['email']);
	   		$profile_data=$data;
	   		$res1=$this->db->insert('accountants',$profile_data);
	   		$id = $this->db->insert_id();
	   		$login_data=['email'=>$email,'password'=>password_hash($real_pass,PASSWORD_DEFAULT),'type'=>'accountant','profile_id'=>$id];
	   		$res2=$this->db->insert('users',$login_data);
	   		return $res1 && $res2;
	   }

	   public function delete_accountant($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('accountants', array('id' =>$id)) && $this->db->delete('users', array('profile_id' =>$id,'type'=>'accountant'));
	   }



	   //Accountant fns

	   //receptionists fns

	   public function getreceptionistby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('receptionists', array('id' =>$id))->row();
	   }
	   public function get_receptionists()
	   {
	   		$this->db->select("*")->from("receptionists")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function update_receptionist($data)
	   {
			$id=$data['hidden_id'];
	   		$real_pass=$data['password'];
	   		$data['unhash_password']=$real_pass;
	   		$email=$data['email'];
	   		$hash_password=password_hash($real_pass,PASSWORD_DEFAULT);
			unset($data['email']);
			unset($data['hidden_id']);
			unset($data['password']);
			$profile_data=$data;
			$login_data=array('email'=>$email,'password'=>$hash_password);
	   		$res=$this->db->where('id', $id)->update('receptionists',$profile_data) && $this->db->where(['profile_id'=>$id,'type'=>'receptionist'])->update('users',$login_data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }
	   public function add_receptionist($data)
	   {
	   		$real_pass=$data['password'];
			$email=$data['email'];
	   		$data['unhash_password']=$data['password'];
	   		unset($data['password']);
	   		unset($data['email']);
	   		$profile_data=$data;
	   		$res1=$this->db->insert('receptionists',$profile_data);
	   		$id = $this->db->insert_id();
	   		$login_data=['email'=>$email,'password'=>password_hash($real_pass,PASSWORD_DEFAULT),'type'=>'receptionist','profile_id'=>$id];
	   		$res2=$this->db->insert('users',$login_data);
	   		return $res1 && $res2;
	   }

	   public function delete_receptionist($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		return $this->db->delete('receptionists', array('id' =>$id)) && $this->db->delete('users', array('profile_id' =>$id,'type'=>'receptionist'));
	   }


	   //receptionists fns


	   //facilities fns

	   public function get_facilities($id)
	   {
	   		$this->db->select("*")->from("department_facilities")->where(['status'=>1,'department_id'=>$id]);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function getfacilityby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('department_facilities', array('id' =>$id))->row();
	   }

	   public function add_facility($data)
	   {
	   		$data['response']=$this->db->insert('department_facilities',$data);
	   		$data['dept_name']=$this->getdeptby_id($data['department_id'])->name;
	   		return $data;
	   }

	   public function delete_facility($id)
	   {
	   		if($id==0)
	   			return 0;
	   		else
	   		{
	   			$dept_id=$this->getfacilityby_id($id)->department_id;
	   			$data['response']=$this->db->delete('department_facilities', array('id' =>$id));  			
	   			$data['dept_name']=$this->getdeptby_id($dept_id)->name;
	   			$data['dept_id']=$dept_id;
	   			return $data;
	   		}

	   	}


	   	public function update_facility($data)
	   {
	   		$id=$data['hidden_id'];
	   		unset($data['hidden_id']);
	   		$dept_id=$this->getfacilityby_id($id)->department_id;
	   		$data['department_id']=$dept_id; 	
	   		$res=$this->db->where('id',$id)->update('department_facilities',$data);
	   		if($res){
				$data['response']=1;	 			
	   			$data['dept_name']=$this->getdeptby_id($dept_id)->name;
	   			return $data;
			}
			else
				return 0;
	   }
	   public function addbedallotment($data)
	   {
	   		$data['doctor_id']=$_SESSION['PROFILE_ID'];
	   		return $this->db->insert('bed_allotments',$data);
	   }
	   //facilities fns

	   public function get_bedallotments()
	   {
	   		   $this->db->select("*")->from("bed_allotments")->where('status',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function getBedby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('beds', array('bed_number' =>$id))->row();
	   }

	    public function update_bedallotment($data)
	   {
			$id=$data['hidden_id'];
			unset($data['hidden_id']);
	   		$res=$this->db->where('id',$id)->update('bed_allotments',$data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }

	    public function update_appointment($data)
	   {
			$id=$data['hidden_id'];
			unset($data['hidden_id']);
	   		$res=$this->db->where('id',$id)->update('appointments',$data);
	   		if($res){
				return 1;
			}
			else
				return 0;
	   }

	   public function get_appointments()
	   {
	   		$this->db->select("*")->from("appointments")->where('status',1)->where('is_requested',0);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }
	   public function get_requested_appointments()
	   {
	   		$this->db->select("*")->from("appointments")->where('status',1)->where('is_requested',1);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function getappointmentby_id($id)
	   {
	   		if($id==0)
		   		return 0;
		   	else
		   	return $this->db->get_where('appointments', array('id' =>$id))->row();
	   }

	   public function get_reports($type)
	   {
	   		$this->db->select("*")->from("reports")->where('status',1)->where('type',$type);
			   $query = $this->db->get();        	   
		   	   return $query->result();
	   }

	   public function encryption($data)
		{
			return openssl_encrypt($data,"AES-128-CTR","email_encryption",0,'1234567891011121');
		}

		public function decryption($data)
		{
			$data=str_replace(' ','+',$data);
			return openssl_decrypt($data,"AES-128-CTR","email_encryption",0,'1234567891011121');
		}

		public function add_prescription($data)
		{
			unset($data['files']);
			$data['doctor_id']=$_SESSION['PROFILE_ID'];
	   		$res2=$this->db->insert('prescriptions',$data);
	   		return $res2;	 
		}
		public function get_no_of_diagnosis_reports($pid)
		{
			$query = $this->db->query("SELECT count(*) AS reports FROM `diagnosis_reports` WHERE patient_id=".$pid);
    		return $query->result()[0]->reports;
		}

		public function get_no_of_prescriptions($pid)
		{
			$query = $this->db->query("SELECT count(*) AS prescriptions FROM `prescriptions` WHERE patient_id=".$pid);
    		return $query->result()[0]->prescriptions;
		}
		public function get_total_msgs_with_patient($pid)
        {
            $query = $this->db->query("SELECT count(msg) AS total_msgs FROM `chats` WHERE patient_id=".$pid." && doctor_id=".$_SESSION['PROFILE_ID'] );
            return $query->result()[0]->total_msgs;
        }
        public function get_total_msgs_with_doctor($did)
        {
            $query = $this->db->query("SELECT count(msg) AS total_msgs FROM `chats` WHERE patient_id=".$_SESSION['PROFILE_ID']." && doctor_id=".$did);
            return $query->result()[0]->total_msgs;
        }
        public function set_status_online()
        {
            if($_SESSION['IDENTITY_WHO_LOGINS']=='doctor'){
                return $this->db->where('id',$_SESSION['ID'])->update('users',array('online_status'=>1));
            }
            else if($_SESSION['IDENTITY_WHO_LOGINS']=='patient'){
                return $this->db->where('id',$_SESSION['ID'])->update('users',array('online_status'=>1));
            }
        }
        public function set_status_offline()
        {
            if($_SESSION['IDENTITY_WHO_LOGINS']=='doctor'){
                return $this->db->where('id',$_SESSION['ID'])->update('users',array('online_status'=>0));
            }
            else if($_SESSION['IDENTITY_WHO_LOGINS']=='patient'){
                return $this->db->where('id',$_SESSION['ID'])->update('users',array('online_status'=>0));
            }
        }
        public function check_patient_online_status($pid)
        {
            $query = $this->db->query("SELECT online_status FROM `users` WHERE profile_id=" . $pid . " && type='patient'");
            return $query->result()[0]->online_status;
        }
        public function check_doctor_online_status($did)
        {
            $query = $this->db->query("SELECT online_status FROM `users` WHERE profile_id=".$did ." && type='doctor'");
            return $query->result()[0]->online_status;
        }

        public function get_all_chat($pid,$did)
        {
            $this->db->select("*")->from("chats")->where(['patient_id'=>$pid,'doctor_id'=>$did]);
            $query = $this->db->get();
            return $query->result();
        }

        public function get_unread_msgs_for_doctor($pid)
        {
            $query = $this->db->query("SELECT count(*) AS unread_msgs FROM `chats` WHERE patient_id=".$pid ." && doctor_id=".$_SESSION['PROFILE_ID'].
                " && send_by='patient' && recieved_by='doctor' && status=0");
            return $query->result()[0]->unread_msgs;
        }

        public function get_unread_msgs_for_patient($did)
        {
            $query = $this->db->query("SELECT count(*) AS unread_msgs FROM `chats` WHERE patient_id=".$_SESSION['PROFILE_ID'] ." && doctor_id=".$did.
                " && send_by='doctor' && recieved_by='patient' && status=0");
            return $query->result()[0]->unread_msgs;
        }

        public function set_msg_status_read_for_doctor($pid)
        {
           return $this->db->where(['doctor_id'=>$_SESSION['PROFILE_ID'],'patient_id'=>$pid,'send_by'=>'patient','recieved_by'=>'doctor'])->update('chats',['status'=>1]);
        }

        public function set_msg_status_read_for_patient($did)
        {
            return $this->db->where(['doctor_id'=>$did,'patient_id'=>$_SESSION['PROFILE_ID'],'send_by'=>'doctor','recieved_by'=>'patient'])->update('chats',['status'=>1]);
        }

        public function get_all_chat_with_doctor($did,$pid)
        {
            $this->db->select("*")->from("chats")->where(['patient_id'=>$pid,'doctor_id'=>$did]);
            $query = $this->db->get();
            return $query->result();
        }

        public function check_add_review_btn($pid,$did)
        {
            $query = $this->db->query("SELECT * FROM `ratings` where doctor_id='{$did}' && patient_id='{$pid}'");
            return $query->num_rows();
        }
        public function get_diagnosis_reports_by_doctor($did){
            $query = $this->db->query("SELECT count(*) AS 'dia_reports' FROM `diagnosis_reports` where doctor_id='{$did}'");
            return $query->result()[0]->dia_reports;
        }
        public function get_prescriptions_by_doctor($did){
            $query = $this->db->query("SELECT count(patient_id) AS 'pres' from prescriptions where doctor_id='{$did}'");
            return $query->result()[0]->pres;
        }
    public function get_doctor_feedbacks($did){
        $query = $this->db->query("SELECT count(doctor_id) AS 'feedback' FROM ratings WHERE doctor_id='{$did}'");
        return $query->result()[0]->feedback;
    }
	public function get_system_settings()
	{
		$this->db->select("*")->from("settings")->where(['id'=>1]);
            $query = $this->db->get();
            return $query->result()[0];
	}


	  
	}
