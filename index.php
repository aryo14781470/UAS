<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toko Asia Baru</title>
    <link rel="stylesheet" href="css/index.css" type="text/css">
</head>
<?php
		session_start();
        if(!isset($_SESSION["login"])){
            header("location:login.php");
            exit;
        }
        require("include.php"); 
?>
<body>
    <div id="wrapper">
        <div id="header"> <?php require("header.php")?> </div>
        <div id="page">
            <div id="menu"><?php require("menu.php")?>
                <div id="identitas"> <?php require("identitas.php")?> </div>
            </div>
            <div id="home"> <?php require("page.php")?> </div>
            <br class="clear">
        </div>
        <div id="footer"><?php require("footer.php")?> </div>
    </div>
</body>
</html>