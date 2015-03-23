<?

class Core_model {
    
    public function __construct() {
        
        
        
    }
    
    public function fetch_result($db_result) {
        
        $result = array();
        
        if ($db_result->num_rows) {
            
            while ($row = $db_result->fetch_object()) {
                
                $result[] = $row;
                
            }
            
        }
        
        return $result;
        
    }
    
}