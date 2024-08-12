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
        echo "<div class='cel'>";
        echo "<div class='sign'><a href='profile.php'>Back</a></div>";
        
           
           
           include("baglanti.php");  
           $query = "select * from kullanicilar";  
           $run = mysqli_query($baglanti,$query); 
           echo "<table border='2' cellspacing='1' cellpadding='1'>  
           <tr class='heading'>  
                <th>Sl No</th>  
                <th>ID</th>  
                <th>User Name</th>  
                <th>User e mail</th>  
                <th>Delete</th>  


     
           </tr> ";
         $i=1;  
              if ($num = mysqli_num_rows($run)>0) {  
                   while ($result = mysqli_fetch_assoc($run)) {  
                        echo "  
                             <tr class='data'>  
                             <td>".$i++."</td>  
                                  <td>".$result['id']."</td>  
                                  <td>".$result['kullanici_adi']."</td>  
                                  <td>".$result['email']."</td>  
                                  <td><a href='Deleteuser.php?id=".$result['id']."' id='btn'>Delete</a></td>  
  
                             </tr>  
                        ";  
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
