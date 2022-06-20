<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pinjam Alat Berbasis Web</title>
          <style type="text/css">

          </style>
          <?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Inventaris.xls");
  ?>
      </head>
      <body class="skin-black">
                <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../login.html"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            


                    <aside class="right-side">

                <!-- Main content -->
                <div class="col-md-12">
                            <section class="panel">
                              <header class="panel-heading">
                                <center><h1>Laporan Data<br/> Inventaris</h1></center>
                            </header>
                            <div class="panel-body table-responsive">
                            <?php
                    $query="select * from inventaris";
                    $tampil=mysql_query($query) or die(mysql_error());
                    $noUrut=1;
                    ?>
                                <table border="1">
                                  <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alat</th>
                                        <th>Merk</th>
                                        <th>Satuan</th>
										<th>Tanggal Masuk</th>
										<th>Jumlah</th>
                                        <th>Baik</th>
                                        <th>Rusak </th>
                                        <th>Keterangan</th>
                                        <th>Kategori</th>
                                  </tr>
                              </thead>
                              
                                 <?php while($data1=mysql_fetch_array($tampil))
                    { ?>
                    <tbody>
                    <tr>
                    <td><?php echo $noUrut; $noUrut++; ?></td>
                    <td><?php echo $data1['nama_alat']; ?></td>
                    <td><?php echo $data1['merk']; ?></td>
                    <td><?php echo $data1['satuan'];?></td>
					<td><?php echo $data1['tgl_msk'];?></td>
					<td><?php echo $data1['jumlah'];?></td>
                    <td><?php echo $data1['baik'];?></td>
                    <td><?php echo $data1['rusak'];?></td>
                    <td><?php echo $data1['keterangan'];?></td>
                    <td><?php echo $data1['kategori'];?></td>
                    <?php   
              } 
              ?>
              
                      </tr>
                      <h4>Nama : <?php echo $_SESSION['fullname']; ?></h4>
                                    <h4>Tanggal : <?php $tgl=date('d-m-Y'); echo $tgl; ?></h4>
                  </tbody></table>
                  <?php $tampil1=mysql_query("select * from inventaris");
                        $user1=mysql_num_rows($tampil1);
                    ?>
                  <center><h4>Jumlah Inventaris : <?php echo "$user1"; ?> </h4> </center>
                  </div>
              </section>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->
</body>
</html>