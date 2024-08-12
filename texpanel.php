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
        echo "<div class='sign'><a href='http://localhost/pd1/profile.php'>Back</a></div>";
        echo "<table border='2' cellspacing='1' cellpadding='1'>  
        <tr class='heading'> 
             <th>Sl No</th>  
             <th>ID</th>  
             <th>Texture Name</th>  
             <th>Description</th>  
             <th>Texture's image</th>  
             <th>Delete</th>  
             <th>Update</th>  
             <th>Rar</th> 
  
        </tr> ";
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data'>  
                          <td>".$i++."</td>  
                               <td>".$result['id_texture']."</td>  
                               <td>".$result['name_texture']."</td>  
                               <td>".$result['description_texture']."</td>  
                               <td align='center'><img width='100' height='100' border-radius: %50 src='img/".$result['id_texture'].".jpg'></td>
                               <td><a href='Deletetex.php?id_texture=".$result['id_texture']."' id_texture='btn'>Delete</a></td> 
                               <td><a href='updatetex.php?id_texture=".$result['id_texture']."' id_texture='btn'>Update</a></td> 
                               <td><a href='addrar.php?id_texture=".$result['id_texture']."' addrar='btn'>Rar</a></td> 
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
