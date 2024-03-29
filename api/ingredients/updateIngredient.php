<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');


    include_once '../../models/Ingredients.php';

    // Instantiate class to get records
    $ingredients = new Ingredients();

    // Get Data
    $inputs = (array) json_decode(file_get_contents("php://input"));

    // Query ingredients
    $result = $ingredients->updateIngredient($inputs);

    if(!$result["executed"]){
        echo json_encode($result["message"]);
    }else{
        echo json_encode(array('message' => 'Ingredient was updated.'));
    }
