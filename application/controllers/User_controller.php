<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User_controller extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('User_model'); // Load User_model for database operations
    $this->load->library('upload');
}

public function index(){
    $this->load->view('header');
    $this->load->view('home');
    $this->load->view('footer');  
}

public function medium(){
    $this->load->view('header');
    $this->load->view('medium');
    $this->load->view('footer');
}

public function grade($medium){
    $data['medium'] = $medium;
    $this->load->view('header');
    $this->load->view('grade',$data);
    $this->load->view('footer');
}

public function term($medium,$grade){
    $data['medium'] = $medium;
    $data['grade'] = $grade;
    $this->load->view('header');
    $this->load->view('term',$data);
    $this->load->view('footer');
}

public function download($medium,$grade,$term){
    $data['medium'] = $medium;
    $data['grade'] = $grade;
    $data['term'] = $term;
    $this->load->view('header');
    $this->load->view('download',$data);
    $this->load->view('footer');
}

public function login(){
    // Check if the user is already logged in
    if ($this->session->userdata('logged_in')) {
        redirect('dashboard'); // Redirect to the dashboard if logged in
    }
    $this->load->view('header');
    $this->load->view('login');
    $this->load->view('footer');
}

public function register(){
    $this->load->view('header');
    $this->load->view('register');
    $this->load->view('footer');
}

public function signup(){
    // Set validation rules
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
    $this->form_validation->set_rules('role', 'Role', 'required|in_list[1,2,3]');
    if ($this->form_validation->run() == FALSE) {
        // Load the register view if validation fails
        $this->load->view('header');
        $this->load->view('register');
        $this->load->view('footer');
    }
    else {
        // Get form data
        $data = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')), // Hash password with MD5
            'role' => $this->input->post('role'),
        ];

        // Insert user into the database
        if ($this->User_model->register_user($data)) {
            $this->session->set_flashdata('success', 'Registration successful!');
            redirect('admin'); // Redirect to login or another page
        } else {
            $this->session->set_flashdata('error', 'Registration failed. Please try again.');
            redirect('admin/register'); // Redirect back to the register page
        }
    }
}

public function signin() {
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form input
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE)); // Hash the password

        // Validate user credentials
        $user = $this->User_model->get_user_by_username_password($username, $password);

        if ($user) {
            // Set session data
            $session_data = [
                'user_id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($session_data);

            // Redirect based on role or to a dashboard
            redirect('dashboard'); // Replace 'dashboard' with your desired URL
        } else {
            // Invalid login
                $data['error'] = "Invalid Username or Password";
                $this->load->view('header');
                $this->load->view('login',$data);
                $this->load->view('footer');
        }
    }
}

public function dashboard(){
    $this->load->view('header');
    $this->load->view('dashboard');
    $this->load->view('footer');
}

public function papers(){
    $this->load->view('header');
    $this->load->view('papers');
    $this->load->view('footer');
}

public function logout() {
    // Destroy session
    $this->session->unset_userdata('user_data');
    $this->session->sess_destroy();

    // Redirect to login page
    redirect('admin');
}

public function upload(){
    $this->load->view('header');
    $this->load->view('upload');
    $this->load->view('footer');
}

public function upload_paper(){
     // Fetch form data
     $medium = $this->input->post('medium');
     $grade = $this->input->post('grade');
     $term = $this->input->post('term');

     // Configure upload settings
     $config['upload_path'] = './uploads/';
     $config['allowed_types'] = 'pdf|doc|docx|jpg|png'; // Allowed file types
     $config['max_size']      = 2048; // Max size in KB (2MB)

     $this->upload->initialize($config);

     if (!$this->upload->do_upload('file')) {
        // Handle upload error
        $error = $this->upload->display_errors();
        echo '<p style="color:red;">' . $error . '</p>';
    } else {
        // File uploaded successfully
        $uploadData = $this->upload->data();

        // Save file and form information in the database
        $data = [
            'medium'    => $medium,
            'grade'     => $grade,
            'term'      => $term,
            'file_name' => $uploadData['file_name'],
            'file_path' => './uploads/' . $uploadData['file_name'],
        ];

        $this->User_model->insert_paper($data);

        echo '<p style="color:green;">File uploaded successfully!</p>';
    }
}

public function test(){
    if (is_dir('./uploads/') && is_writable('./uploads/')) {
        echo "Upload folder exists and is writable.";
    } else {
        echo "Upload folder is missing or not writable.";
    }
}
        
}
        
/* End of file  User_controller.php */
        
                            