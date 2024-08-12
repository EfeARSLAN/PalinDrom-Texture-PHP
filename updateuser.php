<?php 
session_start();
if (isset($_SESSION["kullanici_adi"])) {
     if ($_SESSION["kullanici_adi"]=="Palin") {
          include 'baglanti.php';  
               if (isset($_GET['id'])) {  
                    $id = $_GET['id'];  
                    echo $id;
                    $id = $_GET['email'];  
                    echo $id;
                    $query = "SELECT FROM `kullanicilar` WHERE id = '$id' ";  
                    $run = mysqli_query($baglanti,$query);  
                    if ($run) {  
                         echo $_SESSION["kullanici_adi"] ;
                         echo"oldu" ; 
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