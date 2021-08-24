<?php

include_once '../../config/Database.php';
include_once 'Util.php';

class Recipes {
    private $database;
    private $util;

    public function __construct(){
        $this->database = new Database();
        $this->util = new Util();
    }

    public function getAllRecipes(){
        $sql = 'SELECT * FROM recipes';
        $recipes = $this->database->getRequestMultiple($sql, null);
        if($recipes['exist']){
            foreach($recipes['values'] as $key => $recipe){
                $recipes['values'][$key]['ingredients'] = $this->getRecipeIngredients($recipe['id']);
                $recipes['values'][$key]['tags'] = $this->getRecipeTags($recipe['id']);    
            }
        }
        return $recipes;
    }

    public function getSingleRecipe($id){
        $sql = 'SELECT * FROM recipes WHERE id = :id';
        $values = array("id" => $id);
        $recipe = $this->database->getRequestSingle($sql, $values); 
        $recipe['values']['ingredients'] = $this->getRecipeIngredients($id);
        $recipe['values']['tags'] = $this->getRecipeTags($id); 
        return $recipe;
    }

    public function getRecipeIngredients($id){
        $sql = 'CALL getRecipeIngredients (:id)';
        $ingredients = $this->database->getRequestMultiple($sql, array('id' => $id));
        if($ingredients['exist']){
            return $ingredients['values'];
        }
    }

    public function getRecipeTags($id){
        $sql = 'CALL getRecipeTags (:id)';
        $tags = $this->database->getRequestMultiple($sql, array('id' => $id));
        if($tags['exist']){
            return $tags['values'];
        }
    }

    public function createIngredient($inputs){
        if(!empty($inputs)){
            $inputs = $this->util->validateData($inputs);
            $sql = "INSERT INTO ingredients (".$this->util->getColumnNames($inputs).") VALUES (".$this->util->getColumnPlaceholders($inputs).")";
            return $this->database->postRequest($sql, $inputs);
        }
        return array("executed" => false, "message" => "No values were submitted.");
    }

}