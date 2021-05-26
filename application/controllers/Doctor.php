<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Doctor extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->helper('url');
        $this->load->model('Admin_model');
        $this->load->model('Doctor_model');
        if (!isset($_SESSION['IDENTITY_WHO_LOGINS']) && !isset($_SESSION['LOGGED_IN']) && !isset($_SESSION['ID'])) {
            $this->session->set_flashdata('failure', 'Access Denied ! Please Log In First!');
            redirect('index.php/home/login', 'refresh');
        }
    }
    public function dashboard()
    {
        $this->load->view('Backend/Doctor/dashboard');
    }
    public function appointment_list()
    {
        $appointments = (object)$this->Admin_model->get_appointments();
        $this->load->view('Backend/Doctor/Appointment/Appointment_list', compact('appointments'));
    }
    public function requested_appointment()
    {
        $this->load->view('Backend/Doctor/Appointment/Requested_Appointment');
    }
    public function prescription()
    {
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $this->db->select("*")->from("prescriptions")->where('patient_id', $pid);
            $prescriptions = $this->db->get()->result();
        } else {
            $prescriptions = (object)$this->Admin_model->get_prescriptions();
        }
        $this->load->view('Backend/Doctor/prescription', compact('prescriptions'));
    }

    // pateint crud operations
    public function patients()
    {
        $records = (object)$this->Admin_model->get_patients();
        $this->load->view('Backend/Doctor/patients', compact('records'));
    }
    public function addpatient($flag = 'add', $id = 0)
    {
        if ($flag == 'add') {
            $record = (object)[
                'name' => '', 'email' => '', 'password' => '',
                'address' => '', 'phone' => '',
                'gender_id' => 0, 'blood_group_id' => 0,
                'icon' => '', 'birth_date' => '', 'age' => '',
            ];
            $this->load->view('Backend/Doctor/forms/addpatient', compact('record'));
        } else {

            if ($record = $this->Admin_model->getpatientby_id($id)) {
                $record = (object)[
                    'name' => $record->name,
                    'email' => $this->Admin_model->get_login_details($id, 'patient')->email,
                    'password' => $record->unhash_password,
                    'address' => $record->address,
                    'phone' => $record->phone,
                    'icon' => $record->icon,
                    'age' => $record->age,
                    'birth_date' => $record->birth_date,
                    'blood_group_id' => $record->blood_group,
                    'gender_id' => $record->gender,
                    'hidden_id' => $record->id,
                ];
                $this->load->view('Backend/Doctor/forms/addpatient', compact('record'));
            }
        }
    }
    public function manage_patients()
    {
        if (isset($_POST['hidden_id'])) {
            $unique_chk_email = '';
            $unique_chk_phone = '';
        } else {
            $unique_chk_email = "|is_unique[users.email]";
            $unique_chk_phone = "|is_unique[patients.phone]";
        }
        $this->form_validation->set_rules('name', 'Patient Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Patient email', 'trim|required' . $unique_chk_email);

        $this->form_validation->set_rules('password', 'Patient password', 'trim|required');
        $this->form_validation->set_rules('address', 'Patient Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Patient Phone', 'trim|required|numeric' . $unique_chk_phone);

        $this->form_validation->set_rules('birth_date', 'Birth Date', 'trim|required');

        $this->form_validation->set_rules('age', 'Age', 'trim|required|numeric');

        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('blood_group', 'Blood Group', 'trim|required');

        $old_img_path = $this->input->post('old_img');
        $post = $this->input->post();
        $logo = $_FILES['icon']['name'];
        if ($logo != '') {
            $config['upload_path']          = './assets/uploads/patients/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('icon')) {
                $data = $this->upload->data();
                $post['icon'] = base_url('assets/uploads/patients/' . $data['raw_name'] . $data['file_ext']);
            } else {

                $upload_errors = $this->upload->display_errors();
                $this->load->view('Backend/Doctor/forms/addpatient', compact('upload_errors'));
            }
        } else {
            if ($old_img_path != '') {
                $post['icon'] = $old_img_path;
            } else {
                $post['icon'] = '';
            }
        }
        if (isset($_POST['hidden_id'])) {
            if ($this->form_validation->run()) {
                unset($post['old_img']);
                $res = $this->Admin_model->update_patient($post);
                if ($res) {
                    $this->session->set_flashdata('success', 'Patient Updated');
                } else {
                    $this->session->set_flashdata('success', 'Patient Not Updated');
                }
                redirect('index.php/doctor/patients', 'refresh');
            } else {
                $hidden_id = $_POST['hidden_id'];
                $record = (object)[
                    'gender_id' => set_value('gender'),
                    'blood_group_id' => set_value('blood_group'),
                    'hidden_id' => $hidden_id,
                ];
                $_POST['old_img'] = $post['icon'];
                $this->load->view('Backend/Doctor/forms/addpatient', compact('record'));
            }
        } else {
            if ($this->form_validation->run()) {
                unset($post['old_img']);
                $res = $this->Admin_model->add_patient($post);
                if ($res) {
                    $this->session->set_flashdata('success', 'Patient Added');
                } else {
                    $this->session->set_flashdata('success', 'Patient Not Added');
                }
                redirect('index.php/doctor/patients', 'refresh');
            } else {
                $record = (object)[
                    'gender_id' => set_value('gender'),
                    'blood_group_id' => set_value('blood_group'),
                ];

                $_POST['old_img'] = $post['icon'];
                $this->load->view('Backend/Doctor/forms/addpatient', compact('record'));
            }
        }
    }
    public function delete_patient($id = 0)
    {
        if ($this->Admin_model->delete_patient($id)) {
            $this->session->set_flashdata('success', 'Patient Deleted');
        } else {
            $this->session->set_flashdata('success', 'Patient Not Deleted');
        }
        redirect('index.php/doctor/patients', 'refresh');
    }
    public function edit_patient($id = 0)
    {
        if ($record = $this->Admin_model->getpatientby_id($id)) {
            redirect('index.php/admin/addpatients/update/' . $record->id);
        } else {
            $this->session->set_flashdata('success', 'Patient Not Exists');
        }
        redirect('index.php/admin/patients', 'refresh');
    }

    // pateint crud operations

    //bed allotment crud operations
    public function delete_bedallotment($id = 0)
    {
        if ($this->Admin_model->delete_bedallotment($id)) {
            $this->session->set_flashdata('success', 'Bed Allotment Deleted');
        } else {
            $this->session->set_flashdata('success', 'Bed Allotment Not Deleted');
        }
        redirect('index.php/doctor/bed_allotment', 'refresh');
    }
    public function edit_bedallotment($id = 0)
    {
        if ($record = $this->Admin_model->getbedallotmentby_id($id)) {
            redirect('index.php/doctor/addbedallotment/update/' . $record->id);
        } else {
            $this->session->set_flashdata('success', 'Bed Not Alloted');
        }
        redirect('index.php/doctor/bed_allotment', 'refresh');
    }
    public function bed_allotment()
    {
        $records = (object)$this->Admin_model->get_bedallotments();
        $this->load->view('Backend/Doctor/bedallotment', compact('records'));
    }
    public function addbedallotment($flag = 'add', $id = 0)
    {

        if ($flag == 'add') {
            $records = (object)[
                'beds' => $this->Admin_model->get_beds(), 'patients' => $this->Admin_model->get_patients(), 'discharge_time' => '', 'allotment_time' => '',
                'patient_id' => 0, 'bed_id' => '0'
            ];
            $this->load->view('Backend/Doctor/forms/addbedallotment', compact('records'));
        } else {
            $row = $this->Admin_model->getbedallotmentby_id($id);
            if ($row) {
                $records = (object)[
                    'beds' => $this->Admin_model->get_beds(),
                    'patients' => $this->Admin_model->get_patients(),
                    'bed_id' => $row->bed_id,
                    'patient_id' => $row->patient_id,
                    'hidden_id' => $row->id,
                    'allotment_time' => $row->allotment_time,
                    'discharge_time' => $row->discharge_time,
                ];
                $this->load->view('Backend/Doctor/forms/addbedallotment', compact('records'));
            }
        }
    }
    public function manage_bedallotments()
    {
        $post = $this->input->post();
        if (isset($_POST['hidden_id'])) {
            $res = $this->Admin_model->update_bedallotment($post);
            if ($res) {
                $this->session->set_flashdata('success', 'Bed Allotment Updated');
            } else {
                $this->session->set_flashdata('success', 'Bed Allotment Not Updated');
            }
            redirect('index.php/doctor/bed_allotment', 'refresh');
        } else {

            $res = $this->Admin_model->addbedallotment($post);
            if ($res) {
                $this->session->set_flashdata('success', 'Bed Alloted');
            } else {
                $this->session->set_flashdata('success', 'Bed Not Alloted');
            }
            redirect('index.php/doctor/bed_allotment', 'refresh');
        }
    }
    //bed allotment crud operations
    public function bloodbank()
    {
        $this->load->view('Backend/Doctor/bloodbank');
    }

    public function payroll()
    {
        $this->load->view('Backend/Doctor/payroll');
    }
    public function message()
    {
        $data['patients'] = (object)$this->Admin_model->get_patients();
        $this->load->view('Backend/Doctor/message', compact('data'));
    }
    public function profile()
    {
        $data = $this->get_combined_data();
        $this->load->view('Backend/Doctor/profile', compact('data'));
    }

    // appointment fns
    public function addappointment($flag = 'add', $id = 0)
    {
        if ($flag == 'add') {
            $record = (object)[
                'date' => '', 'time' => '', 'patient_id' => 0,
                'patients' => (object)$this->Admin_model->get_patients(),
            ];
            $this->load->view('Backend/Doctor/forms/addappointment', compact('record'));
        } else {
            if ($record = $this->Admin_model->getappointmentby_id($id)) {
                $record = (object)[
                    'date' => $record->date,
                    'time' => $record->time,
                    'patients' => (object)$this->Admin_model->get_patients(),
                    'patient_id' => $record->patient_id,
                    'hidden_id' => $record->id,
                ];
                $this->load->view('Backend/Doctor/forms/addappointment', compact('record'));
            }
        }
    }
    public function manage_appointments()
    {
        $post = $this->input->post();
        if (isset($_POST['hidden_id'])) {
            $res = $this->Admin_model->update_appointment($post);
            if ($res) {
                $this->session->set_flashdata('success', 'Appointment Updated');
            } else {
                $this->session->set_flashdata('success', 'Appointment Not Updated');
            }
            redirect('index.php/doctor/appointment_list', 'refresh');
        } else {
            $res = $this->Admin_model->add_appointment($post);
            if ($res) {
                $this->session->set_flashdata('success', 'Appointment Added');
            } else {
                $this->session->set_flashdata('success', 'Appointment Not Added');
            }
            redirect('index.php/doctor/appointment_list', 'refresh');
        }
    }
    public function delete_appointment($id = 0)
    {
        if ($this->Admin_model->delete_appointment($id)) {
            $this->session->set_flashdata('success', 'Appointment Deleted');
        } else {
            $this->session->set_flashdata('success', 'Appointment Not Deleted');
        }
        redirect('index.php/doctor/appointment_list', 'refresh');
    }
    public function edit_appointment($id = 0)
    {

        if ($record = $this->Admin_model->getappointmentby_id($id)) {
            redirect('index.php/doctor/addappointment/update/' . $record->id);
        } else {
            $this->session->set_flashdata('success', 'Appointment Not Exists');
        }
        redirect('index.php/admin/appointment_list', 'refresh');
    }

    //appointment fns

    // report fns
    public function report()
    {
        $reports = (object)[
            'operation' => $this->Admin_model->get_reports('operation_report'),
            'birth' => $this->Admin_model->get_reports('birth_report'),
            'death' => $this->Admin_model->get_reports('death_report')
        ];
        $this->load->view('Backend/Doctor/report', compact('reports'));
    }
    public function addreport($flag = 'add', $id = 0)
    {
        if ($flag == 'add') {
            $record = (object)[
                'date' => '', 'report_id' => 0, 'patient_id' => 0,
                'patients' => (object)$this->Admin_model->get_patients(),
                'description' => '',
            ];
            $this->load->view('Backend/Doctor/forms/addreport', compact('record'));
        } else {
            if ($record = $this->Admin_model->getreportby_id($id)) {
                $record = (object)[
                    'date' => $record->date, 'report_id' => $record->type, 'patient_id' => $record->patient_id,
                    'patients' => (object)$this->Admin_model->get_patients(),
                    'description' => $record->description,
                    'hidden_id' => $record->id,
                ];
                $this->load->view('Backend/Doctor/forms/addreport', compact('record'));
            }
        }
    }
    public function upload_report($path = '')
    {
        if ($path != '') {
            $config['upload_path']          = './assets/uploads/diagnosisreports';
            $config['allowed_types']        = 'pdf|word|ppt|excell|jpg|jpeg|doc';
        } else {
            $config['upload_path']          = './assets/uploads/reports';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|word|ppt|excell|txt|xml|json';
            $config['max_width']            = 0;
            $config['max_height']           = 0;
        }
        $config['max_size']             = 0;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('custom_report')) {
            $error = array('error' => $this->upload->display_errors(), 'status' => 0);
            return $error;
            exit;
        } else {
            $data = array('upload_data' => $this->upload->data(), 'status' => 1);
            return $data;
            exit;
        }
    }
    public function manage_reports()
    {
        $post = $this->input->post();
        $post['type'] = $post['report_id'];
        unset($post['report_id']);
        if (isset($_POST['hidden_id'])) {
            $res = $this->Admin_model->update_report($post);
            if ($res) {
                $this->session->set_flashdata('success', $post['type'] . ' Updated');
            } else {
                $this->session->set_flashdata('success', $post['type'] . ' Not Updated');
            }
            redirect('index.php/doctor/report', 'refresh');
        } else {
            $upload_data = $this->upload_report();
            $post['report_file_path'] = $upload_data['upload_data']['full_path'];
            $res = $this->Admin_model->add_report($post);
            if ($res) {
                $this->session->set_flashdata('success', $post['type'] . ' Added');
            } else {
                $this->session->set_flashdata('success', $post['type'] . ' Not Added');
            }
            redirect('index.php/doctor/report', 'refresh');
        }
    }

    public function edit_report($id = 0)
    {
        if ($record = $this->Admin_model->getreportby_id($id)) {
            redirect('index.php/doctor/addreport/update/' . $record->id);
        } else {
            $this->session->set_flashdata('success', 'Report Not Exists');
        }
        redirect('index.php/doctor/report', 'refresh');
    }

    //report fns





    public function bloodbankstatus()
    {
        $this->load->view('Backend/Doctor/bloodbankstatus');
    }

    public function medication_history($pid = '')
    {
        $this->load->view('Backend/Doctor/medicationhistory');
    }

    public function manage_profile()
    {
        $this->form_validation->set_rules('name', 'Doctor Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Doctor email', 'trim|required');
        $this->form_validation->set_rules('address', 'Doctor Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Doctor Phone', 'trim|required|numeric');
        $this->form_validation->set_rules('profile', 'Doctor Profile', 'trim|required');
        $old_img_path = $this->input->post('old_img');
        $post = $this->input->post();

        if (isset($_FILES['icon']['name']))
            $logo = $_FILES['icon']['name'];
        else
            $logo = '';
        if ($logo != '') {
            $config['upload_path']          = './assets/uploads/doctors/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('icon')) {
                $data = $this->upload->data();
                $post['icon'] = base_url('assets/uploads/doctors/' . $data['raw_name'] . $data['file_ext']);
            } else {
                $upload_errors = $this->upload->display_errors();
                redirect('index.php/doctor/profile?upload_errors='.$upload_errors,'refresh');
            }
        } else {
            if ($old_img_path != '') {
                $post['icon'] = $old_img_path;
            } else {
                $post['icon'] = '';
            }
        }
        if ($this->form_validation->run()) {
            $email = $post['email'];
            $profile_id = $post['hidden_id'];
            unset($post['old_img']);
            unset($post['hidden_id']);
            unset($post['email']);
            $res = $this->db->where('id', $profile_id)->update('doctors', $post) && $this->db->where(['profile_id' => $profile_id, 'type' => 'doctor'])->update('users', array('email' => $email));
            if ($res) {
                $this->session->set_flashdata('success', 'Doctors Profile Updated');
            } else {
                $this->session->set_flashdata('success', 'Doctor Profile Not Updated');
            }
            redirect('index.php/doctor/profile', 'refresh');
        } else {
            $data = (object)[
                'hidden_id' => $_POST['hidden_id'],
            ];
            $_POST['old_img'] = $post['icon'];
            $this->load->view('Backend/Doctor/profile', compact('data'));
        }
    }

    public function edit_password()
    {
        $data = $this->Admin_model->get_row_by_id();
        $current_pass = $_POST['current_pass'];
        $new_pass = $_POST['new_pass'];
        $conf_pass = $_POST['conf_pass'];
        $data = $this->get_combined_data();
        $this->form_validation->set_rules('current_pass', 'Old Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('new_pass', 'Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('conf_pass', 'Password Confirmation', 'required|matches[new_pass]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Backend/Doctor/profile', compact('data'));
        } else {
            $chk = password_verify($current_pass, $this->Admin_model->get_row_by_id()->password);
            if ($chk)
                $this->Doctor_model->change_pass($new_pass);
            else {
                $this->session->set_flashdata('form_err_msg', 'Please Enter Valid Password');
                redirect('index.php/doctor/profile', 'refresh');
            }
        }
    }

    public function get_combined_data()
    {
        $profile = $this->Admin_model->getdoctorby_id($_SESSION['PROFILE_ID']);
        $login = $this->Admin_model->get_login_details($_SESSION['PROFILE_ID'], 'doctor');
        $data = (object)array_merge((array)$profile, (array)$login);
        return $data;
    }

    public function fetch_report()
    {
        $report_id = $_POST['id'];
        $row = $this->Admin_model->getreportby_id($report_id);
        $report = $this->Admin_model->getreport_file_by_id($report_id);
        if (!empty($report)) {
            echo '<tr><td><h3>' . str_replace('C:/xampp/htdocs/Clinic-Automation-System/assets/uploads/reports/', '', $row->report_file_path) . '</h3></td><td><a href="' . base_url('index.php/doctor/download_report?file=' . $row->report_file_path) . '" class="btn btn-sm btn-success">Download</a><a href="' . base_url('index.php/doctor/delete_report_file/' . $row->id . '?file=' . $row->report_file_path) . '" class="btn btn-sm btn-danger">Delete</a></td></tr>';
        } else {
            echo "<tr><td colspan=2 class='text-danger'>No Reports Found!</td></tr>";
        }
    }
    public function download_report()
    {
        if (isset($_GET['file'])) {
            $filename = basename($_GET['file']);
            $filepath = $_GET['file'];
            if (!empty($filename) && file_exists($filepath)) {

                header('Content-Description: File Transfer');
                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename=' . $filename);
                header('Content_Transfer-Emcoding:binary');
                header('Cache-Control: public');
                readfile($filepath);
                exit;
            } else {
                $this->session->set_flashdata('success', 'Report Not Found to Download');
                redirect('index.php/doctor/report', 'refresh');
            }
        }
    }
    public function delete_report($id = 0)
    {

        if ($this->Admin_model->delete_report($id)) {
            $this->session->set_flashdata('success', 'Report Deleted');
        } else {
            $this->session->set_flashdata('success', 'Report Not Deleted');
        }
        redirect('index.php/doctor/report', 'refresh');
    }
    public function delete_report_file($id)
    {
        $filepath = $_GET['file'];
        if (file_exists($filepath)) {
            if (unlink($filepath)) {
                $this->db->where('id', $id)->update('reports', ['report_file_path' => '']);
                $this->session->set_flashdata('success', 'Report Files Deleted');
            }
        } else {
            $this->session->set_flashdata('success', 'Report Not Found');
        }
        redirect('index.php/doctor/report', 'refresh');
    }

    //prescription fns
    public function addprescription($flag = 'add', $id = 0)
    {
        if ($flag == 'add') {
            $record = (object)[
                'date' => '', 'time' => '', 'patient_id' => 0,
                'patients' => (object)$this->Admin_model->get_patients(),
                'case_history' => '',
                'meditation' => '',
                'note' => ''
            ];
            $this->load->view('Backend/Doctor/forms/addprescription', compact('record'));
        } else {

            if ($record = $this->Admin_model->getprescriptionby_id($id)) {
                $record = (object)[
                    'date' => $record->date,
                    'time' => $record->time,
                    'patients' => (object)$this->Admin_model->get_patients(),
                    'patient_id' => $record->patient_id,
                    'case_history' => $record->case_history,
                    'meditation' => $record->meditation,
                    'note' => $record->note,
                    'hidden_id' => $record->id,
                ];
                $this->load->view('Backend/Doctor/forms/addprescription', compact('record'));
            }
        }
    }
    public function manage_prescriptions()
    {
        $this->form_validation->set_rules('case_history', 'Case History', 'trim|required');
        $this->form_validation->set_rules('meditation', 'Meditation', 'trim|required');
        $this->form_validation->set_rules('note', 'Note', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('time', 'Time', 'trim|required');
        $this->form_validation->set_rules('patient_id', 'Patient', 'trim|required');

        $post = $this->input->post();
        if (isset($_POST['hidden_id'])) {
            if ($this->form_validation->run()) {
                $res = $this->Admin_model->update_prescription($post);
                if ($res) {
                    $this->session->set_flashdata('success', 'Prescription Updated');
                } else {
                    $this->session->set_flashdata('success', 'Prescription Not Updated');
                }
                redirect('index.php/doctor/prescription', 'refresh');
            } else {

                $record = (object)[
                    'patient_id' => $_POST['patient_id'],
                    'patients' => (object)$this->Admin_model->get_patients(),
                    'hidden_id' => $_POST['hidden_id']
                ];
                $this->load->view('Backend/doctor/forms/addprescription', compact('record'));
            }
        } else {
            if ($this->form_validation->run()) {
                $res = $this->Admin_model->add_prescription($post);
                if ($res) {
                    $this->session->set_flashdata('success', 'Prescription Added');
                } else {
                    $this->session->set_flashdata('success', 'Prescription Not Added');
                }
                redirect('index.php/doctor/prescription', 'refresh');
            } else {
                $record = (object)[
                    'patient_id' => $_POST['patient_id'],
                    'patients' => (object)$this->Admin_model->get_patients(),
                ];
                $this->load->view('Backend/doctor/forms/addprescription', compact('record'));
            }
        }
    }
    public function delete_prescription($id = 0)
    {
        if ($this->Admin_model->delete_prescription($id)) {
            $this->session->set_flashdata('success', 'Prescription Deleted');
        } else {
            $this->session->set_flashdata('success', 'Prescription Not Deleted');
        }
        redirect('index.php/doctor/prescription', 'refresh');
    }
    public function edit_prescription($id = 0)
    {

        if ($record = $this->Admin_model->getprescriptionby_id($id)) {
            redirect('index.php/doctor/addprescription/update/' . $record->id);
        } else {
            $this->session->set_flashdata('success', 'Prescription Not Exists');
        }
        redirect('index.php/doctor/prescription', 'refresh');
    }

    public function findprescription()
    {
        $id = $_POST['id'];
        $prescription = (object)$this->Admin_model->getprescriptionby_id($id);
        echo '<div id="prescription_print">
                <table width="100%" border="0">
                    <tbody>
                        <tr>
                            <td align="left" valign="top"> Patient Name: ' . $this->Admin_model->getpatientby_id($prescription->patient_id)->name
            . '<br> Age: ' . $this->Admin_model->getpatientby_id($prescription->patient_id)->age . '
                                <br> Gender: ' . $this->Admin_model->getpatientby_id($prescription->patient_id)->gender . '
                                <br> </td>
                            <td align="right" valign="top"> Doctor Name: ' . $this->Admin_model->getdoctorby_id($prescription->doctor_id)->name . '
                                <br> Date: ' . date('F j, Y', strtotime($prescription->date)) . '
                                <br> Time: ' . date('h:i:s a', strtotime($prescription->time)) . '
                                <br> </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-body"> <b>Case History :</b>
                                <p>' . $prescription->case_history . '</p>
                                <hr> <b>Medication :</b>
                                <p>' . $prescription->meditation . '</p>
                                <hr> <b>Note :</b>
                                <p>' . $prescription->note . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
    //prescriptions fns

    //diagnosis report fns
    public function adddiagnosisreport()
    {
        $record = (object)[
            'date' => '', 'time' => '', 'report_type' => 0, 'report_file_type' => 0, 'description' => ''
        ];
        $this->load->view('Backend/Doctor/forms/adddiagnosisreport', compact('record'));
    }

    public function manage_diagnosis()
    {
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('time', 'Time', 'trim|required');
        $this->form_validation->set_rules('report_type', 'Report Type', 'trim|required');
        $this->form_validation->set_rules('report_file_type', 'Report File Type', 'trim|required');

        $post = $this->input->post();
        $logo = $_FILES['custom_report']['name'];
        if ($logo != '') {
            $uplaod_data = $this->upload_report('diagnosis_report');
            if ($uplaod_data['status'] == 1) {
                $post['report_file'] = $uplaod_data['upload_data']['full_path'];
            } else if ($uplaod_data['status'] == 0) {
                $error = $uplaod_data['error'];
                $this->load->view('Backend/Doctor/forms/adddiagnosisreport', compact('error'));
            }
        } else {
            $error = 'Please Upload file';
            $this->load->view('Backend/Doctor/forms/adddiagnosisreport', compact('error'));
        }
        if ($this->form_validation->run()) {
            $res = $this->Admin_model->add_diagnosis($post);
            if ($res) {
                $this->session->set_flashdata('success', 'Diagnosis Report Added');
            } else {
                $this->session->set_flashdata('success', 'Diagnosis Report Not Added');
            }
            redirect('index.php/doctor/prescription', 'refresh');
        } else {
            $record = (object)[
                'report_type' => set_value('report_type'),
                'report_file_type' => set_value('report_file_type'),
            ];

            $this->load->view('Backend/Doctor/forms/adddiagnosisreport', compact('record'));
        }
    }
    public function finddiagnosis()
    {
        $pid = $_POST['id'];
        $diagnosis = $this->Admin_model->get_diagnosis_reports($_SESSION['PROFILE_ID'], $pid);
        $count = count($diagnosis);
        if ($count > 0) {
            foreach ((object)$diagnosis as $diagnos) {
                echo '<table class="table table-bordered table-striped dataTable" id="table-2">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Report Type</th>
                                                                <th>Document Type</th>
                                                                <th>Description</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>' . $diagnos->date . ' ' . $diagnos->time . '</td>
                                                                <td>' . $diagnos->report_type . '</td>
                                                                <td>' . $diagnos->report_file_type . '</td>
                                                                <td>' . $diagnos->description . '</td>
                                                                <td>
                                                                    <a href="' . base_url('index.php/doctor/download_report?file=' . $diagnos->report_file) . '" class="btn btn-info">
                                                                        <i class="fa fa-download"></i>
                                                                    </a>
                                                                    <a href="' . base_url('index.php/doctor/delete_diagnosis/' . $diagnos->id . '?file=' . $diagnos->report_file) . '" class="btn btn-danger btn-sm">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>';
            }
        } else {
            echo '<div class="alert alert-warning">
                        <p class="text-danger">No Diagnosis Report Exits!</p>
                </div>';
        }
    }

    public function delete_diagnosis($id)
    {
        $filepath = $_GET['file'];
        unlink($filepath);
        $dia = (object)$this->Admin_model->getdiagnosisby_id($id);
        $patient = (object)$this->Admin_model->getpatientby_id($dia->patient_id);
        $this->db->delete('diagnosis_reports', array('id' => $id));
        $this->session->set_flashdata('success', 'Diagnosis Report Deleted for ' . $patient->name);
        redirect('index.php/doctor/prescription', 'refresh');
    }
    //diagnosis report fns

    public function patient_profile()
    {
        $pid = $_GET['pid'];
        $patient = (array)$this->Admin_model->getpatientby_id($pid);
        $patient['email'] = $this->db->get_where('users', array('profile_id' => $pid, 'type' => 'patient'))->row()->email;
        $this->load->view('Backend/Doctor/patient_profile', compact('patient'));
    }

    public function get_patient_chat()
    {
        $pid = $_POST['pid'];
        $msgs = $this->Admin_model->get_total_msgs_with_patient($pid);
        $html1 = '<input type="hidden" id="send_to_id" value="' . $pid . '">';
        $html2 = '';
        if ($msgs > 0) {
            $this->Admin_model->set_msg_status_read_for_doctor($pid);
            $chats = $this->Admin_model->get_all_chat($pid, $_SESSION['PROFILE_ID']);
            foreach ($chats as $chat) {
                $ordering = $chat->send_by == 'patient' && $chat->recieved_by == 'doctor' ? 'left' : 'right';
                if ($ordering == 'left') {
                    $img = $this->Admin_model->getpatientby_id($chat->patient_id)->icon;
                    $name = $this->Admin_model->getpatientby_id($chat->patient_id)->name;
                } else {
                    $img = $this->Admin_model->getdoctorby_id($chat->doctor_id)->icon;
                    $name = $this->Admin_model->getdoctorby_id($chat->doctor_id)->name;
                }
                $html2 .= '<div class="chat-message ' . $ordering . '">
                                        <img class="message-avatar" src="' . $img . '" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#">' . $name . '</a>
                                            <span class="message-date">' . date("D M d Y - h:i:s A", strtotime($chat->created_at)) . '</span>
                                            <span class="message-content">' . $chat->msg . '</span>
                                        </div>
                                    </div>';
            }
            $html2 .= $html1;
            echo $html2;
        } else {
            $html2 .= '<div class="alert alert-danger">
                   Sorry! There is no Chat with that patient
                </div>';
            $html2 .= $html1;
            echo $html2;
        }
    }

    public function insert_msg()
    {
        $msg = $_POST['msg'];
        $pid = $_POST['pid'];
        $res = $this->db->insert('chats', ['patient_id' => $pid, 'doctor_id' => $_SESSION['PROFILE_ID'], 'send_by' => 'doctor', 'recieved_by' => 'patient', 'msg' => $msg]);
        $inserted_id = $this->db->insert_id();
        if ($res) {
            $img = $this->Admin_model->getdoctorby_id($_SESSION['PROFILE_ID'])->icon;
            $name = $this->Admin_model->getdoctorby_id($_SESSION['PROFILE_ID'])->name;
            $created_at = $this->db->get_where('chats', array('id' => $inserted_id))->row()->created_at;
            echo '<div class="chat-message right">
                                        <img class="message-avatar" src="' . $img . '" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#">' . $name . '</a>
                                            <span class="message-date">' . date("D M d Y - h:i:s A", strtotime($created_at)) . '</span>
                                            <span class="message-content">' . $msg . '</span>
                                        </div>
                                    </div>';
        }
    }
    public function get_unread_msgs()
    {
        $pid = $_POST['pid'];
        $unread_msgs = $this->Admin_model->get_unread_msgs_for_doctor($pid);
        echo $unread_msgs;
    }
    public function fetch_avg_rating()
    {
        $did = $_POST['did'];
        $query = $this->db->query("SELECT AVG(stars) AS average_stars from ratings where doctor_id=" . $did);
        $stars = $query->result()[0]->average_stars;
        if ($stars != NULL) {
            echo $stars;
        } else {
            echo 0;
        }
    }
    public function setstars()
    {
        $did = $_POST['did'];
        $rating = $_POST['rating'];
        $pid = $_SESSION['PROFILE_ID'];
        //check if patient already give rating then update
        $query = $this->db->query("SELECT * FROM `ratings` where doctor_id='{$did}' && patient_id='{$pid}'");
        if ($query->num_rows() == 1) {
            //update rating
            $res = $this->db->where(['patient_id' => $pid, 'doctor_id' => $did])->update('ratings', array('stars' => $rating));
            if ($res) {
                echo "Rating Updated!";
            }
        } else {
            //add rating
            $res = $this->db->insert('ratings', ['patient_id' => $pid, 'doctor_id' => $did, 'stars' => $rating]);
            if ($res) {
                echo "Rating Added!";
            }
        }
    }
    public function fetchalldoctors()
    {
        $doctors = (array)$this->Admin_model->get_doctors();
        $html = '';
        foreach ($doctors as $doctor) {
            $html .= '<div class="col-lg-3">
            <div class="contact-box center-version">
                <a href="doctor_profile?did=' . $doctor->id . '">
                    <img alt="image" class="img-circle" src="' . $doctor->icon . '">
                    <h3 class="m-b-xs"><strong>' . $doctor->name . '</strong></h3>
                    <div class="font-bold">Doctor</div>
                    <address class="m-t-sm">
                        <center>
                            <div class="m-b-sm avg-rating rateYo" data-did="' . $doctor->id . '"></div>
                        </center>
                        <p style="margin: 0px;">' . $doctor->address . '</p>
                        <br>
                        <abbr title="Phone">P:</abbr>' . $doctor->phone . '
                    </address>
                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">';
            if ($this->Admin_model->check_add_review_btn($_SESSION['PROFILE_ID'], $doctor->id) == 1) {
                $html .= '<a class="btn btn-warning edtrat" data-toggle="modal" data-target="#edtmodal" data-ddoctorid="' . $doctor->id . '">Edit Review & Rating</a>';
            } else {
                $html .= '<a class="btn btn-primary addrat" data-ddoctorid="' . $doctor->id . '" data-toggle="modal" data-target="#myModal">Add Review & Rating</a>';
            }
            $html .= '</div>
                </div>
            </div>
        </div>';
        }
        echo $html;
    }
    public function fetch_stars()
    {
        $row = $this->db->get_where('ratings', array('doctor_id' => $_POST['did'], 'patient_id' => $_SESSION['PROFILE_ID']))->row();
        echo json_encode(['stars' => $row->stars, 'feedback' => $row->review]);
    }
    public function addfeedback()
    {
        $did = $_POST['did'];
        $pid = $_SESSION['PROFILE_ID'];
        $feedback = $_POST['feedback'];
        //check if patient already give feedback then update else add
        $query = $this->db->query("SELECT * FROM `ratings` where doctor_id='{$did}' && patient_id='{$pid}'");
        if ($query->num_rows() == 1) {
            //update feedback
            $res = $this->db->where(['patient_id' => $pid, 'doctor_id' => $did])->update('ratings', array('review' => $feedback));
            if ($res) {
                echo "Feedback Updated!";
            } else {
                echo "Feedback Not Updated!";
            }
        } else {
            //add feedback
            $res = $this->db->insert('ratings', ['patient_id' => $pid, 'doctor_id' => $did, 'review' => $feedback]);
            if ($res) {
                echo "Feedback Added!";
            } else {
                echo "Feedback Not Added";
            }
        }
    }
    public function fetch_doc_profile()
    {
        if (isset($_POST['did']) && $_POST['did'] != '') {
            $doctor = (array)$this->Admin_model->getdoctorby_id($_POST['did']);
            if (!empty($doctor)) {
                $html = '';
                $html .= '<div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Profile Detail</h5>
                                </div>
                                <div>
                                    <div class="ibox-content no-padding border-left-right">
                                        <img alt="image" class="img-responsive" src="' . $doctor['icon'] . '">
                                    </div>
                                    <div class="ibox-content profile-content">
                                        <h4><strong>' . $doctor['name'] . '</strong></h4>
                <p><i class="fa fa-map-marker"></i> ' . $doctor['address'] . '</p>
                <div id="rateYoavg"></div>
                <div class="row m-t-lg">
                    <div class="col-md-4">
                        <h5>
                            <strong>' . $this->Admin_model->get_diagnosis_reports_by_doctor($doctor['id']) . '</strong>
                            Diagnosis</h5>
                    </div>
                    <div class="col-md-4">
                        <h5>
                            <strong>' . $this->Admin_model->get_prescriptions_by_doctor($doctor['id']) . '</strong>
                            Prescription</h5>
                    </div>
                    <div class="col-md-4">
                        <h5><strong>' . $this->Admin_model->get_doctor_feedbacks($doctor['id']) . '</strong>
                            Feedbacks</h5>
                    </div>
                </div>
                <div class="user-button">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="' . site_url("index.php/patient/message") . '">
                                <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                        class="fa fa-envelope"></i> Send Message
                                </button>
                            </a>
                        </div>
                        <div class="col-md-6">';
                $btn = '';
                if ($this->Admin_model->check_add_review_btn($_SESSION['PROFILE_ID'], $doctor['id']) == 1) {
                    $btn .= '<button type="button" data-toggle="modal" data-target="#edtmodal" data-ddoctorid="' . $doctor['id'] . '" class="btn btn-warning btn-sm btn-block edtrat"><i class="fa fa-coffee"></i> Edit Review & Rating</button>';
                } else {
                    $btn .= '<button type="button" data-ddoctorid="' . $doctor['id'] . '" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-sm btn-block addrat"><i class="fa fa-coffee"></i> Add Review & Rating</button>';
                }
                $html .= $btn;
                $html .= '</div>
                    </div>
                </div>
                </div>
                </div>
                </div>';
            } else {
                $html = "Doctor Profile does not Exists";
            }
            echo $html;
        }
    }
}
