<?php
include "../conn.php";
$id_alat       = $_POST['id_alat'];
$nama_alat     = $_POST['nama_alat'];
$tgl_msk       = $_POST['tgl_msk'];
$merk	       = $_POST['merk'];
$satuan	       = $_POST['satuan'];
$jumlah	       = $_POST['jumlah'];
$baik    	   = $_POST['baik'];
$rusak	       = $_POST['rusak'];
$keterangan    = $_POST['keterangan'];
$kategori      = $_POST['kategori'];


$query = mysql_query("UPDATE inventaris SET id_alat='$id_alat', nama_alat='$nama_alat', tgl_msk='$tgl_msk', merk='$merk', satuan='$satuan', jumlah='$jumlah', baik='$baik', rusak='$rusak', keterangan='$keterangan', kategori='$kategori'
WHERE id_alat='$id_alat'")or die(mysql_error());
if ($query){
header('location:anggota.php');	
} else {
	echo "gagal";
    }
?>