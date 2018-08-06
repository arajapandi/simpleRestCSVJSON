<?php


class OutputFormatter implements FormatInterface {
    
    protected $connection;

    public function __construct(ConnectionInterface $conectionInterface) {
        $this->connection = $conectionInterface;
        
    }

    public function json() {
        
        if(!empty($this->connection)) {
            return json_encode($this->connection->getData());
        }
    }
    
}   
