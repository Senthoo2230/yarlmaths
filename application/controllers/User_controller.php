<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User_controller extends CI_Controller {

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
        
}
        
/* End of file  User_controller.php */
        
                            