<?php

class Dabatase {

    //Parameters
    private const SERVERHOST = '127.0.0.1:90';
    private const SERVERUSER = 'root';
    private const SERVERPASSWORD = '';
    private const DBNAME = 'mypractice';
    private $conn;

    //METHOD GETTERS
    private function getDNS(){
        return 'mysql:hots='.self::SERVERHOST.';dbname='.self::DBNAME;
    }
    protected function getConn(){
        $this->conn = null;

        try {
            $this->conn = new PDO($this->getDNS(), self::SERVERUSER, self::SERVERPASSWORD);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e ){
            echo `Connection Error: {$e}`;
        }
        
        return $this->connDB;
    }

}