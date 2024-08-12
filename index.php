<!DOCTYPE html>
<html lang="en">
<head>
  <title>PalinDrom Texture</title>
  <link rel="stylesheet" href="aa.css"></link>
</head>
<body contenteditable="false">
<?php
include('baglan.php');
$sorgu = mysqli_query($conn,"select * from Textures order by name_texture asc");
$say = mysqli_num_rows($sorgu);
?>
<div class="leftpanel0">
	<div class="leftpanel">
	<div class="light"></div>
	<?php
session_start();
$useronline=0;
if (isset($_SESSION["kullanici_adi"])) {

    if ($_SESSION["kullanici_adi"]=="Palin") {
		echo "<a href='profile.php'><user>".$_SESSION["kullanici_adi"]."</user></a>";
		echo "<div class='sign'> <a href='index.php?sign=cikis.php'>Sign out</a></div>";
		$useronline=1;
    }
    else {
        echo "<a href='profile.php'><user>".$_SESSION["kullanici_adi"]."</user></a>";

		echo "<div class='sign'> <a href='index.php?sign=cikis.php'>Sign out</a></div>";
		$useronline=1;  
    }
}

else {
    echo "<div class='sign'> <a href='index.php?sign=kayit.php'>Sign up</a></div>";
	echo "<div class='sign'> <a href='index.php?sign=login.php'>Log in</a></div>";
}
?>
	
	<div class="sign"> <a href="index.php?all=All.php">All Texture</a></div>
	<div class="sign"> <a href="index.php?fabtex=fabric.php">Fabric</a></div>
	<div class="sign"> <a href="index.php?woodtex=wood.php">Wood</a></div>
	<div class="sign"> <a href='index.php?stonetex=stone.php'>Stone</a></div>
	<div class="sign"> <a href='index.php?metaltex=metal.php'>Metal</a></div>
	<div class="sign"> <a href='index.php?walltex=wall.php'>Wall</a></div>
	<div class="sign"> <a href='index.php?floortex=floor.php'>Floor</a></div>


		</div>
		<div class="insta">
		<a href="https://www.instagram.com/palin_drom7/" target="_blank"><img src="insta.png" style="width:100px;height:100px;"></a>
		</div>

		<div class="pdf">
		<a href="efe_arslan_121620201062.pdf" target="_blank">Link to a pdf</a>
		</div>
	</div>
	</div>
	</div>
	<?php
$page = "index.php";


		if(isset($_GET["all"])) {
			include_once($_GET["all"]);
		}
		else if(isset($_GET["sign"]))
		{
			include_once($_GET["sign"]);
		}
		else if(isset($_GET["fabtex"]))
		{
			include_once($_GET["fabtex"]);
		}
		else if(isset($_GET["woodtex"]))
		{
			include_once($_GET["woodtex"]);
		}
		else if(isset($_GET["stonetex"]))
		{
			include_once($_GET["stonetex"]);
		}
		else if(isset($_GET["metaltex"]))
		{
			include_once($_GET["metaltex"]);
		}
		else if(isset($_GET["walltex"]))
		{
			include_once($_GET["walltex"]);
		}
		else if(isset($_GET["floortex"]))
		{
			include_once($_GET["floortex"]);
		}
		else if(isset($_GET["sign"]))
		{
			include_once($_GET["sign"]);
		}
		else{
			include_once($page);
			
		}
		?>
</body>

