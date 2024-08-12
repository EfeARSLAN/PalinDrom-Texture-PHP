<!DOCTYPE html>
<html lang="en">
<head>
  <title>PalinDrom Texture</title>
  <link rel="stylesheet" href="aa.css"></link>
</head>
<?php
session_start();

if (isset($_SESSION["kullanici_adi"])) {
    if ($_SESSION["kullanici_adi"]=="Palin") {
        
        echo "<user>Admin name: ".$_SESSION["kullanici_adi"]."</user>";
        echo "<br>";
        echo "<user>Welcome admin user</user>";
        echo "<br>";
        echo "<br>";
        echo "<user>E-mail: ".$_SESSION["email"]."</user>";
        echo "<br>";
        echo "<br>";
        echo "<user>Sign date: ".$_SESSION["kayit_tarihi"]."</user>";
        echo "<br>";
        echo "<br>";
        echo "<div class='cel'>";
        echo "<div class='sign'><a href='cikis.php'>Sign out</a></div>";
        echo "<div class='sign'><a href='http://localhost/pd1/index.php?all=All.php'>Main page</a></div>";
        echo "<div class='sign'><a href='user.php'>User Panel</a></div>";
        echo "<div class='sign'><a href='texpanel.php'>Tex panel</a></div>";
        echo "<div class='sign'><a href='addtex.php'>Add Texture</a></div>";
        echo "</div>";
    }
    else {
        echo "<user>User name: ".$_SESSION["kullanici_adi"]."</user>";
        echo "<br>";
        echo "<user>E-mail: ".$_SESSION["email"]."</user>";
        echo "<br>";
        echo "<user>Sign date: ".$_SESSION["kayit_tarihi"]."</user>";
        echo "<br>";
        echo "<div class='sign'><a href='cikis.php'>Sign out</a></div>";
        echo "<div class='sign'><a href='http://localhost/pd1/index.php?all=All.php'>Main page</a></div>";
    }
}

else {
    echo "<user>Permission denied.</user>";

}
?>