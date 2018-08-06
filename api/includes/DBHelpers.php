<?php

class DBHelpers {
    
    private $localObject;


    public function fileHelper($connectorObject, $format) {
        
        $path       = Config::get('dbs')[$format]['path'];
        $connector  = $connectorObject->get();
        if(empty($connector)) {
            $handle = fopen($path,"r");
            $connectorObject->set($handle);
        }
        return $connectorObject->get();

    }
    

    public function csvProcessor($data) {
        $omit       = [0,1];
        $array_keys = ["title","lastname","firstname","gender","email","picture","address"];
        if(!empty($data)) {
            foreach($omit as $val) {
                unset($data[$val]);
            }
            return array_combine($array_keys,$data);
        }
        return null;
    }
    
    public function jsonProcessor($data) {
        $omit       = ['login','password'];
        $array_keys = ["title","lastname","firstname","gender","email","picture","address"];
        foreach($data as $key=>$value) {
            if(!empty($value)) {
                foreach($omit as $val) {
                    unset($value[$val]);
                }
                $data[$key] = array_combine($array_keys,$value);
            }
        }
        return $data;
    }
}

