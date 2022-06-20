<?php

include "../conn.php";

{
	    $id_alat = $_POST['id_alat'];
	    $kd_alat = $_POST['kd_alat'];
		$nama_alat= $_POST['nama_alat'];
		$tgl_msk=$_POST['tgl_msk'];
        $merk=$_POST['merk'];
		$satuan=$_POST['satuan'];
		$lokasi=$_POST['lokasi'];
		$kondisi=$_POST['kondisi'];
		$keterangan=$_POST['keterangan'];
		$kategori=$_POST['kategori'];
		$dipinjamkan=$_POST['dipinjamkan'];
}
	{			
		
		$sql=mysql_query("INSERT INTO inventaris(id_alat,kd_alat,nama_alat,tgl_msk,merk,satuan,lokasi,kondisi,keterangan,kategori,dipinjamkan) VALUES
            ('$id_alat','$kd_alat','$nama_alat','$tgl_msk','$merk','$satuan','$lokasi','$kondisi','$keterangan','$kategori','$dipinjamkan')");
		if ($sql){
			echo "<script>alert('Data Inventaris Berhasil dimasukan!'); window.location = 'semua_inventaris.php'</script>";	
		} else {
			echo "<script>alert('Data Inventaris Gagal dimasukan!'); window.location = 'semua_inventaris.php'</script>";	
		}
            	   
	}


?>
