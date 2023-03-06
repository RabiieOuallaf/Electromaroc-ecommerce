<?php 

    

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        var_dump($_POST);
        
        $data = [
            "name" => $_POST['clientName']
        ];
        

        if($data){
            http_response_code(200);
            var_dump($data);
        }else{
            http_response_code(400);
        }
        
    }else{
        echo json_encode($name);
        die();
    };
