<?php 
require 'koneksi.php';

if (isset ($_POST["registrasi"]) ) {

  if (registrasi  ($_POST) > 0 ) {
    echo "<script>
          alert('user baru berhasil ditambahkan');

          </script>"; 
    header('Location: alert.php');
    exit;
  } else {
    echo mysqli_error($con);
  }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registrasi</title>
  </head>
  <body>
    <div class="container-fluid bg-dark text-light py-4 ">
      <div class="container py-3">
        <h2 class="text-center mb-4">Registrasi</h2>
        <div class="row">
          <div class="col-lg-8 col-md-10 col-sm-12 offset-lg-2 offset-md-1">
            <div class="container-fluid">
                  <form class=" border border-3 border-white rounded-3 p-4" action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nim" class="col-sm-2 col-form-label">NIM/NIP</label>
                      <div class="col-sm-10">
                        <input type="text" name="nim" class="form-control" id="nim">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nohp" class="col-sm-2 col-form-label">Nomor HP</label>
                      <div class="col-sm-10">
                        <input type="text" name="nohp" class="form-control" id="nohp">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email">
                      </div>
                    </div>
                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                      <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-Laki">
                          <label class="form-check-label" for="jk">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline mt-3">
                          <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan">
                          <label class="form-check-label" for="jk">Perempuan</label>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Agama</legend>
                      <div class="col-sm-10">
                        <select name="agama" class="form-select form-select-md" aria-label=".form-select-sm example">
                          <option selected>== Pilih Agama ==</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen Katolik">Kristen Katolik</option>
                          <option value="Kristen Protestan">Kristen Protestan</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghucu">Konghucu</option>
                        </select>
                      </div>
                    </fieldset>
                    <div class="row mb-3">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password">
                      </div>
                    </div>
                    <div class="text-center d-grid gap-2 col-6 mx-auto mt-4">
                      <button type="submit" name="registrasi" class="btn btn-outline-light border-3 rounded-pill" value="success"><b>Registrasi</b></button>
                    </div>
                    <div class="signup text-center mt-2">Sudah memiliki akun ? <a href="index.php">Login</a></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
  </body>
</html>

