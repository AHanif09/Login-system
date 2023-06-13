<?php 
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'phplogin';
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    $stmt = $con->prepare('SELECT username, password, email, nama, nim, jk, nohp, agama, foto FROM accounts WHERE id = ?');

    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($username, $password, $email, $nama, $nim, $jk, $nohp,  $agama, $foto);
    $stmt->fetch();
    $stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <style>
        .img {
            max-width: 125px;
            max-height: 125px;
        }
    </style>
    <title>Profil</title>
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
                <a class="nav-link" aria-current="page" href="home.php">Home</a>
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

    <!-- Profile -->
      <div class="container my-3">
        <h4>Profile</h4>
        <hr>
      </div>
      <div class="container border border-1 rounded py-4 shadow-lg">
        <div class="row">
          <div class="col-3">
            <img src=<?= $foto ?> class="img rounded-circle mx-auto d-block">
          </div>
          <div class="col-9">
            <div class="row">
              <div class="col-2">
                <h6>Nama</h6>
              </div>
              <div class="col-10">
                <p><?= $nama ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <h6>NIM/NIP</h6>
              </div>
              <div class="col-10">
                <p><?= $nim ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <h6>Username</h6>
              </div>
              <div class="col-10">
                <p><?= $username ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <h6>No HP</h6>
              </div>
              <div class="col-10">
                <p><?= $nohp ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <h6>Email</h6>
              </div>
              <div class="col-10">
                <p><?= $email ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <h6>Jenis Kelamin</h6>
              </div>
              <div class="col-10">
                <p><?= $jk ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <h6>Agama</h6>
              </div>
              <div class="col-10">
                <p><?= $agama ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <h6>Password</h6>
              </div>
              <div class="col-10">
                <p><?= $password ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <a class="btn btn-dark" href="edit.php" role="button">Edit Profil</a>
            </div>
        </div>
      </div>
    <!-- End Profile -->
</body>
</html>