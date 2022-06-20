<?php
include "../conn.php";
$id_alat = $_GET['kd'];

$query = mysql_query("DELETE FROM inventaris WHERE id_alat='$id_alat'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'habis_pakai.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'habis_pakai.php'</script>";	
}
?>