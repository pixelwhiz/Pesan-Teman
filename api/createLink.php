<?php
header("Content-Type: application/json");

if(isset($_POST['nama'])){
    $nama = $_POST['nama'];
    $database = file_get_contents("database/data.json");
    $json_obj = json_decode($database);
    $uid = uniqid();
    $json_obj->$uniq_id = ["nama" => $nama, "pesan" => null];

    file_put_contents("database/data.json", json_encode($json_obj, JSON_PRETTY_PRINT));

    echo json_encode(["status" => true, "nama" => $nama, "id_link" => $uid]);
}else{
    echo json_encode(["status" => false]);
}