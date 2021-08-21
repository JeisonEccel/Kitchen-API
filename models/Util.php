<?php

class Util{

    public function getColumnNames($inputs){
        $columns = array();
        
        foreach($inputs as $input => $value){
            array_push($columns, $input);
        }
        return implode($columns, ",");
    }

    public function getColumnPlaceholders($inputs){
        $columns = array();
        
        foreach($inputs as $input => $value){
            array_push($columns, ":".$input);
        }
        return implode($columns, ",");
    }

    public function extractSetValues($inputs){
        $setValues = array();
        foreach($inputs as $key => $value){
            if($key !== 'id'){
                array_push($setValues, $key." = :".$key);
            }
        }
        return implode($setValues, ", ");
    }

    public function validateData($inputs){
        foreach($inputs as $key => $value){
            $inputs[$key] = trim(htmlspecialchars(strip_tags($value)));
        }
        return $inputs;
    }
}