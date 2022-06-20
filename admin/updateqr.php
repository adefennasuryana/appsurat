<?php
include "../conn.php";
$id_alat        = $_POST['id_alat'];
$qrcode			= $_POST['qrcode'];


$query = mysql_query("UPDATE inventaris SET qrcode='$qrcode' WHERE id_alat='$id_alat'")or die(mysql_error());
if ($query){
header('location:generate.php');	
} else {
	echo "gagal";
    }
?>