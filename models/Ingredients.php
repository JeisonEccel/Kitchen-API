<?php

include_once '../../config/Database.php';
include_once 'Util.php';

class Ingredients {
    private $database;
    private $util;

    private $id;
    private $description;
    private $available;


    public function __construct(){
        $this->database = new Database();
        $this->util = new Util();
    }

    public function getAllIngredients(){
        $sql = 'SELECT * FROM ingredients ORDER BY description';
        return $this->database->getRequestMultiple($sql, null);
    }

    public function getSingleIngredient($id){
        $sql = 'SELECT * FROM ingredients WHERE id = ?';
        $values = array($id);
        return $this->database->getRequestSingle($sql, $values);
    }

    public function createIngredient($inputs){
        if(!empty($inputs)){
            $sql = "INSERT INTO ingredients (".$this->util->getColumnNames($inputs).") VALUES (?, ?)";
            return $this->database->postRequest($sql, $this->util->convertAssocToArray($inputs));
        }
        return array("executed" => false, "message" => "No values were submitted.");
    }
}