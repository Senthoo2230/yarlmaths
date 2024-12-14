<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User_controller extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('User_model'); // Load User_model for database operations
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
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
    $this->form_validation->set_rules('role', 'Role', 'required|in_list[1,2,3]');
    if ($this->form_validation->run() == FALSE) {
        // Load the register view if validation fails
        $this->load->view('header');
        $this->load->view('register');
        $this->load->view('footer');
    }
}
        
}
        
/* End of file  User_controller.php */
        
                            