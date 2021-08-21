<?php

class Util{

    public function getColumnNames($inputs){
        $columns = array();
        
        foreach($inputs as $input => $value){
            array_push($columns, $input);
        }
        return implode($columns, ",");
    }

    public function convertAssocToArray($assocArray){
        $values = array();
        
        foreach($assocArray as $value){
            array_push($values, $value);
        }
        return $values;
    }
}