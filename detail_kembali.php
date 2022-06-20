<?php include "conn.php"; ?>
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
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
                                  <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" readonly="readonly"/>
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
						 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                                  <div class="col-sm-9">
                                  <input name="jenis_kelamin" type="text" id="jenis_kelamin" class="form-control" value="<?php echo $data['jenis_kelamin']; ?>" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                              <div class="col-sm-9">
                                  <input name="kelas" type="text" id="kelas" class="form-control" value="<?php echo $data['kelas']; ?>" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pinjam </label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <input name="pinjam" type="text" id="pinjam" class="form-control" value="<?php echo $data['pinjam']; ?>" readonly="readonly" />
                                    </div>
                                </div>
							   <label class="col-sm-3 col-sm-3 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="jumlah" type="text" id="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" onkeyup="sum();" readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
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
                                  <input name="rusak" type="number" id="rusak" class="form-control" placeholder="Rusak" onkeyup="sum();" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pinjam </label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <input name="pinjam1" type="text" id="pinjam1" class="form-control" value="<?php echo $data['pinjam1']; ?>" readonly="readonly" />
                                    </div>
                                </div>
                 <label class="col-sm-3 col-sm-3 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="jumlah1" type="text" id="jumlah1" class="form-control" value="<?php echo $data['jumlah1']; ?>" onkeyup="sum1();" readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
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
                                  <input name="rusak1" type="number" id="rusak1" class="form-control" placeholder="Rusak" onkeyup="sum1();"  />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pinjam </label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <input name="pinjam2" type="text" id="pinjam2" class="form-control" value="<?php echo $data['pinjam2']; ?>" readonly="readonly" />
                                    </div>
                                </div>
                 <label class="col-sm-3 col-sm-3 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="jumlah2" type="text" id="jumlah2" class="form-control" value="<?php echo $data['jumlah2']; ?>" onkeyup="sum2();" readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
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
                                  <input name="rusak2" type="number" id="rusak2" class="form-control" placeholder="Rusak" onkeyup="sum2();"  />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pinjam </label>
                              <div class="col-sm-3">
                                    <div class="input-group control-group">
                                      <input name="pinjam3" type="text" id="pinjam3" class="form-control" value="<?php echo $data['pinjam3']; ?>" readonly="readonly" />
                                    </div>
                                </div>
                 <label class="col-sm-3 col-sm-3 control-label"></label>
                              <div class="col-sm-2">
                                  <input name="jumlah3" type="text" id="jumlah3" class="form-control" value="<?php echo $data['jumlah3']; ?>" onkeyup="sum3();" readonly="readonly" />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
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
                                  <input name="rusak3" type="number" id="rusak3" class="form-control" placeholder="Rusak" onkeyup="sum3();"  />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

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
                                  <input type="submit" value="Pinjam" name="simpan" class="btn btn-sm btn-primary" />&nbsp;
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
                    </div>
                </div>
            </section>
        </div>
                    </div>
                      </section>
</body>
</html>