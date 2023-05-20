<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link rel="stylesheet" href="css/login.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <main>
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card" style="margin-bottom: 8rem; width: 25rem;">
                <div class="card-body">
                <h2 class="card-title text-center mb-4">Register</h2>
                <div class="form-floating mb-2">
                <input type="username" class="form-control" id="name" placeholder="name@example.com">
                <label style="font-size: 0.8rem;" for="name">Your Name</label>
                </div>
                <div class="form-floating mb-2">
                <input type="password" class="form-control" id="password" placeholder="Password">
                <label style="font-size: 0.8rem;" for="password">Password</label>
                </div>
                <div class="d-grid gap-2">
                <p class="mb-1" style="text-indent: 0.8rem; text-align: left; font-size: 0.8rem;">Anda sudah punya akun? <a style="text-decoration:none;" href="index.php">Klik Disini</a>
                
                <p class="text-muted text-center" style="font-size: 0.9rem;">Lengkapi form di atas dengan Lengkap! Pastikan anda menyimpanya</p>
                <button onclick="register()" class="btn btn-primary">Daftar</button>
                </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function register(){
            const name = document.getElementById("name").value;
            const pwd = document.getElementById("password").value;
            $.post("api/register.php", {nama:name, password:pwd}, function(result, status){
                
                if (result.status) {
                    console.log(result.status);
                    Swal.fire({text:"Pendaftaran Berhasil", icon:"success"});
                } else {
                    console.log(result.status);
                    Swal.fire({text:"Pendaftaran gagal. Silahkan periksa kembali data anda", icon:"error"});
                }
            }, "json");
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
    crossorigin="anonymous"></script>

  </body>
</html>