<?php
session_start();
$id = $_SESSION['id'];
// Penyertaan Koneksi Database
$DATABASE_HOST = "localhost";
$DATABASE_USER = "root";
$DATABASE_PASS = "";
$DATABASE_NAME = "phplogin";

// Create connection
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
//Tutup Koneksi

//Ambil data kiriman dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$username = $_POST['username'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$jk = $_POST['jk'];
$agama = $_POST['agama'];
$password = $_POST['password'];

// Input File

function cekFormat($fileEkstensi, $fileSize, $fileTmpName){
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    if( in_array($fileEkstensi, $ekstensiGambarValid) ){
        if ($fileSize < 2000000 ){
            $fileNameNew = uniqid() . '.' . $fileEkstensi;
            $newFileLocation = 'assets/img/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $newFileLocation);
            return $newFileLocation;
        }
    }
}

$file = $_FILES['file'];

$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileEks = explode('.', $fileName);
$fileEkstensi = strtolower(end($fileEks));

$newFileLocation = cekFormat($fileEkstensi, $fileSize, $fileTmpName);
/*
if ($stmt = $conn->prepare('SELECT password FROM accounts WHERE id=?')) {

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt-> num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
    }
    else {

        echo 'Incorrect username and/or password!';
    }
    $stmt->close();
}
*/
//enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

// Update Data ke MySQL
    if( !isset($newFileLocation)){
        $sql = "UPDATE `accounts` SET `nama`='$nama', `nim`=$nim, `username`='$username',`nohp`='$nohp',`email`='$email',`jk`='$jk',`agama`='$agama',`password`='$password' WHERE id = '$id'";
    }else{
        $sql = "UPDATE `accounts` SET `nama`='$nama', `nim`=$nim, `username`='$username',`nohp`='$nohp',`email`='$email',`jk`='$jk',`agama`='$agama',`password`='$password', `foto` = '$newFileLocation' WHERE id = '$id'";   
    }

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	    header('Location: profile.php');
	
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);

	
?>