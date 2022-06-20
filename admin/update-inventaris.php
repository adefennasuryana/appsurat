<?php
include "../conn.php";
$id_alat       = $_POST['id_alat'];
$kd_alat	   = $_POST['kd_alat'];
$nama_alat     = $_POST['nama_alat'];
$tgl_msk       = $_POST['tgl_msk'];
$merk	       = $_POST['merk'];
$satuan	       = $_POST['satuan'];
$lokasi	       = $_POST['lokasi'];
$kondisi   	   = $_POST['kondisi'];
$keterangan    = $_POST['keterangan'];
$kategori      = $_POST['kategori'];
$dipinjamkan   = $_POST['dipinjamkan'];


$query = mysql_query("UPDATE inventaris SET id_alat='$id_alat', kd_alat='$kd_alat', nama_alat='$nama_alat', tgl_msk='$tgl_msk', merk='$merk', satuan='$satuan', lokasi='$lokasi', kondisi='$kondisi', keterangan='$keterangan', kategori='$kategori',dipinjamkan='$dipinjamkan'
WHERE id_alat='$id_alat'")or die(mysql_error());
if ($query){
			echo "<script>alert('Data Inventaris Berhasil Diperbarui!'); window.location = 'javascript:history.go(-1)'</script>";	
		} else {
			echo "<script>alert('Data Inventaris Gagal Diperbarui!'); window.location = 'semua_inventaris.php'</script>";	
		}
?>