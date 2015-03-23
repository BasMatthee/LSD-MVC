<?

class Alert_model extends Core_model {
    
    public $alerts = array();
    
    public function __construct() {
        
        parent::__construct();
        
        if (isset($_SESSION[get_config('sess')]['alerts'])) {
            
            $this->alerts = $_SESSION[get_config('sess')]['alerts'];
            
        }
        
    }
    
    public function set_alert($alert,$alert_type='success') {
        
        $this->alerts[] = array(
            'alert' => $alert,
            'type'  => $alert_type
        );
        
        $this->update_alerts();
        
    }
    
    public function get_alerts() {
        
        $output = '';
        
        foreach ($this->alerts as $alert) {
            
            $output .= '<div class="alert alert-'.$alert['type'].'">'.$alert['alert'].'</div>';
            
        }
        
        $this->alerts = array();
        
        $this->update_alerts();
        
        return $output;
        
    }
    
    public function update_alerts() {
        
        $_SESSION[get_config('sess')]['alerts'] = $this->alerts;
        
    }
    
} 