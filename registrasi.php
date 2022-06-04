<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toko Asia Baru</title>
    <link rel="stylesheet" href="css/index.css" type="text/css">
</head>
<?php 
require('koneksi.php'); 
    if (isset($_POST['register'])) {
        if (registrasi($_POST) > 0) {
            echo " <script> 
                    alert('Data berhasil di ditambahkan');
                    window.location.href='login.php';    
                </script>";
        }else {
            echo mysqli_error($konek);
    }
}

?>
<body>
    <div id="wrapper">
        <div id="header"> <?php require("header.php")?> </div>
        <div id="page">
            <div id="menu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                </ul>
                <div id="identitas"> <?php require("identitas.php")?> </div>
            </div>
            <div id="home">
                <h2>Registrasi</h2>
                <table>
                <form action="registrasi.php" method="post">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><input type="text" name="nama" required maxlength="25" size="20"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" maxlength="25" size="20"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="text" name="password" maxlength="25" size="20"></td>
                    </tr>
                    <tr>
                        <td>Konfirmasi password</td>
                        <td><input type="text" name="password2" maxlength="25" size="20"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="table_footer">
                            <input type="submit" value="Registrasi" name="register">
                            <a href="login.php">Login</a>
                        </td>
                    </tr>
                </form>
                </table>
            </div>
            <br class="clear">
        </div>
        <div id="footer"><?php require("footer.php")?> </div>
    </div>
</body>
</html>