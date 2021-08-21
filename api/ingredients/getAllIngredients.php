<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../models/Ingredients.php';

    // Instantiate class to get records
    $ingredients = new Ingredients();
    
    // Query ingredients
    $result = $ingredients->getAllIngredients();

    if($result["exist"]){
        echo json_encode($result["values"]);
    }else{
        echo json_encode(array('message' => 'No ingredient found.'));
    }