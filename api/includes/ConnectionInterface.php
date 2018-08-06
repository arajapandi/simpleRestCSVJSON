<?php



interface ConnectionInterface {
    public function getConnect();
    public function query();
    public function getData();
    public function closeConnection();
}   