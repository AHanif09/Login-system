<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    $stmt = $con->prepare('SELECT username, password, email, nama, nim, nohp, foto FROM accounts WHERE id = ?');

    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($username, $password, $email, $nama, $nim, $nohp, $foto);
    $stmt->fetch();
    $stmt->close();   

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <style>
        .img {
            max-width: 135px;
            max-height: 135px;
        }
    </style>

    <title>Edit Profile</title>
  </head>
  <body>
    <!-- Navbar -->
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"> <h3>Admin</h3> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
            </div>
        </div>
      </nav>
    <!-- End Navbar -->

    <div class="container my-3">
      <h4>Edit Profile</h4>
      <hr>
    </div>

    <!-- Edit Profile -->
    <div class="container my-3 border border-1 rounded-3 py-4 shadow-lg">
      <div class="row ">
        <div class="col-lg-12 col-md-10 col-sm-12">
          <div class="container-fluid">
            <form action="update.php" method="POST" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" class="form-control" id="nama" value="<?= $nama ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="nim" class="col-sm-2 col-form-label">NIM/NIP</label>
                <div class="col-sm-10">
                  <input type="text" name="nim" class="form-control" id="nim" value="<?= $nim ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" name="username" class="form-control" id="username" value="<?= $username ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="nohp" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                  <input type="text" name="nohp" class="form-control" id="nohp" value="<?= $nohp ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="email" value="<?= $email ?>">
                </div>
              </div>
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-3">Jenis Kelamin</legend>
                <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-Laki" value="<?= $jk ?>">
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
                  <input type="password" name="password" class="form-control" id="password" value="<?= $password ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="nohp" class="col-sm-2 col-form-label">Upload Foto</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" id="file" name="file" value="<?= $foto ?>" aria-describedby="fileSection"/>
                </div>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-dark" href="profile.php" role="button">Batal</a>
                <button type="submit" name="daftar" class="btn btn-dark" value="success">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Edit Profile -->
  </body>
</html>