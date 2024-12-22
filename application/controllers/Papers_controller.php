<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Papers_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Papers_model'); // Load User_model for database operations
        $this->load->library('upload');
    }

    public function papers(){
        // Fetch the recent 5 uploads
        $data['papers'] = $this->Papers_model->get_recent_papers();

        $this->load->view('header',$data);
        $this->load->view('papers',$data);
        $this->load->view('footer',$data);
    }
        
}
        
    /* End of file  Papers_controller.php */
        
                            