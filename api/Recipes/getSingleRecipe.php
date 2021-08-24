<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../models/Recipes.php';

    // Instantiate class to get records
    $recipes = new Recipes();
    
    // Get Data
    $id = isset($_GET['id']) ? $_GET['id']: die();

    // Query recipes
    $result = $recipes->getSingleRecipe($id);

    if($result["exist"]){
        echo json_encode($result["values"]);
    }else{
        echo json_encode(array('message' => 'No recipe found.'));
    }