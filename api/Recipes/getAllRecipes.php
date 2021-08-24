<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../models/Recipes.php';

    // Instantiate class to get records
    $recipes = new Recipes();
    
    // Query recipes
    $result = $recipes->getAllRecipes();

    if($result["exist"]){
        echo json_encode($result["values"]);
    }else{
        echo json_encode(array('message' => 'No recipe found.'));
    }