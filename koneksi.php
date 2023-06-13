<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

function registrasi ($data) {
	global $con;

	$nama = $data["nama"];
	$nim = $data["nim"];
	$username = $data["username"];
	$nohp = $data["nohp"];
	$email = $data["email"];
	$jk = $data["jk"];
	$agama = $data["agama"];
	$password = ($data["password"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($con, "SELECT username FROM accounts WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
          alert('username sudah ada');

          </script>";

        return false; 
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//insert user
	

	mysqli_query($con, "INSERT INTO accounts VALUES('', '$nama', '$nim', '$username', '$nohp', '$email', '$jk', '-', '$password', 'assets/img/user.png')");
	return mysqli_affected_rows($con);

	//header('Location: profile.php');
	//exit;
	
	
}

?>