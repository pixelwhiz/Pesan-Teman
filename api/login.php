<?php

header("Content-Type: application/json");

if (isset($_POST['id'], $_POST['password'])){
    $id = $_POST['id'];
    $password = $_POST['password'];

    $database = file_get_contents("database/data.json");
    $json_obj = json_decode($database, true);


    if(!$id == null && !$password == null){
        if(isset($json_obj[$id]) && $json_obj[$id]['password'] == $password){
            echo json_encode(["status" => true, "id" => $id, "password" => $password]);
        }else{
            echo json_encode(["status" => false, "error" => "Silahkan Periksa Kembali"]);
        }
    }else{
        echo json_encode(["status" => false, "error" => "Harap Isi Form Tersebut"]);
    }

    file_put_contents("database/data.json", json_encode($json_obj, JSON_PRETTY_PRINT));
    // Tidak perlu menyimpan kembali data JSON ke file di sini
} else {
    echo json_encode(["status" => false]);
}
