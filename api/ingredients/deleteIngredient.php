<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');


    include_once '../../models/Ingredients.php';

    // Instantiate class to get records
    $ingredients = new Ingredients();

    // Get Data
    $inputs = (array) json_decode(file_get_contents("php://input"));

    // Query ingredients
    $result = $ingredients->deteleIngredient($inputs);

    if(!$result["executed"]){
        echo $result["message"];
    }else{
        echo json_encode(array('message' => 'Ingredient was deleted.'));
    }
