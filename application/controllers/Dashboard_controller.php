<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dashboard_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model'); // Load User_model for database operations
        $this->load->model('Papers_model');
        $this->load->library('upload');
    }

    public function dashboard(){
        // Fetch the recent 5 uploads
        $data['papers'] = $this->Papers_model->get_recent_papers();

        $this->load->view('header',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('footer',$data);
    }
        
}
        
    /* End of file  Dashboard_controller.php */
        
                            