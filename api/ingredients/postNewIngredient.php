<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');


    include_once '../../models/Ingredients.php';

    // Instantiate class to get records
    $ingredients = new Ingredients();

    // Get Data
    $values = (array) json_decode(file_get_contents("php://input"));

    // Clean Data
    foreach($values as $key => $value){
        $values[$key] = trim(htmlspecialchars(strip_tags($value)));
    }

    // Query ingredients
    $result = $ingredients->createIngredient($values);

    if(!$result["executed"]){
        echo $result["message"];
    }else{
        echo json_encode(array('message' => 'New ingredient created.'));
    }
