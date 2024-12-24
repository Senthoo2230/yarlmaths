<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dashboard_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model'); // Load User_model for database operations
        $this->load->model('Papers_model');
        $this->load->library('upload');
    }

    
        
}
        
    /* End of file  Dashboard_controller.php */
        
                            