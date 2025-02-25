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
 
// Handles file downloads
public function download($medium, $grade, $term) {
    // Load the medium data from the database
    $query = $this->db->get('medium');
    $medium_map = [];
    
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            // Create a mapping of the medium name (lowercased) to its ID
            $medium_map[strtolower($row->medium)] = $row->id;
        }
    }

    // Map terms to their IDs
    $term_map = [
        'I' => 1,
        'II' => 2,
        'III' => 3
    ];

    // Find the IDs for medium and term
    $medium_id = $medium_map[strtolower($medium)] ?? null;
    $term_id = $term_map[$term] ?? null;

    // Validate the IDs
    if ($medium_id === null || $term_id === null) {
        show_error("Invalid medium or term provided.", 400);
        return;
    }

    // Pass the parameters to the view
    $data['medium'] = $medium;
    $data['grade'] = $grade;
    $data['term'] = $term;

    // Load the User model and fetch the relevant records
    $this->load->model('User_model');
    $data['records'] = $this->User_model->getRecentData($medium_id, $grade, $term_id);

    // Load the views
    $this->load->view('layout/header');
    $this->load->view('user/download', $data);
    $this->load->view('layout/footer');
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





        
}
        
/* End of file  User_controller.php */
        
                            