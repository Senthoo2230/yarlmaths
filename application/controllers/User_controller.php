<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User_controller extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('User_model'); // Load User_model for database operations
    $this->load->library('upload');
}

public function index(){
    $this->load->view('layout/header');
    $this->load->view('user/home');
    $this->load->view('layout/footer');  
}

public function medium(){
    $this->load->view('layout/header');
    $this->load->view('user/medium');
    $this->load->view('layout/footer');
}

public function grade($medium){
    $data['medium'] = $medium;
    $this->load->view('layout/header');
    $this->load->view('user/grade',$data);
    $this->load->view('layout/footer');
}

public function term($medium,$grade){
    $data['medium'] = $medium;
    $data['grade'] = $grade;
    $this->load->view('layout/header');
    $this->load->view('user/term',$data);
    $this->load->view('layout/footer');
}



        
}
        
/* End of file  User_controller.php */
        
                            