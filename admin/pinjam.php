<?php include "../conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>(Peminjaman Alat Berbasis Web)</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Perpustakaan Berbasis Web">
    <meta name="keywords" content="Perpustakaan, perpus, online, website">
    <meta name="author" content="Hakko Bio Richard"/>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link type="../text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous">
  </script>
    <script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);  
function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>
<script language="JavaScript">
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
}
</script>



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
                Peminjaman Alat
            </a>
			
			<!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="messages-menu">
                        <table width="1000">
            <tr>
            <td width="200"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
            </tr>
            </table>
                        </li>
                        <li class="dropdown messages-menu">
                            <a href="#" data-toggle="modal" data-target="#contact">
                                <i class="fa fa-envelope"></i>
                                <!--<span class="label label-success">4</span>-->
                            </a>
                            </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="login.html" data-placement="bottom" data-toggle="tooltip" title="Login Admin">
                                <i class="fa fa-user"></i>
                            </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->


          </div><!--end col-6 -->
            <section class="panel" id="noti-box">
                <header class="panel-heading">
                    <center><b>FORMULIR PINJAM ALAT</b></center>
                </header>
                <div class="panel-body">
                    <div class="twt-area">
                        <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-pinjam.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No </label>
                              <div class="col-sm-9">
                                  <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-9">
                                  <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Anda" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
						 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                                  <div class="col-sm-2">
                                  <input name="jenis_kelamin" type="radio" value="L" checked =''checked/> Laki-Laki <input name="jenis_kelamin" type="radio" value="P" /> Perempuan
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                                  <div class="col-sm-9">
                                  <select class="form-control" name="jabatan" id="jabatan">
                                  <option value="" selected> -- Pilih Salah Satu --</option>
                                  <option value="Guru"> Guru</option>
                                  <option value="Siswa"> Siswa</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group" id="kelas">
                              <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="kelas" id="kelas">
                                  <option value=""> -- Pilih Salah Satu --</option>
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
                              <label class="col-sm-2 col-sm-2 control-label">Pinjam</label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <select class="form-control" name="pinjam" id="pinjam">
                                        <option value="">Pilih Barang Akan Dipinjam</option>
                                        <?php
                                        include "conn.php";
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query    =mysql_query("SELECT nama_alat FROM inventaris WHERE tampilkan='DITAMPILKAN'");
                                        while ($data = mysql_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
							   <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-2">
                                  <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <select class="form-control" name="pinjam1" id="pinjam1">
                                        <option value="">Pilih Barang Akan Dipinjam</option>
                                        <?php
                                        include "conn.php";
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query    =mysql_query("SELECT nama_alat FROM inventaris WHERE tampilkan='DITAMPILKAN'");
                                        while ($data = mysql_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                               <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-2">
                                  <input type="number" class="form-control" name="jumlah1" id="jumlah1" placeholder="Jumlah">
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <select class="form-control" name="pinjam2" id="pinjam2">
                                        <option value="">Pilih Barang Akan Dipinjam</option>
                                        <?php
                                        include "conn.php";
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query    =mysql_query("SELECT nama_alat FROM inventaris WHERE tampilkan='DITAMPILKAN'");
                                        while ($data = mysql_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                               <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-2">
                                  <input type="number" class="form-control" name="jumlah2" id="jumlah2" placeholder="Jumlah">
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <select class="form-control" name="pinjam3" id="pinjam3">
                                        <option value="">Pilih Barang Akan Dipinjam</option>
                                        <?php
                                        include "conn.php";
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query    =mysql_query("SELECT nama_alat FROM inventaris WHERE tampilkan='DITAMPILKAN'");
                                        while ($data = mysql_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data['nama_alat'];?>"><?php echo $data['nama_alat'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                               <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-2">
                                  <input type="number" class="form-control" name="jumlah3" id="jumlah3" placeholder="Jumlah">                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
						  
                          <input name="status" type="hidden" id="status" class="form-control" value="BELUM DIKEMBALIKAN" readonly="readonly" />
                          <input name="tgl_pinjam" type="hidden" id="tgl_pinjam" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');
echo date('Y-m-d H:i:s'); // 21-01-2017 05:01:01?>" readonly="readonly" />
                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Pinjam" name="simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>

                        </form>
                    </div>
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
            </section>
        </div>
                    </div>
                      </section>
</body>
</html>