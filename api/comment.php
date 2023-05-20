<?php
header("Content-Type: application/json");

if(isset($_POST['id'],$_POST['pesan'])){
    $link_id = $_POST['id'];
    $pesan = $_POST['pesan'];
    $database = file_get_contents("database/data.json");
    $json_obj = json_decode($database);

    if (isset($json_obj->$link_id)){
        $waktu = date("h:i:sa");
        $id_pesan = "idpesan".uniqid();

        if(!$json_obj->$link_id->pesan == null){

            $json_obj->$link_id->pesan->$id_pesan = ["pesan" => $pesan, "waktu" => $waktu];

            echo json_encode(["status" => true]);
        }else{
            echo json_encode(["status" => true]);

            $json_obj->$link_id->pesan = [$id_pesan => ["pesan" => $pesan, "waktu" => $waktu]];

        }

        file_put_contents("database/data.json", json_encode($json_obj, JSON_PRETTY_PRINT));
    }else{
       echo json_encode(["status" => false]);
    }
    
}else{
    echo json_encode(["status" => false]);
}