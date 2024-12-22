<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class User_model extends CI_Model {

public function __construct() {
    parent::__construct();
}    

// Function to insert a user into the database
public function register_user($data) {
    return $this->db->insert('users', $data);
}

public function get_user_by_username_password($username, $password) {
    // Query the database for user credentials
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('users'); // Replace 'users' with your table name

    if ($query->num_rows() === 1) {
        return $query->row(); // Return the user object
    }
    return FALSE; // No match found
}

public function insert_paper($data) {
    $this->db->insert('papers', $data);
}

public function getRecentData($medium, $grade, $term) {
    // Construct the query to filter and limit results
    $this->db->select('*');
    $this->db->from('papers'); // Replace with your table name
    $this->db->where('medium', $medium);
    $this->db->where('grade', $grade);
    $this->db->where('term', $term);
    $this->db->order_by('id', 'DESC'); // Assuming 'id' is the primary key
    $this->db->limit(10);

    $query = $this->db->get();
    return $query->result_array();
}

public function getFileById($fileId) {
    $this->db->where('id', $fileId);
    $query = $this->db->get('papers'); // Replace 'files' with your actual table name
    return $query->row_array(); // Return file data as an array
}

}
                        
/* End of file User_model.php */
    
                        