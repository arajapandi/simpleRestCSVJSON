<?php

class CSVConnector extends DBHelpers implements ConnectionInterface {
    
    
    private $connector = null;

    
    public function getConnect() {
        
        return $this->fileHelper($this, 'csv');
    }
    
    
    public function get() {
        return $this->connector;
    }
    
    public function set($_connector) {
        $this->connector = $_connector;
    }
    
    public function query() {
        //no query
    }
    
    public function getData() { //not using limit
        
        if(empty($this->connector)) {
            $this->getConnect();
        }
        
        $testTakers = array();
        
        if(empty($this->connector)) {
            return $testTakers;
        }
        
        fgetcsv($this->connector);
        while(!feof($this->connector)) {
          $testTakers[] = $this->csvProcessor(fgetcsv($this->connector));
        }
        
        $this->closeConnection();
        return $testTakers;
    }
    
    public function closeConnection() {
        if(!empty($this->connector)) {
            fclose($this->connector);
        }
    }
    
}
