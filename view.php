<?php 
if(isset($_GET['id'])){
  $id = $_GET['id'];

  $database = file_get_contents("api/database/data.json");
  $json_obj = json_decode($database);
  
  if(isset($json_obj->$id)){
    $json_data = $json_obj->$id;
  }else{
    die("Akun tidak ditemukan");
  }

}else{
  die("Akun tidak ditemukan");
}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Teman</title>
    <link rel="stylesheet" href="css/view.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid logo">
          <a class="navbar-brand" style="font-weight:bolder; font-size:1.5rem;" href="#">Pesan Teman</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main class="">
      <div class="container" style="max-width: 600px;">
          
          <div class="card">
              <h2 class="card-header" style="font-size:2rem; text-align: center;">    <i data-feather="mail"></i>
 Kotak Masuk</h2>
              <div class="card-body">
                  <h6 style="font-size:1.5rem; font-weight:500;">Hallo <span class="name"><?php echo $json_obj->$id->name?></span><h6>
                  <p class="d-inline-flex" style="font-size:0.8rem;">Silahkan bagikan link kamu di bawah</p>
                  <div class="d-flex">
                    <input id="link" class="form-control" style="font-size:1rem;" value='<?php echo "localhost:8080/chat/comment.php?id=".$id?>' disabled>
                    <button onclick="copy()" class="btn"><a style="text-decoration:none; color:black;" href=""><i data-feather="copy"></i></a></button>
                  </div>
                  
                  <!-- <a style="color:black;" href=""><i data-feather="clipboard"></i></a> -->
                  
                  <hr>
                  <div id="pesan_masuk" style="overflow-y: scroll; scroll-behavior: smooth; height: 200px;">
                  </div>
                  <!-- <div class="alert alert-primary" role="alert">
                      This is example
                  </div> -->
                  
              </div>
          </div>
      </div>
    </main>
    


    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
      feather.replace();

      function copy() {
        // Get the text field
        var copyText = document.getElementById("link");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        document.execCommand("copy");
        navigator.clipboard.writeText(copyText.value);
        console.log(copyText.value);

        // Alert the copied text
        alert(""+link.value+" \nLink disalin ke papan klip");
      }

      $.post("api/getInfo.php", {id:"<?php echo $id?>"}, function(result, status){
          const div_pesan = document.getElementById("pesan_masuk");
          if(result.status){
              div_pesan.innerHTML = "<h2>Data ada</h2>";
              
              var proses_update = "";
              const pesan = result.pesan;

              pesan.forEach((data_for) => {
                  // console.log(data_for);
                  proses_update = `${proses_update} <div class="alert alert-primary" role="alert">
                  ${data_for.pesan}
                </div>`;
              });

              div_pesan.innerHTML = proses_update;

          }else{
              div_pesan.innerHTML = "<h2>Error akun tidak ditemukan</h2>";
          }
      }, "JSON");
    </script>
  </body>
</html>