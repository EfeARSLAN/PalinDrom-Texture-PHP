
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


$username_err=$email_err=$password_err=$passwordcon_err="";

$useraccept=$mailaccept=$passwordaccept=$passwordconaccept=0;

if (isset($_POST["kaydet"]))
{
  // useranme
  if (empty($_POST["kullaniciadi"]))
  {
    $username_err="Choose a User name";
    
  }

include("baglanti.php");  
           $query = "select * from kullanicilar";  
           $run = mysqli_query($baglanti,$query); 
         $i=1;  
              if ($num = mysqli_num_rows($run)>0) {  
                   while ($result = mysqli_fetch_assoc($run)) {  
                    if (($_POST["kullaniciadi"]==$result['kullanici_adi']))
                        {
                          $username_err="This user name is already exist";
                          
                        }
                       // echo "  <h1>".$result['kullanici_adi']."</h1>  ";  
                        
                       else {
                        if(strlen($_POST["kullaniciadi"])<3)
                        {
                          $username_err="User name must be more than 2 character";
                          
                        }
                        else if(strlen($_POST["kullaniciadi"])>8)
                        {
                          $username_err="User name must be less than 9 character";
                          
                        }
                        else if (!preg_match('/^[a-z\d_]{2,20}$/i',$_POST["kullaniciadi"])) {
                          $username_err="Your username can't contain !'^+%&/(...";
                          
                        }
                        else {
                            $username=$_POST["kullaniciadi"];
                            $useraccept=1;
                          }
                       }
                      }  
              }

  

// e mail
    if (empty($_POST["email"])) {
      $email_err="E-mail can't be empty";
    }

    include("baglanti.php");  
           $query = "select * from kullanicilar";  
           $run = mysqli_query($baglanti,$query); 
         $i=1;  
              if ($num = mysqli_num_rows($run)>0) {  
                   while ($result = mysqli_fetch_assoc($run)) {  
                    if (($_POST["email"]==$result['email']))
                        {
                          $email_err="This e-mail is already signed";
                          
                        }
                       // echo "  <h1>".$result['kullanici_adi']."</h1>  ";  
                        
                        
                      else {
                         if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                          $email_err = "Invalid email format";
                        }
                        else {
                          $email=$_POST["email"];
                          $mailaccept=1;
                        }
                      }
                    }
              }


// password
    if (empty($_POST["parola"])) {
      $password_err="Please choose a password.";
    }
    else {
      $password=password_hash($_POST["parola"],PASSWORD_DEFAULT);
      $passwordaccept=1;
    }
// confirm passwords
    if (empty($_POST["parolatekrar"])) {
      $passwordcon_err="Please confirm the password.";
    }
    elseif ($_POST["parola"]!=$_POST["parolatekrar"]) {
      $passwordcon_err="Passwords must be same.";
    }
    else {
      $passwordconaccept=1;
    }


// is there any problem

    //insert

  
//    echo $useraccept;
//    echo $mailaccept;
//    echo $passwordaccept;
//    echo $passwordconaccept;

    if ($useraccept==1 && $mailaccept==1 && $passwordaccept==1 && $passwordconaccept==1) {
      $ekle="INSERT INTO kullanicilar (kullanici_adi,email,parola) VALUES ('$username','$email','$password')";
        $calistirekle=mysqli_query($baglanti,$ekle);
        
        echo '<div class="alert alert-success" role="alert">
        Registration succeed.
      </div>';



    }
    else {
      echo '<div class="alert alert-danger" role="alert">
      Registration failed.
    </div>';
    }
    mysqli_close($baglanti);
    

  
}
?>




<div class="container">
<form action="http://localhost/pd1/index.php?sign=kayit.php" method="POST">
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
    <label for="exampleInputEmail1" class="form-label">E-mail adress</label>
    <input type="email" class="form-control 
    <?php
        if (!empty($email_err)) {
          echo "is-invalid";
        }
        ?>" id="exampleInputPassword1"name="email">
    <div class="invalid-feedback">
        <?php
        echo $email_err;
        ?>
      </div>
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
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
    <label for="exampleInputPassword1" class="form-label">Confirm password</label>
    <input type="password" class="form-control <?php
        if (!empty($passwordcon_err)) {
          echo "is-invalid";
        }
        ?>" id="exampleInputPassword1"name="parolatekrar">
    <div class="invalid-feedback">
        <?php
        echo $passwordcon_err;
        ?>
      </div>
  </div>
  <div class="mb-3">
    
  </div>


  <button type="submit" class="btn btn-primary" name="kaydet">Submit</button>
  
</form>

</div>
