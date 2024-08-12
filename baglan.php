<?php
//$conn = mysqli_connect("localhost","121620201062","TLuPtqAYkDA","db_121620201062");
$conn = mysqli_connect("localhost","root","","pd1");

/* bağlantı kontrolü */

if ( mysqli_connect_errno()) {
	echo "Bağlantı başarısız. Hata : ".mysqli_connect_error();
	die();
}
else {
//  echo "Baglanti başarılı";
	mysqli_query($conn,"SET NAMES 'utf8'");
}

/* baglantiyi sonlandirmak icin */
// mysqli_close($conn)




?>