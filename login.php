
<head>
  <title>PalinDrom Texture</title>
  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <link rel="stylesheet" href="aa copy.css"></link>
  </head>
  <body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
</head>


<?php

include("baglanti.php");


$username_err=$password_err=$code_err="";

$useraccept=$passwordaccept=$codeaccept=0;

if (isset($_POST["giris"]))
{
  // useranme
  if (empty($_POST["kullaniciadi"]))
  {
    $username_err="Choose a User name";
    
  }
  else if(strlen($_POST["kullaniciadi"])<3)
  {
    $username_err="User name must be more than 3 character";
    
  }
  else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullaniciadi"])) {
    $username_err="Your username can't contain !'^+%&/(...";
    
    }
    else {
      $username=$_POST["kullaniciadi"];
      $useraccept=1;
    }
// e mail
    
// password
    if (empty($_POST["parola"])) {
      $password_err="Please choose a password.";
    }
    else {
      $password=($_POST["parola"]);
      $passwordaccept=1;
    }
// confirm passwords
$kod = $_POST["kontrol"];
$dkod = $_SESSION["dogrulamakodu"];

if (empty($_POST["kontrol"])) {
  $code_err="Please write the code.";
}  
  else if ( strtolower($kod) == strtolower($dkod)) {
  $codeaccept=1;
  //$code_err="Doğru";
  $robot=$_SESSION["dogrulamakodu"];
  }
  else {
    $code_err="Wrong code.";
  }

}


    if (isset($username) && isset($password) && isset($robot))
    {
       if ($useraccept==1 && $passwordaccept==1 && $codeaccept==1) 
      {
        
      $secim="SELECT * FROM kullanicilar WHERE kullanici_adi='$username' ";
      $calistir=mysqli_query($baglanti,$secim);
      $kayitsayisi=mysqli_num_rows($calistir); 
      if ($kayitsayisi>0) {
        $ilgilikayit=mysqli_fetch_assoc($calistir);
        $hashlisifre=$ilgilikayit["parola"];
        
        if (password_verify($password,$hashlisifre)) {
          session_start();
          $_SESSION["kullanici_adi"]=$ilgilikayit["kullanici_adi"];
          $_SESSION["email"]=$ilgilikayit["email"];
          $_SESSION["parola"]=$ilgilikayit["parola"];
          $_SESSION["kayit_tarihi"]=$ilgilikayit["kayit_tarihi"];
          header("location:profile.php");
        }
        else{
          echo '<div class="alert alert-danger" role="alert">
       Password is wrong
      </div>';
        }
      }
      else{
        echo '<div class="alert alert-danger" role="alert">
        Username or password is wrong
      </div>';
      }

    }
    
    
    }
    mysqli_close($baglanti);
    

  

?>




<div class="container">
<form action="http://localhost/pd1/index.php?sign=login.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control 
    <?php
        if (!empty($username_err)) {
          echo "is-invalid";
        }
        ?>
    
    " id="exampleInputEmail1"name="kullaniciadi">
    <div class="invalid-feedback">
        <?php
        echo $username_err;
        ?>
      </div>


  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control 
    <?php
        if (!empty($password_err)) {
          echo "is-invalid";
        }
        ?>" id="exampleInputPassword1"name="parola">
    <div class="invalid-feedback">
        <?php
        echo $password_err;
        ?>
      </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Code</label>
    <img src="img.php" height="50" width="217" />
    <input type="text" class="form-control 
    <?php
        if (!empty($code_err)) {
          echo "is-invalid";
        }
        ?>" id="exampleInputPassword1"name="kontrol">
    <div class="invalid-feedback">
        <?php
        echo $code_err;
        ?>
      </div>
  </div>
  
 
  <button type="submit" class="btn btn-primary" name="giris">Log in</button>
  <button type="button" onclick="alert('Hello! Please contact us with this mail: asd@gmail.com !')" style="background-color: green; color: white; font-weight: bold; border-radius: 10px; height: 36px;">Forgot password</button>

</form>

</div>