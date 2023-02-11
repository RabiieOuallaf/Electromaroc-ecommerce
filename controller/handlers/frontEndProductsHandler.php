<?php 

    

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_CONTENT_TYPE']) && $_SERVER['HTTP_CONTENT_TYPE'] === "application/json"){
        
        $requestBody = file_get_contents("php://input");
        

        $data = $requestBody;
        
        if($data){
            http_response_code(200);
            echo json_decode($data);
        }else{
            http_response_code(400);
        }
        
    }else{
        http_response_code(404);
        die();
    };
