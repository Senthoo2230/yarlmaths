<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model'); // Load User_model for database operations
        $this->load->library('upload');
    }

    // Handles user login
    public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('layout/header');
        $this->load->view('admin/login');
        $this->load->view('layout/footer');
    }

    // Loads the registration page
    public function register() {
        $this->load->view('layout/header');
        $this->load->view('admin/register');
        $this->load->view('layout/footer');
    }

    // Handles user registration
    public function signup() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[1,2,3]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('register');
            $this->load->view('footer');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => $this->input->post('role'),
            ];

            if ($this->Admin_model->register_user($data)) {
                $this->session->set_flashdata('success', 'Registration successful!');
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                redirect('admin/register');
            }
        }
    }

    // Handles user sign-in
    public function signin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->input->post('username', TRUE);
            $password = md5($this->input->post('password', TRUE));
            $user = $this->Admin_model->get_user_by_username_password($username, $password);

            if ($user) {
                $session_data = [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);
                redirect('admin/dashboard');
            } else {
                $data['error'] = "Invalid Username or Password";
                $this->load->view('layout/header');
                $this->load->view('admin/login', $data);
                $this->load->view('layout/footer');
            }
        }
    }

    // Dashboard Ui
    public function dashboard(){
        // Fetch the recent 5 uploads
        $data['papers'] = $this->Admin_model->get_recent_papers();
        $this->load->view('layout/header',$data);
        $this->load->view('admin/ashboard',$data);
        $this->load->view('layout/footer',$data);
    }

    // Handles user logout
    public function logout() {
        $this->session->unset_userdata('user_data');
        $this->session->sess_destroy();
        redirect('admin');
    }

    // Loads the file upload page
    public function upload() {
        $this->load->view('layout/header');
        $this->load->view('admin/upload');
        $this->load->view('layout/footer');
    }

    // Handles file uploads and saves them
    public function upload_paper() {
        $medium = $this->input->post('medium');
        $grade = $this->input->post('grade');
        $term = $this->input->post('term');
        $filename = $this->input->post('filename');
        $year = $this->input->post('year');
        $name = $this->input->post('name');

        $medium_text = $medium == 1 ? "English" : ($medium == 2 ? "Sinhala" : "Tamil");
        $term_text = $term == 1 ? "I" : ($term == 2 ? "II" : "III");

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
        $config['max_size'] = 2048;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            echo '<p style="color:red;">File Upload Failed: ' . $error . '</p>';
        } else {
            $uploadData = $this->upload->data();
            $new_file_name = $filename . "_" . $year . "_" . $grade . "_" . $medium_text . "_" . $term_text . $uploadData['file_ext'];
            $new_file_path = $config['upload_path'] . $new_file_name;

            rename($uploadData['full_path'], $new_file_path);

            $data = [
                'name' => $name,
                'medium' => $medium,
                'grade' => $grade,
                'term' => $term,
                'year' => $year,
                'file_name' => $new_file_name,
                'file_path' => $new_file_path,
            ];

            $this->Admin_model->insert_paper($data);
            $this->session->set_flashdata('success', 'File uploaded and saved successfully!');
            redirect('admin/papers');
        }
    }

    // Serves a file for download
    public function serveFile($fileId) {
        $file = $this->User_model->getFileById($fileId);

        if (!$file) {
            show_404();
        }

        $filePath = './uploads/' . $file['file_name'];

        if (file_exists($filePath)) {
            $this->load->helper('download');
            force_download($filePath, null);
        } else {
            show_404();
        }
    }

    // Handles file downloads
    public function download($medium, $grade, $term) {
        $data['medium'] = $medium;
        $data['grade'] = $grade;
        $data['term'] = $term;

        $medium_map = [
            'sinhala' => 1,
            'english' => 2,
            'tamil' => 3
        ];

        $term_map = [
            'I' => 1,
            'II' => 2,
            'III' => 3
        ];

        $medium_id = $medium_map[$medium] ?? null;
        $term_id = $term_map[$term] ?? null;

        if ($medium_id === null || $term_id === null) {
            show_error("Invalid medium or term provided.", 400);
            return;
        }

        $this->load->model('User_model');
        $data['records'] = $this->User_model->getRecentData($medium_id, $grade, $term_id);

        $this->load->view('header');
        $this->load->view('download', $data);
        $this->load->view('footer');
    }

}

/* End of file Admin_controller.php */
