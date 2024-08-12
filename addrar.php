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
                border-radius: 45px 45px 45px 45px; 
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
           echo "<td align='center'><img width='300' height='300' border-radius: %50 src='img/".$_GET['id_texture'].".jpg'></td>";
           ?>


<?php
if (isset($_FILES["fileToUpload"])&& $admin==1) {
  $target_dir = "C:/xampp/htdocs/pd1/img/";
  $target_file = $target_dir . $_GET['id_texture'] . '.' . strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Form gönderildiğinde işlemleri yap
  if (isset($_POST["yukle"])) {
    // Dosyanın geçerli bir .rar dosyası olup olmadığını kontrol et
    if ($fileType != "rar") {
      echo "<lightred>Yalnızca .rar dosyaları yükleyebilirsiniz.</lightred>";
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
  <form action="addrar.php?id_texture=<?php echo $_GET['id_texture']; ?>" method="post" enctype="multipart/form-data">
  <user>Rar seçin:</user>
    <input class="button" type="file" name="fileToUpload" id="fileToUpload">
    <input class="button" type="submit" value="Yükle" name="yukle">
  </form>
  <div class='sign'><a href='http://localhost/pd1/texpanel.php'>Back</a></div>
</div>
</body>
</html>

