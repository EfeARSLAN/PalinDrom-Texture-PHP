<?php 
session_start();
if (isset($_SESSION["kullanici_adi"])) {
     if ($_SESSION["kullanici_adi"]=="Palin") {
          include 'baglanti.php';  
               if (isset($_GET['id'])) {  
                    $id = $_GET['id'];  
                    $query = "DELETE FROM `kullanicilar` WHERE id = '$id'";  
                    $run = mysqli_query($baglanti,$query);  
                    if ($run) {  
                         header('location:user.php');  
                    }else{  
                         echo "Error: ".mysqli_error($baglanti);  
                    }  
               }
           
 
 
     }
     else {
         echo "<user>Permission denied.</user>";
         header("profile.php");
     }
 }
 
 else {
     echo "<user>Permission denied.</user>";
 }  

 
?>
