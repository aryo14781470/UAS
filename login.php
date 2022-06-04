<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();  
    require("koneksi.php"); 
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM login WHERE login_username = '$username'";
        $result = mysqli_query($konek, $sql);
        //cek username
        if (mysqli_num_rows($result) == 0 ){
        echo '<script> 
                alert("username tidak terdaftar");
                    window.location.href="registrasi.php";
            </script>';
        return false;
        }
        if ( mysqli_num_rows($result) == 1 ) {
            //cek pass
            $row = mysqli_fetch_array($result);
            if (password_verify($password, $row['login_password'])){
                //set session
                $sql = "UPDATE login SET login_fail = 0 where login_username='$username'";
                $result = mysqli_query($konek, $sql);
                $_SESSION["login"] = true;
                echo'<script> 
                        alert ("selamat datang '.$row['login_username'].'");
                        window.location.href="index.php?user='.$row['login_username'].'";
                    </script>';
                exit;
            }else{
                $sql = "UPDATE login SET login_fail = login_fail + 1 where login_username='$username'";
                $result = mysqli_query($konek, $sql);
                $sql2= "SELECT login_fail from login where login_username= '$username'";
                $result2 = mysqli_query($konek, $sql2);
                $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                $fail = $row['login_fail'];
                if($fail > 2){
                    echo "<script type=text/javascript>
                            alert('Username $username Telah Di Blokir, Silahkan Hubungi Administrator');
                                window.location = 'login.php'
                        </script>";
                }else {
                    echo "<script type=text/javascript>
                            alert('Password salah, Sudah $fail Kali Mencoba');
                                window.location.href='index.php'
                        </script>";
                }
                return false;
            }     
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toko Asia Baru</title>
    <link rel="stylesheet" href="css/index.css" type="text/css">
</head>

<body>
    <div id="wrapper">
        <div id="header"> <?php require("header.php")?> </div>
        <div id="page">
            <div id="menu">
                <ul>
                    <li><a href="login.php">HOME</a></li>
                </ul>
                <div id="identitas"> <?php require("identitas.php")?> </div>
            </div>
            <div id="home">
                <h2>Halaman Login</h2>
                <table>
                <form action="" method="post">
                    <tr>
                        <td>username</td>
                        <td><input type="text" name="username" required maxlength="25" size="20"></td>
                    </tr>
                    <tr>
                        <td>password</td>
                        <td><input type="text" name="password" maxlength="25" size="20"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="table_footer">
                            <button type="submit" name="login">Login</button>
                            <a href="registrasi.php">registrasi</a>
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