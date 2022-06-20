<?php

include "../conn.php";

{
	    $id_alat = $_POST['id_alat'];
		$nama_alat= $_POST['nama_alat'];
		$tgl_msk=$_POST['tgl_msk'];
        $merk=$_POST['merk'];
		$satuan=$_POST['satuan'];
		$jumlah=$_POST['jumlah'];
		$baik=$_POST['baik'];
		$rusak=$_POST['rusak'];
		$keterangan=$_POST['keterangan'];
		$kategori=$_POST['kategori'];
}
	{			
		
		$sql=mysql_query("INSERT INTO inventaris(id_alat,nama_alat,tgl_msk,merk,satuan,jumlah,baik,rusak,keterangan,kategori) VALUES
            ('$id_alat','$nama_alat','$tgl_msk','$merk','$satuan','$jumlah','$baik','$rusak','$keterangan','$kategori')");
		if ($sql){
			echo "<script>alert('Data Inventaris Berhasil dimasukan!'); window.location = 'habis_pakai.php'</script>";	
		} else {
			echo "<script>alert('Data Inventaris Gagal dimasukan!'); window.location = 'habis_pakai.php'</script>";	
		}
            	   
	}


?>
