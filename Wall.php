<!DOCTYPE html>
<html>
<head>
  <title>PalinDrom Texture</title>
  <link rel="stylesheet" href="aa.css"></link>
</head>
<body>
<?php
include('baglan.php');
$sorgu = mysqli_query($conn,"select * from Textures where name_texture REGEXP 'wall'");
$say = mysqli_num_rows($sorgu);
?>
	<div class="container">
	<?php
	if ( $say > 0 ) {	
		while ( $satir = mysqli_fetch_array($sorgu)) {
			echo '<div class="col">';
			echo '<div class="title">';
			echo "<l>".$satir['name_texture']."</l>";
			echo '</div>';
			echo '<div class="cel">';
			echo "<c align='center'><img width='300' height='300' border-radius: %50 src='img/".$satir['id_texture'].".jpg'></c>";
			echo '<div class="cel">';
			echo '<div class="deskp">';
			echo "<k>".$satir['description_texture']."</k>";
			echo '<div class="download">';
			if ($useronline==1) {
				echo "<e><a href='img/".$satir['id_texture'].".rar' download>".$satir['name_texture']." Download</a></e>";
			}
			else {
				echo "<e><a href='index.php?sign=kayit.php'>Sign up for download</a></e>";
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}
	?>
	</div>
</body>

