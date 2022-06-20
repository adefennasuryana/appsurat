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
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Hakko Bio Richard">
    <meta name="keywords" content="Perpus, Website, Aplikasi, Perpustakaan, Online">
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <!-- css aside right -->
    <link href="css/bootstrap.min.css" rel="stylesheet">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

          </style>
      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                Pinjam Alat
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                    <li>
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <a href="admin.php">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Settings
                                        </a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Log out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
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
                            <div class="user-panel">
                                <div>
                                    <center><img src="<?php echo $_SESSION['gambar']; ?>" height="80" width="80" class="img-circle" alt="User Image" style="border: 3px solid white;" /></center>
                                </div>
                                <div class="info">
                                    <center><p><?php echo $_SESSION['fullname']; ?></p></center>

                                </div>
                            </div>
                            <!-- search form -->
                            <!--<form action="#" method="get" class="sidebar-form">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form> -->
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <?php include "menu.php"; ?>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">

                <!-- Main content -->
                <section class="content" style="height: 575px;">
<div class="col-md-12" id="QR-Code">
            <div class="panel panel-primary">
                <div class="panel-heading">
                        <h4>Hasil Scan QR Code</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">                                
                        <tr>
                            <td colspan="2">
                                <center>
                                <img src="logo.png" width="90px">
                                <h2>SMK NU Ma'arif 2 Kudus</h2>
                                <p>Jl. Siliwangi I No.99, Karang, Jekulo, Kec. Jekulo, Kabupaten Kudus, Jawa Tengah 59382</p>
                                <hr>
                            </td>
                        </tr>
                    </table>
                    <?php
                    
                    if(isset($_POST['idalat'])){
                   $idalat=$_POST['idalat'];
                   $query1="SELECT * FROM  inventaris 
                   where id_alat like '%$idalat%'";
                    }
                    $tampil=mysql_query($query1) or die(mysql_error());
                    $noUrut = 1;
                    if(mysql_num_rows($tampil) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                            </center>
                        </div>
                        <?php
                    }else{
                    ?>
                                    <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No</center></th>
                        <th><center>Nama Alat</center></th>
                        <th><center>Merk</center></th>
                        <th><center>Satuan</center></th>
                        <th><center>Tanggal Masuk</center></th>
                        <th><center>Lokasi</center></th>
                        <th><center>Kondisi</center></th>
                        <th><center>Keterangan</center></th>
                        <th><center>Kategori</center></th>
                        <th><center>Pinjamkan</center></th>
                        <th><center>QR Code</center></th>
                        <th><center>Setting</center></th>
                      </tr>
                  </thead>
                  
                     <?php while($data=mysql_fetch_array($tampil))
                    { ?>
                    <tbody>
                    <tr>
                    <td><?php echo $noUrut; $noUrut++; ?></td>
                    <td><?php echo $data['nama_alat']; ?></td>
                    <td><?php echo $data['merk'];?></td>
                    <td><?php echo $data['satuan'];?></td>
                    <td><?php echo $data['tgl_msk']; ?></a></td>
                    <td><?php echo $data['lokasi'];?></td>
                    <td><?php echo $data['kondisi'];?></td>
                    <td><?php echo $data['keterangan'];?></td>
                    <td><?php echo $data['kategori'];?></td>
                    <td><?php echo $data['dipinjamkan'];?></td>
                    <td><center><a class="btn btn-sm btn-default" data-placement="bottom" data-toggle="tooltip" title="Cetak QR Code" href="detail-qrcode.php?hal=edit&kd=<?php echo $data['id_alat'];?>"><figcaption>SMK NU Ma'arif 2 Kudus</figcaption><img src='qrcode/<?php echo $data['id_alat']; ?>.png' width='35px'><figcaption><?php echo $data['nama_alat']; ?></figcaption></a></center></td>
                    
                    <td><center><div id="thanks"><a class="btn btn-sm btn-info" data-placement="bottom" data-toggle="tooltip" title="Buat QR Code" href="qrcode.php?hal=edit&kd=<?php echo $data['id_alat'];?>"><span class="glyphicon glyphicon-qrcode"></span></a>
                        <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Inventaris" href="edit-anggota.php?hal=edit&kd=<?php echo $data['id_alat'];?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a onclick="return confirm ('Yakin hapus <?php echo $data['nama_alat'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Anggota" href="hapus-anggota.php?hal=hapus&kd=<?php echo $data['id_alat'];?>"><span class="glyphicon glyphicon-trash"></a></center></td></tr></div>
                 <?php   
              } }
              ?>
          </span></a></div></center></td></tr></tbody></table>
                <div class="panel-footer">
                    <center><a class="btn btn-danger" href="scanqr.php">Kembali</a></center>
                </div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy <a href="#" target="_blank">SMK NU Ma'arif 2 Kudus</a> 2021
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="../js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="../js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="../js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="../js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
</body>
</html>