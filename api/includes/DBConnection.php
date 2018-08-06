<?php


class DBConnection {
    
    private $dbConnection;
    private $currentDb;


    public function __construct($currentdb = '') {
        
        if(empty($dbsource)) {
            $currentdb  = Config::get('activedb');
        } 
        $this->currentDb = $currentdb;
        
        $dbupper    = strtoupper($this->currentDb);
        $classname  = $dbupper.'Connector';
        $db = new $classname();
        $this->set($db);
                
    }
    
    public function getCurrentDBName() {
        return $this->currentDb;
    }

    private function set(ConnectionInterface $dbConnection) {
        $this->dbConnection = $dbConnection;
    }
    
    public function get() {
        if(!empty($this->dbConnection)) {
            return $this->dbConnection;
        }
    }
}  
