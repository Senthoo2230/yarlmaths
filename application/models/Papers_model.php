<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Papers_model extends CI_Model {
                        
    public function get_recent_papers()
    {
        $this->db->select('id, medium, grade, term, name, uploaded_at');
        $this->db->from('papers');
        $this->db->order_by('uploaded_at', 'DESC'); // Sort by most recent
        $this->db->limit(5); // Limit to 5 records
        return $this->db->get()->result_array();
    }
                        
                            
                        
}
                        
/* End of file Papers_model.php */
    
                        