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
    public function dashboard()
{
    // Initialize the $medium_text array
    $medium_text = [];

    // Query the medium table to fetch all records
    $query = $this->db->get('medium');

    // Check if the query returned any results
    if ($query && $query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $medium_text[$row->id] = $row->medium;
        }
    } else {
        log_message('error', 'No data found in the medium table or query failed.');
    }

    // Assign the medium_text array to the $data array
    $data['medium_text'] = $medium_text;

    // Fetch the recent 5 uploads using the Admin_model
    $this->load->model('Admin_model'); // Ensure the Admin_model is loaded
    $data['papers'] = $this->Admin_model->get_recent_papers();

    // Load the views with the data
    $this->load->view('layout/header', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('layout/footer', $data);
}

    // Handles user logout
    public function logout() {
        $this->session->unset_userdata('user_data');
        $this->session->sess_destroy();
        redirect('admin');
    }

    // Loads the file upload page
    public function upload() {
        $data['mediums'] = $this->Admin_model->get_mediums();
        $this->load->view('layout/header',$data);
        $this->load->view('admin/upload',$data);
        $this->load->view('layout/footer',$data);
    }

    // Handles file uploads and saves them
    public function upload_paper() {
        $medium = $this->input->post('medium');
        $grade = $this->input->post('grade');
        $term = $this->input->post('term');
        $year = $this->input->post('year');
        $name = $this->input->post('name');

        // Query the medium table to fetch the name for the given ID
        $query = $this->db->get_where('medium', ['id' => $medium]);
        if ($query->num_rows() > 0) {
            $medium_text = $query->row()->medium; // Assuming the column name in the table is 'medium'
        } else {
            $medium_text = "Unknown"; // Default value if no matching record found
        }

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
            $new_file_name = $name . "_" . $year . "_" . $grade . "_" . $medium_text . "_" . $term_text . $uploadData['file_ext'];
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

    
   

}

/* End of file Admin_controller.php */
