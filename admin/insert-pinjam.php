<?php
include "conn.php";

{
	    $id = $_POST['id'];
		$nama= $_POST['nama'];
		$jenis_kelamin=$_POST['jenis_kelamin'];
        $kelas=$_POST['kelas'];
		$pinjam=$_POST['pinjam'];
		$pinjam1=$_POST['pinjam1'];
		$pinjam2=$_POST['pinjam2'];
		$pinjam3=$_POST['pinjam3'];
		$jumlah=$_POST['jumlah'];
		$jumlah1=$_POST['jumlah1'];
		$jumlah2=$_POST['jumlah2'];
		$jumlah3=$_POST['jumlah3'];
		$tgl_pinjam=$_POST['tgl_pinjam'];
		$jabatan=$_POST['jabatan'];
		$status=$_POST['status'];
}
	{			
		//if( empty($nama) || empty($jenis_kelamin) || empty($kelas) || empty($pinjam) || empty($jumlah) ){
    //echo "<b>Data Harus Di isi.!!!</b>";
//}else{
		
		$sql=mysql_query("INSERT INTO pinjam(id,nama,jenis_kelamin,kelas,pinjam,jumlah,pinjam1,jumlah1,pinjam2,jumlah2,pinjam3,jumlah3,tgl_pinjam,jabatan,status) VALUES
            ('$id','$nama','$jenis_kelamin','$kelas','$pinjam','$jumlah','$pinjam1','$jumlah1','$pinjam2','$jumlah2','$pinjam3','$jumlah3','$tgl_pinjam','$jabatan','$status')");
		if ($sql){
			echo "<script>alert('Data Peminjaman Berhasil dimasukan!'); window.location = 'index.php'</script>";	
		} else {
			echo "<script>alert('Data Peminjaman Gagal dimasukan!'); window.location = 'index.php'</script>";	
		}
      //}   	   
	}
?>