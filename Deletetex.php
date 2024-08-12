<?php   
 
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>PalinDrom Texture</title>
  <link rel="stylesheet" href="aa.css"></link>
</head>
<?php
session_start();
 
 include 'baglan.php';  
 $query = "select * from Textures";  
 $run = mysqli_query($conn,$query);  
  
if (isset($_SESSION["kullanici_adi"])) {
    if ($_SESSION["kullanici_adi"]=="Palin") {
               include 'baglan.php';  
               if (isset($_GET['id_texture'])) {  
                    $id = $_GET['id_texture'];  
                    $query = "DELETE FROM textures WHERE `textures`.`id_texture` = $id";
                    $run = mysqli_query($conn,$query);  
                    if ($run) {  
                         header('location:texpanel.php');  
                    }else{  
                         echo "Error: ".mysqli_error($conn);  
                    }  
     }        
    }
    else {
        echo "<user>Permission denied.</user>";
    }
}

else {
    echo "<user>Permission denied.</user>";

}
?>