<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:index.php?log=1');;  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi SPPD</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="theme/bootstrap/css/bootstrap.min.css">
	<!-- Detepicker -->
    <link rel="stylesheet" href="theme/plugins/datepicker/datepicker3.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="theme/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="theme/dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="theme/plugins/datatables/dataTables.bootstrap.css">
    <!-sppd-->
  <link href="css/style_properti.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="../favicon.png"/>
  
 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
  <body class="hold-transition skin-green sidebar-mini">
    <!-- Site wrapper -->
	
	
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ADMIN | </b>Margahayu</span>
        </a>
		
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

          
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo "$_SESSION[namauser]"; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- Menu Body -->
                  <li class="user-body">
                    <?php
                      echo "
                        <p align=right>Login : $hari_ini, ";
                        echo tgl_indo(date("Y m d")); 
                        echo " | "; 
                        echo date("H:i:s");
                        echo " WIB</p>";
                    ?>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat" onClick="return confirm('Anda Yakin Ingin Keluar')">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar"> 
          <!-- sidebar menu: : style can be found in sidebar.less -->
		  <br>
		 
		 
		  <!-- Sidebar user panel -->
      <div class="user-panel">
        
        <center><img src="Bandung.png" height=100px width=200px ></center>
		<div class="pull-right info">
        
      </div>
	  <br>
	  <br>
		  
      <?php
       if ($_SESSION['level']=="operator"){
      ?>
          <ul class="sidebar-menu">
            <li>
              <a href="?module=home">
                <img src=images/dash.png width=40px<span>&nbsp Dashboard</span> 
              </a><hr class=" bg-secondary">
              </li>
            <li class="treeview active">
              <a href="#"> 
                <img src=images/kotak.png width=40px  
                 <span>&nbsp SPPD</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
				<a href="?module=nppt">
				<img src=images/nppt.png width=35px</i> &nbsp NPPD</a></li>
                <li><a href="?module=spt">
				<img src=images/spt.png width=35px</i> &nbsp SPT</a></li>
                <li><a href="?module=sppd">
				<img src=images/sppd.png width=35px</i> &nbsp SPPD</a><hr class=" bg-secondary"></li>
              </ul>
            </li>
            <li class="treeview active">
              <a href="#">
                <img src=images/master.png width=40px
                <span> &nbsp Data Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=pegawai"><img src=images/pegawai.png width=35px</i> &nbsp  Data Pegawai</a></li>
                <li><a href="?module=golongan"><img src=images/divisi.png width=35px</i> &nbsp Golongan</a></li>
                <li><a href="?module=tujuan"><img src=images/kota.png width=40x</i> &nbsp Kota Tujuan</a></li>
				        <li><a href="?module=biaya"><img src=images/biaya.png width=35px</i> &nbsp Biaya Perjalanan</a></li>
                <li><a href="?module=transportasi"><img src=images/transport.png width=35px</i> &nbsp Jenis Transportasi</a><hr class=" bg-secondary"></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <img src=images/lap.png width=40px</i> <span> &nbsp Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=kwitansi"><img src=images/kwitansi.png width=35px></i>&nbsp Kwitansi</a></li>
                <li><a href="?module=lpd"><img src=images/lpd.png width=35px</i>&nbsp L.Perjalanan Dinas</a><hr class=" bg-secondary"></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <img src=images/setting.png width=40px <span>&nbsp Setting</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=ttdkwitansi"><img src=images/ttd.png width=35px</i>&nbsp TTD Kwitansi</a></li>
                <li><a href="?module=password"><img src=images/pass.png width=35px</i>&nbsp Password</a><hr class=" bg-secondary"></li>
              </ul>
            </li>
            <li><a href="logout.php" onClick="return confirm('Anda Yakin Ingin Keluar')"><img src=images/out.png width=40px</i> <span>&nbsp Logout</span></a><hr class=" bg-secondary"></li>
          </ul>
		  
          <?php }elseif($_SESSION['level']=="kabag") { ?>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview active">
              <a href="#">
                <img src=images/kotak.png width=40px  
                 <span>&nbsp SPPD</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=nppt"><img src=images/nppt.png width=35px</i> &nbsp NPPD</a></li>
                <li><a href="?module=lpd"><img src=images/lpd.png width=35px</i>&nbsp L.Perjalanan Dinas</a></li>
                <li><a href="?module=kwitansi"><img src=images/kwitansi.png width=35px></i>&nbsp Kwitansi</a></li>
               <!-- <li><a href="?module=tbk"><i class="fa fa-circle-o"></i> TBK</a></li> Sengaja di non aktifkan modul TBK-->
                <li><a href="?module=password"><img src=images/pass.png width=35px</i>&nbsp Password</a></li>
                <li><a href="logout.php" onClick="return confirm('Anda Yakin Ingin Keluar')"><img src=images/out.png width=40px</i> Logout</a></li>
              </ul>
            </li>
            </ul>
			
          <?php }else{ ?>
          <ul class="sidebar-menu">
           <li class="header">MAIN NAVIGATION</li>
            <li class="treeview active">
              <a href="#">
                 <img src=images/master.png width=40px
                <span>&nbspData Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=spt"><img src=images/spt.png width=35px</i> &nbsp SPT</a></li>
                <li><a href="?module=lpd"><img src=images/lpd.png width=35px</i>&nbsp L.Perjalanan Dinas</a></li>
                <li><a href="?module=password"><img src=images/pass.png width=35px</i>&nbsp Password</a></li>
                <li><a href="logout.php" onClick="return confirm('Anda Yakin Ingin Keluar')"><img src=images/out.png width=40px>&nbsp Logout</a></li>
              </ul>
            </li>
            </ul>
          <?php } ?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
        <?php include "content.php"; ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Pengembangan</b> 2
        </div>
        <p style="text-align:center; font-size:14px; font-family:Ubuntu;"><b>Wahyudin © 2019</b></p>
		<p style="text-align:center; font-size:10px; font-family:Ubuntu; color: red">
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">

          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="theme/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="theme/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- Detepicker -->
    <script src="theme/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- FastClick -->
    <script src="theme/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="theme/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="theme/dist/js/demo.js"></script>\
    <!-- DataTables -->
    <script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="theme/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
<?php } ?>