<?php
include "conn.php";

		$id=$_POST['id'];
		$baik= $_POST['baik'];
		$rusak=$_POST['rusak'];
		$baik1= $_POST['baik1'];
		$rusak1=$_POST['rusak1'];
		$baik2= $_POST['baik2'];
		$rusak2=$_POST['rusak2'];
		$baik3= $_POST['baik3'];
		$rusak3=$_POST['rusak3'];
		$tgl_kembali=$_POST['tgl_kembali'];
	
$cek_status=mysql_num_rows(mysql_query
             ("SELECT id FROM kembali1
               WHERE id='$id'"));
// Kalau username sudah ada yang pakai
if ($cek_status > 0){
  echo "<script>alert('Status Pengembalian Pending!'); window.location = 'index.php'</script>";
}
// Kalau username valid, inputkan data ke tabel users
		else{

		$query = mysql_query("UPDATE pinjam SET status='PENDING' WHERE id='$id'")or die(mysql_error());
		$sql=mysql_query("INSERT INTO kembali1(id,baik,rusak,baik1,rusak1,baik2,rusak2,baik3,rusak3,tgl_kembali) VALUES
            ('$id','$baik','$rusak','$baik1','$rusak1','$baik2','$rusak2','$baik3','$rusak3','$tgl_kembali')");

		if ($sql){
			echo "<script>alert('Data Peminjaman Berhasil dimasukan!'); window.location = 'index.php'</script>";	
		} else {
			echo "<script>alert('Data Peminjaman Gagal dimasukan!'); window.location = 'index.php'</script>";	
		}
	}
?>