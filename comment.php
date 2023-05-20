<?php

if(isset($_GET['id'])){
    
    $link_id = $_GET['id'];

    $database = file_get_contents("./api/database/data.json");
    $json_obj = json_decode($database);

    if (isset($json_obj->$link_id)){
        $json_obj->$link_id->status = true;
        $data_pesan_fix = [];

        if($json_obj->$link_id->pesan == null){
            $json_obj->$link_id->pesan = [];
        }

        foreach($json_obj->$link_id->pesan as $data_pesan){
            $data_pesan_fix[] = $data_pesan;
        }
        $json_obj->$link_id->pesan = $data_pesan_fix;
        $json_data = $json_obj->$link_id;
    }else{
        die("Error akun ini tidak ada");
    }
    
}else{
    die("Error akun ini tidak ada");
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Teman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/comment.css">
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <main>

    
        <div class="container mt-5" style="max-width: 600px;">
            <div class="card">
                <h2 class="card-header" style="font-size: 2rem;text-align:center;"><i data-feather="mail"></i> Kirim Pesan</h2>
                <div class="card-body">
                    <h6 style="font-size:1.25rem; font-weight:500;">Silahkan komentar untuk <span class="nama"> <?php echo $json_data->name?></span></h6>
                    <ul>
                        <li>Si <span class="nama"> <?php echo $json_data->name?> </span> tidak akan tau siapa pengirimnya</li>
                        <li>Kirim pesan mu ke <span class="nama"> <?php echo $json_data->name?> </span> dengan aman</li>
                        <li>Ayo bersenang senang dengan <span class="nama"><?php echo $json_data->name?></span></li>
                    </ul>
                    <input id="pesan" class="form-control" style="max-width: 480px;" placeholder="Ketik Pesan">
                    <br>
                    <button onclick="sendMessage()" class="btn btn-primary">Kirim Pesan</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        feather.replace();
        function sendMessage() {
            const pesan = document.getElementById("pesan").value;
            $.post ("api/comment.php", {id:`<?php echo "".$link_id?>`, pesan:pesan}, function(result, status){
                if(result.status){
                    Swal.fire({text:"Pesan Terkirim", icon:"success"});
                }else{
                    Swal.fire({text:"Gagal mengirim Pesan", icon:"error"});
                }
            }, "JSON");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
</html>
