<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Admin_model extends CI_Model {

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

public function get_recent_papers()
    {
        $this->db->select('id, medium, grade, term, name, uploaded_at');
        $this->db->from('papers');
        $this->db->order_by('uploaded_at', 'DESC'); // Sort by most recent
        $this->db->limit(5); // Limit to 5 records
        return $this->db->get()->result_array();
    }

}
                        
/* End of file User_model.php */
    
                        