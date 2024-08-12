<?php
if(isset($_FILES["fileToUpload"])) {
  $target_dir = "C:/xampp/htdocs/pd1/img/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Form gönderildiğinde işlemleri yap
  if(isset($_POST["submit"])) {
    // Dosyanın geçerli bir resim olup olmadığını kontrol et
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "Dosya bir resim - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "Dosya bir resim değil.";
      $uploadOk = 0;
    }

    // Dosyayı belirtilen konuma yükle
    if ($uploadOk == 1) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Dosya başarıyla yüklendi.";
      } else {
        echo "Dosya yüklenirken bir hata oluştu.";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>
<body>
  <form action="denemee.php" method="post" enctype="multipart/form-data">
    Görsel seçin:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Yükle" name="submit">
  </form>
</body>
</html>
