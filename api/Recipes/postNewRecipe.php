<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');


    include_once '../../models/Recipes.php';

    // Instantiate class to get records
    $recipes = new Recipes();

    // Get Data
    $inputs = (array) json_decode(file_get_contents("php://input"));

    // Query recipes
    $result = $recipes->createRecipe($inputs);

    if(!$result["executed"]){
        echo $result["message"];
    }else{
        echo json_encode(array('message' => 'New recipe created.'));
    }