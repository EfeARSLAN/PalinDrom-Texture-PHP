
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

include("baglan.php");


$username_err=$email_err=$password_err=$passwordcon_err="";

$useraccept=$mailaccept=$passwordaccept=$passwordconaccept=0;

if (isset($_POST["kaydet"]))
{
  // useranme
  if (empty($_POST["texname"]))
  {
    $username_err="Choose a Texture name";
    
  }
  else if(strlen($_POST["texname"])<3)
  {
    $username_err="Texture name must be more than 2 character";
    
  }
  else if(strlen($_POST["texname"])>30)
  {
    $username_err="Texture name must be less than 30 character";
    
  }
  
    else {
      $username=$_POST["texname"];
      $useraccept=1;
    }
// e mail
    if (empty($_POST["deskp"])) {
      $email_err="Description can't be empty";
    }
    else {
      $email=$_POST["deskp"];
      $mailaccept=1;
    }
// password



    if (isset($username) && isset($email))
    {
    
    $ekle="INSERT INTO textures (name_texture,description_texture) VALUES ('$username','$email')";
  }
    
    if ($useraccept==1 && $mailaccept==1) {
        $calistirekle=mysqli_query($conn,$ekle);
        echo '<div class="alert alert-success" role="alert">
        Registration succeed.
      </div>';



    }
    else {
        echo '<div class="alert alert-danger" role="alert">

        Registration failed.
      </div>';
    }
    mysqli_close($conn);
    

  
}
?>




<div class="container">
<form action="addtex.php" method="POST">
  <div class="mb-3">
    <label  class="form-label">Texture Name</label>
    <input type="text" class="form-control 
    <?php
        if (!empty($username_err)) {
          echo "is-invalid";
        }
        ?>
    
    " id="exampleInputEmail1"name="texname">
    <div class="invalid-feedback">
        <?php
        echo $username_err;
        ?>
      </div>


  </div>
  <div class="mb-3">
    <label  class="form-label">Texture Description</label>
    <input type="text" class="form-control 
    <?php
        if (!empty($email_err)) {
          echo "is-invalid";
        }
        ?>" id="exampleInputPassword1"name="deskp">
    <div class="invalid-feedback">
        <?php
        echo $email_err;
        ?>
      </div>
      
  </div>


  <button type="submit" class="btn btn-primary" name="kaydet">Submit</button>
  <div class='sign'><a href='http://localhost/pd1/profile.php'>Back</a></div>
</form>

</div>