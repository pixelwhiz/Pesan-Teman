<?php

header("Content-Type: application/json");

if (isset($_POST['nama'], $_POST['password'])){
    $name = $_POST['nama'];
    $password = $_POST['password'];
    $uid = uniqid();

    $database = file_get_contents("database/data.json");
    $json_obj = json_decode($database);

    if(!$name == null && !$password == null){
        if (!isset($json_obj->$uid)){

            $json_obj->$uid = ["id" => $uid, "name" => $name, "password" => $password, "pesan" => null];
            if (!isset($json_obj->$uid)){
                echo json_encode(["status" => true]);
            }
            echo json_encode(["status" => true, "id" => $uid, "name" => $name, "password" => $password]);
        }
        file_put_contents("database/data.json", json_encode($json_obj, JSON_PRETTY_PRINT));
    }else{
        echo json_encode(["status" => false]);
    }
}else{
    echo json_encode(["status" => false]);
}