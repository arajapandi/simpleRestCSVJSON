<?php



class JSONConnector extends DBHelpers implements ConnectionInterface {
    
    
    private $connector = null;

    
    public function getConnect() {
        
        return $this->fileHelper($this, 'json');
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
        
        $line = '';
        while (!feof($this->connector)) {
            $line .= fgets($this->connector);
        }
         
        $testTakersProcessed = json_decode($line,true); //wont work for large file
        $testTakers = $this->jsonProcessor($testTakersProcessed);
        
        $this->closeConnection();
        return $testTakers;
    }
    
    public function closeConnection() {
        if(!empty($this->connector)) {
            fclose($this->connector);
        }
    }
    
}
