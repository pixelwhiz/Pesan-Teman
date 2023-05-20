<?php

header("Content-Type: application/json");

if(isset($_POST['id'])){
    
    $id = $_POST['id'];

    $database = file_get_contents("database/data.json");
    $json_obj = json_decode($database);

    if (isset($json_obj->$id)){
        $json_obj->$id->status = true;
        $data_pesan_fix = [];
        foreach($json_obj->$id->pesan as $data_pesan){
            $data_pesan_fix[] = $data_pesan;
        }
        $json_obj->$id->pesan = $data_pesan_fix;
        echo json_encode($json_obj->$id, JSON_PRETTY_PRINT);
    }else{
        echo json_encode(["status" => false]);    
    }
    
}else{
    echo json_encode(["status" => false]);
}