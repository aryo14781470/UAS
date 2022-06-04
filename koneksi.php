<?php
function con(){
    $host = "localhost";
    $user = "wtn6";
    $pass = "";
    $db = "wtn6";
    return mysqli_connect($host,$user,$pass,$db);
}
$konek = mysqli_connect("localhost", "wtn6", "", "wtn6");

function registrasi($data){
	$konek = con();
	//global $konek;
	$nama = $_POST['nama'];
	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($konek, $data['password']);
	$password2 = mysqli_real_escape_string($konek, $data['password2']);
    $create = date('Y-m-d H:i:s');
    $update = date('Y-m-d H:i:s');
	//cek username sudah ada atau belum
	$sql = "SELECT login_username FROM login WHERE login_username = '$username'";
	$result = mysqli_query ($konek, $sql);
	if (mysqli_fetch_array($result)){
		echo "<script> 
				alert('username sudah terdaftar');
				window.location.href='login.php';
			</script>";
		return false;
	}
	//cek apakah nama sudah ada atau belum
	$sql = "SELECT login_username FROM login WHERE login_name = '$nama'";
	$result = mysqli_query ($konek, $sql);
	if (mysqli_fetch_array($result)){
		echo "<script> 
				alert('Nama sudah terdaftar');
				window.location.href='login.php'; 
			</script>";
		return false;
	}
	//cek pass
	if ($password !== $password2) {
		echo "<script> 
				alert('konfirmasi password tidak sesuai'); 
			</script>";
		return false;
	}
	//enkripsi pass / mengacak pass
	$password = password_hash($password, PASSWORD_DEFAULT);
	$sql = "INSERT INTO login (idlogin, login_username, login_password, login_name, login_fail, login_create, login_update)
			VALUE ('', '$username', '$password', '$nama', '', '$create', '$update')";
	$result = mysqli_query($konek, $sql);
	if (!$result){
		echo mysqli_error($konek);
	}else {
		return $result;
	}
}
?>
