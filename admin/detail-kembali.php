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
    <title>PerPusWeb (Perpustakaan Berbasis Web)</title>
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
                PerPusWeb
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
                                            <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
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
                <section class="content">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                    <center><b>FORMULIR PINJAM ALAT</b></center>
                </header>
                <?php
                    $query = mysql_query("SELECT * FROM pinjam WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                <div class="panel-body">
                    <div class="twt-area">
                        <form class="form-horizontal style-form" style="margin-top: 20px;" action="proseskembali.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No </label>
                              <div class="col-sm-9">
                                  <input name="id" type="text" id="id" class="form-control" value="<?php echo $data['id']; ?>" autofocus="on" readonly="readonly"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-9">
                                  <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                                  <div class="col-sm-9">
                                  <select class="form-control" name="kelas" id="kelas">
                                  <option value="<?php echo $data['kelas'];?>"><?php echo $data['jenis_kelamin']; ?></option>
                                  <option value="L">Laki-Laki</option>
                                  <option value="P">Perempuan</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="kelas" id="kelas">
                                  <option value="<?php echo $data['kelas'];?>"><?php echo $data['kelas']; ?></option>
                                  <option value="X TKJ 1"> X TKJ 1</option>
                                  <option value="X TKJ 2"> X TKJ 2</option>
                                  <option value="X TKJ 3"> X TKJ 3</option>
                                  <option value="X TKJ 4"> X TKJ 4</option>
                                  <option value="X TKJ 5"> X TKJ 5</option>
                                  <option value="XI TKJ 1"> XI TKJ 1</option>
                                  <option value="XI TKJ 2"> XI TKJ 2</option>
                                  <option value="XI TKJ3"> XI TKJ 3</option>
                                  <option value="XI TKJ 4"> XI TKJ 4</option>
                                  <option value="XI TKJ 5"> XI TKJ 5</option>
                                  <option value="XII TKJ 1"> XII TKJ 1</option>
                                  <option value="XII TKJ 2"> XII TKJ 2</option>
                                  <option value="XII TKJ 3"> XII TKJ 3</option>
                                  <option value="XII TKJ 4"> XII TKJ 4</option>
                                  <option value="XII TKJ 5"> XII TKJ 5</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pinjam </label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <select class="form-control" name="pinjam" id="pinjam" style="width: 178px;">
                                        <?php
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query    =mysql_query("SELECT nama_alat FROM inventaris WHERE tampilkan='DITAMPILKAN'");
                                        while ($data = mysql_fetch_array($query)) {
                                        ?>
                                        <option value="<?php echo $data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <option value="<?=$data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <?php
                    $query = mysql_query("SELECT * FROM pinjam WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                               <label class="col-sm-3 col-sm-3 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="jumlah" type="text" id="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" onkeyup="sum();" readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <?php
                    $query = mysql_query("SELECT * FROM kembali1 WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <input name="baik" type="number" id="baik" class="form-control" placeholder="Baik" readonly="readonly" />
                                    </div>
                                </div>
                                <label class="col-sm-1 col-sm-1 control-label">Kondisi </label>
                 <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="rusak" type="number" id="rusak" class="form-control" value="<?php echo $data['rusak']; ?>" onkeyup="sum();" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pinjam </label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <select class="form-control" name="pinjam" id="pinjam" style="width: 178px;">
                                        <?php
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query    =mysql_query("SELECT nama_alat FROM inventaris WHERE tampilkan='DITAMPILKAN'");
                                        while ($data = mysql_fetch_array($query)) {
                                        ?>
                                        <option value="<?php echo $data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <option value="<?=$data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <?php
                    $query = mysql_query("SELECT * FROM pinjam WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                 <label class="col-sm-3 col-sm-3 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="jumlah1" type="text" id="jumlah1" class="form-control" value="<?php echo $data['jumlah1']; ?>" onkeyup="sum1();" readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <?php
                    $query = mysql_query("SELECT * FROM kembali1 WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <input name="baik1" type="number" id="baik1" class="form-control" placeholder="Baik" readonly="readonly" required />
                                    </div>
                                </div>
                                <label class="col-sm-1 col-sm-1 control-label">Kondisi </label>
                 <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="rusak1" type="number" id="rusak1" class="form-control" value="<?php echo $data['rusak1']; ?>" onkeyup="sum1();"  />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pinjam </label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <select class="form-control" name="pinjam" id="pinjam" style="width: 178px;">
                                        <?php
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query    =mysql_query("SELECT nama_alat FROM inventaris WHERE tampilkan='DITAMPILKAN'");
                                        while ($data = mysql_fetch_array($query)) {
                                        ?>
                                        <option value="<?php echo $data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <option value="<?=$data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <?php
                    $query = mysql_query("SELECT * FROM pinjam WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                 <label class="col-sm-3 col-sm-3 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="jumlah2" type="text" id="jumlah2" class="form-control" value="<?php echo $data['jumlah2']; ?>" onkeyup="sum2();" readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <?php
                    $query = mysql_query("SELECT * FROM kembali1 WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <input name="baik2" type="number" id="baik2" class="form-control" placeholder="Baik" readonly="readonly" required />
                                    </div>
                                </div>
                                <label class="col-sm-1 col-sm-1 control-label">Kondisi </label>
                 <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="rusak2" type="number" id="rusak2" class="form-control" value="<?php echo $data['rusak2']; ?>" onkeyup="sum2();"  />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pinjam </label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <select class="form-control" name="pinjam" id="pinjam" style="width: 178px;">
                                        <?php
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query    =mysql_query("SELECT nama_alat FROM inventaris WHERE tampilkan='DITAMPILKAN'");
                                        while ($data = mysql_fetch_array($query)) {
                                        ?>
                                        <option value="<?php echo $data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <option value="<?=$data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <?php
                    $query = mysql_query("SELECT * FROM pinjam WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                 <label class="col-sm-3 col-sm-3 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="jumlah3" type="text" id="jumlah3" class="form-control" value="<?php echo $data['jumlah3']; ?>" onkeyup="sum3();" readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <?php
                    $query = mysql_query("SELECT * FROM kembali1 WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <input name="baik3" type="number" id="baik3" class="form-control" placeholder="Baik" readonly="readonly" required />
                                    </div>
                                </div>
                                <label class="col-sm-1 col-sm-1 control-label">Kondisi </label>
                 <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="rusak3" type="number" id="rusak3" class="form-control" value="<?php echo $data['rusak3']; ?>" onkeyup="sum3();"  />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
<?php
                    $query = mysql_query("SELECT * FROM pinjam WHERE id='$_GET[id]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                                  <div class="col-sm-9">
                                  <input name="jabatan" type="text" id="jabatan" class="form-control" value="<?php echo $data['jabatan']; ?>" readonly="readonly" />
                              </div>
                          </div>
                          <input name="status" type="hidden" id="status" class="form-control" value="PENDING" readonly="readonly" />
                          <input name="tgl_kembali" type="hidden" id="tgl_kembali" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');
echo date('Y-m-d H:i:s'); // 21-01-2017 05:01:01?>" readonly="readonly" />
                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                <a class="btn btn-info btn-sm pull-left" title="Konfirmasi" href="konfirmasi.php?id=<?php echo $data['id']; ?>"><i class="fa fa-check-square-o">Konfirmasi</i></a>&nbsp;
                                <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>

                        </form>
                        <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('jumlah').value;
      var txtSecondNumberValue = document.getElementById('rusak').value;
      var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('baik').value = result;
      }
}
function sum1() {
      var txtFirstNumberValue = document.getElementById('jumlah1').value;
      var txtSecondNumberValue = document.getElementById('rusak1').value;
      var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('baik1').value = result;
      }
}
function sum2() {
      var txtFirstNumberValue = document.getElementById('jumlah2').value;
      var txtSecondNumberValue = document.getElementById('rusak2').value;
      var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('baik2').value = result;
      }
}
function sum3() {
      var txtFirstNumberValue = document.getElementById('jumlah3').value;
      var txtSecondNumberValue = document.getElementById('rusak3').value;
      var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('baik3').value = result;
      }
}
</script>
<script type="text/javascript">
    $(function () {
        $("#jabatan").change(function () {
            if ($(this).val() == "Siswa") {
                $("#kelas").show();
            } else {
                $("#kelas").hide();
            }
        });
    });
</script>
                    </div>
                </div>
            </section>
                <div class="footer-main">
                    Copyright &copy <a href="http://www.hakkoblogs.com" target="_blank">SMK NU Ma'arif 2 Kudus</a> 2021
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