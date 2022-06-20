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
            <section class="panel">
                <header class="panel-heading">
                    <center><b>KEMBALIKAN ALAT</b></center>
                </header>
				
				
                <div class="panel-body">
                    <div class="twt-area">
                        
                          <div class="form-group" style="margin-bottom: 350px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <header class="panel-heading">
                                    
                                        
                                    <form action="kembali.php" method="POST">
                                        <div class="input-group">
                                            <input type='text' class="form-control input-sm pull-left" style="width: 100%;"  name='qcari' placeholder='Cari Nama Peminjam'/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>                                  
                                    </form>
                                </header>
                        <form class="form-horizontal style-form" style="margin-top: 20px;" action="dikembalikan.php" method="post" enctype="multipart/form-data" name="form1" id="form1">        
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <?php
                    $query1="select * from pinjam where not status='DIKONFIRMASI'";
                    if(isset($_POST['qcari'])){
                   $qcari=$_POST['qcari'];
                   $query1="SELECT * FROM  pinjam 
                   where nama like '%$qcari%'  ";
                    }
                    $tampil=mysql_query($query1) or die(mysql_error());
                    $noUrut = 1;
                    ?>
                                    <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No</center></th>
                        <th><center>Nama</center></th>
                        <th><center>Kelas</center></th>
                        <th><center>Pinjam</center></th>
                        <th><center>Jabatan</center></th>
                        <th><center>Waktu Pinjam</center></th>
                        <th><center>Keterangan</center></th>
                      </tr>
                  </thead>
                  
                     <?php while($data=mysql_fetch_array($tampil))
                    { ?>
                    <tbody>
                    <tr>
                    <td><?php echo $noUrut; $noUrut++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['kelas'];?></td>
                    <td><?php echo $data['pinjam']; ?> <?php echo $data['jumlah']; ?> <?php echo $data['pinjam1']; ?> <?php echo $data['jumlah1']; ?> <?php echo $data['pinjam2']; ?> <?php echo $data['jumlah2']; ?> <?php echo $data['pinjam3']; ?> <?php echo $data['jumlah3']; ?></a></td>
                    <td><?php echo $data['jabatan'];?></td>
                    <td><?php echo $data['tgl_pinjam'];?></td>
                    <td>

                        <center><div id="thanks"><a class="btn btn-info btn-sm pull-left" title="Detail Kembali" onclick="myFunction()" id="Btn" href="detail_kembali.php?id=<?php echo $data['id']; ?>"><i class="fa fa-check-square-o"><?php echo $data['status'];?></i></a></center></td></tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>

                          </div>

                        </form>
                    </div>
                </div>
            </section>
        </div>

                    </div>
                      </section>
<script>
function myFunction() {
    var x = document.getElementById("Btn");
    x.disabled = true;
}
</script>
<script>
function sum() {
      var txtjumlah = document.getElementById('jumlah').value;
      var txtrusak = document.getElementById('rusak').value;
      var result = parseInt(txtjumlah) - parseInt(txtrusak);
      if (!isNaN(result)) {
         document.getElementById('baik').value = result;
      }
}
</script>
</body>
</html>