<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../models/Ingredients.php';

    // Instantiate class to get records
    $ingredients = new Ingredients();
    
    $id = isset($_GET['id']) ? $_GET['id']: die();

    // Query ingredients
    $result = $ingredients->getSingleIngredient($id);

    if($result["exist"]){
        echo json_encode($result["values"]);
    }else{
        echo json_encode(array('message' => 'No ingredient found.'));
    }