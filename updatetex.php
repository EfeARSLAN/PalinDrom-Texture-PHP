
<?php   
 include "baglan.php";  
 $msg="";  
 $uname="";  
 $description="";  
$admin=0;
session_start();
if (isset($_SESSION["kullanici_adi"])) {
     if ($_SESSION["kullanici_adi"]=="Palin") {
          $admin=1;
           
 
 
     }
     else {
          $admin=0;
          echo "<user>Permission denied.</user>";
          header("profile.php");
     }
 }
 
 else {
     echo "<user>Permission denied.</user>";
 }  

 


 if (isset($_GET['id_texture'])&& $admin==1) {  
      $id=$_GET['id_texture'];  
      $select=mysqli_query($conn,"select * from Textures where id_texture='$id'");  
      $data=mysqli_fetch_assoc($select);  
      $uname=$data['name_texture'];  
 
      $description=$data['description_texture'];  
 
 }  
 if (isset($_POST['submit'])&& $admin==1) {  
      $uname=$_POST['name_texture'];  
      $description=$_POST['description_texture'];  
      if (isset($_GET['id_texture'])) { 
           $update=mysqli_query($conn,"UPDATE `Textures` SET `name_texture`='$uname',`description_texture`='$description' WHERE id_texture='$id'"); 
           if ($update) {  
                header("http://localhost/pd1/index.php?all=All.php"); 
                 

           }  
      }else{  
        $insert=mysqli_query($conn,"INSERT INTO `Textures`(`name_texture`,`description_texture`) VALUES ('$uname','$description')"); 
           if ($insert) {  
                $msg="Data inserted successfully";  
           }else{  
                $msg="Something Error, Try after sometime !";  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <title>PalinDrom Texture</title>  
      <style type="text/css">  
           *{  
                padding: 15px;  
                margin: 0;  
                box-sizing: border-box;  
                font-family: 'verdana', sans-serif;  
           }  
           body{  
                width: 100%;  
                height: 100vh;  
                display: flex;  
                justify-content: center;  
                align-items: center;  
                background-color: rgb(39, 38, 38);
           }  
           .container{  
                max-width: 500px;  
                width: 100%;  
                background: linear-gradient(180deg, rgb(93 8 245 / 53%) 0%, rgb(171 144 208 / 72%) 44.62%, rgb(255 0 119 / 18%) 100%);
                border-radius: 90px 90px 90px 90px; 
           }  
           .container form{  
                width: 100%;  
                padding: 30px;  
           }  
           .container form .data-insert{  
                width: 100%;  
                padding: 12px 10px;  
                outline: none;  
                border: 1px solid #111;  
                margin: 8px 0px ;
                border-radius: 90px 90px 90px 90px; 
                
           }  
           .container form .sub_btn{  
                width: 100%;  
                padding: 10px 30px;  
                background-color: red; 
                border-radius: 90px 90px 90px 90px; 
                background: linear-gradient(180.58deg, rgb(86, 52, 104) 0.5%, rgb(117, 81, 81) 76.12%); 
                text-shadow: 2px 2px rgb(12, 83, 29);
                box-shadow: 0px 0px 2px 2px rgba(30, 76, 240, 0.25);
                color: rgb(153, 143, 247);
                font-size: 1em;  
                outline: none;  
                border: 0;  
                cursor: pointer;  
           }  
           .container h1{  
                display: block;  
                text-align: center;  
                padding: 15px 0px;  
           }  
           .container form .sub_btn:hover{  
                width: 100%;  
                padding: 10px 30px;  
                background-color: red; 
                border-radius: 90px 90px 90px 90px; 
                background: linear-gradient(180.58deg, rgb(152 78 191) 0.5%, rgb(208 124 124) 76.12%);
                text-shadow: 2px 2px rgb(12, 83, 29);
                box-shadow: 0px 0px 3px 3px rgba(30, 76, 240, 0.25);
                color: #ffff;  
                font-size: 1em;  
                outline: none;  
                border: 0;  
                cursor: pointer;  
           }
           a{
               width: 100%; 
               text-decoration: none; 
                padding: 10px 30px;  
                background-color: red; 
                border-radius: 90px 90px 90px 90px; 
                background: linear-gradient(180.58deg, rgb(86, 52, 104) 0.5%, rgb(117, 81, 81) 76.12%); 
                text-shadow: 2px 2px rgb(12, 83, 29);
                box-shadow: 0px 0px 2px 2px rgba(30, 76, 240, 0.25);
                color: rgb(153, 143, 247);
                font-size: 1em;  
                outline: none;  
                border: 0;  
                cursor: pointer; 
           }
           a:hover{
               text-decoration: none;
                width: 100%;  
                padding: 10px 30px;  
                background-color: red; 
                border-radius: 90px 90px 90px 90px; 
                background: linear-gradient(180.58deg, rgb(152 78 191) 0.5%, rgb(208 124 124) 76.12%);
                text-shadow: 2px 2px rgb(12, 83, 29);
                box-shadow: 0px 0px 3px 3px rgba(30, 76, 240, 0.25);
                color: #ffff;  
                font-size: 1em;  
                outline: none;  
                border: 0;  
                cursor: pointer;  
           }
           green{
               color: greenyellow;
           }
           lightgreen{
               color: lightgreen;
           }
           lightred{
               color: lightcoral;
           }
           red{
               color: red;
           }
           user {
               text-align: center;
               color: rgb(190, 204, 252);
               text-shadow: 2px 2px purple;
               padding-left: 15px;
               position: relative;
               /* left: 10px; */
               /* top: 0px; */
               font-family: cursive;
               font-size: 150%;
          }
          .button {
               background: linear-gradient(180.58deg, rgb(86, 52, 104) 0.5%, rgb(117, 81, 81) 76.12%); 
               border: none;
               color: white;
               padding: 15px 32px;
               text-align: center;
               text-decoration: none;
               display: inline-block;
               font-size: 16px;
               margin: 4px 2px;
               cursor: pointer;
               border-radius: 45px 45px 45px 45px; 
               }
          .button:hover {
               background: linear-gradient(180.58deg, rgb(152 78 191) 0.5%, rgb(208 124 124) 76.12%);
                text-shadow: 2px 2px rgb(12, 83, 29);
                box-shadow: 0px 0px 3px 3px rgba(30, 76, 240, 0.25);
               }
      </style>  
 </head>  
 <body>  
 <?php
 if ($admin==1){
     echo "<td align='center'><img width='300' height='300' border-radius: %50 src='img/".$_GET['id_texture'].".jpg'></td>";
 }

?>

 <div class="container">  
 <user><h1>Data Change</h1></user>
      <form method="post" action="">  
           <input type="text" name="name_texture" placeholder="Change name" class="data-insert" value="<?php echo $uname; ?>">    
 
           <input type="text" name="description_texture" placeholder="Change description" class="data-insert" value="<?php echo $description; ?>">  
           
           <input type="submit" name="submit" class="sub_btn" value="Submit">  
           <br>  
           <span><?php echo $msg; ?></span> 
           <br> 
          <div class='sign'><a href='http://localhost/pd1/texpanel.php'>Back</a></div>
      </form>  
 </div>
 <?php
if(isset($_FILES["fileToUpload"])&& $admin==1) {
  $target_dir = "C:/xampp/htdocs/pd1/img/";
  $target_file = $target_dir . $_GET['id_texture'] . '.' . strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Form gönderildiğinde işlemleri yap
  if(isset($_POST["yukle"])&& $admin==1) {
    // Dosyanın geçerli bir resim olup olmadığını kontrol et
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "<lightgreen> Dosya bir resim - " . $check["mime"] . ".</lightgreen>";
      $uploadOk = 1;
    } else {
      echo "<lightred>Dosya bir resim değil.</lightred>";
      $uploadOk = 0;
    }

    // Dosyayı belirtilen konuma yükle
    if ($uploadOk == 1) {
   
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<green>Dosya başarıyla yüklendi.</green>";
      } else {
        echo "<red>Dosya yüklenirken bir hata oluştu.</red>";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>
<body>
<div class="container">  

  <form action="updatetex.php?id_texture=<?php echo $_GET['id_texture']; ?>" method="post" enctype="multipart/form-data">
  <user>Görsel seçin:</user>
    <input class="button" type="file" name="fileToUpload" id="fileToUpload">
    <input class="button" type="submit" value="Upload" name="yukle">
  </form>
</div>
