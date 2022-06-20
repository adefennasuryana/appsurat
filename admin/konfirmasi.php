<?php
include "../conn.php";
$id         	 = $_GET['id'];

$query = mysql_query("UPDATE pinjam SET status='DIKEMBALIKAN' WHERE id='$id'")or die(mysql_error())or die(mysql_error());
if ($query){
	echo "<script>alert('Data Berhasil Dikonfirmasi!'); window.location = 'index.php'</script>";	
} else {
	echo "<script>alert('Data Gagal Dikonfirmasi!'); window.location = 'index.php'</script>";	
}
?>
