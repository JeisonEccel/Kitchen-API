<?php

include_once '../../config/Database.php';
include_once 'Util.php';

class Ingredients {
    private $database;
    private $util;

    public function __construct(){
        $this->database = new Database();
        $this->util = new Util();
    }

    public function getAllIngredients(){
        $sql = 'SELECT * FROM ingredients ORDER BY description';
        return $this->database->getRequestMultiple($sql, null);
    }

    public function getSingleIngredient($id){
        $sql = 'SELECT * FROM ingredients WHERE id = :id';
        $values = array("id" => $id);
        return $this->database->getRequestSingle($sql, $values);
    }

    public function createIngredient($inputs){
        if(!empty($inputs)){
            $inputs = $this->util->validateData($inputs);
            $sql = "INSERT INTO ingredients (".$this->util->getColumnNames($inputs).") VALUES (".$this->util->getColumnPlaceholders($inputs).")";
            return $this->database->postRequest($sql, $inputs);
        }
        return array("executed" => false, "message" => "No values were submitted.");
    }

    public function updateIngredient($inputs){
        if(!empty($inputs)){
            $inputs = $this->util->validateData($inputs);
            if(array_key_exists('id',$inputs)){
                $sql = "UPDATE ingredients SET ".$this->util->extractSetValues($inputs)." WHERE id = :id";
                return $this->database->putRequest($sql, $inputs);
            }
            return array("executed" => false, "message" => "ID was not specified.");
        }
        return array("executed" => false, "message" => "No values were submitted.");
    }

    public function deteleIngredient($inputs){
        if(array_key_exists('id',$inputs)){
            $sql = 'DELETE FROM ingredients WHERE id = ?';
            $values = array($inputs['id']);
            return $this->database->deleteRequest($sql, $values);
        }
        return array("executed" => false, "message" => "ID was not specified.");
    }

}