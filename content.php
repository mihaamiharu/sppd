
<?php
ob_start();
error_reporting(0);
$mod = $_GET['module'];

// Bagian Home
if ($mod=='home'){
  echo "<div class=\"callout callout-success\"><h3>Selamat Datang</h3>
          <p>Hai <b>$_SESSION[namauser]</b>, selamat datang di halaman Administrator.<br> Silahkan klik menu pilihan yang berada dikiri untuk mengelola content website. </p></div>";
 if ($_SESSION['level']=="operator"){
	 
	 
  echo "<div class='row'
	<div align='center'>
  <table><thead>
	<center><th class='center' colspan=15><center>Control Panel</center></th></thead></center>
		<tr>
        <center><td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-aqua'>
            <div class='inner'>
               <a href=media.php?module=pegawai><img src=images/karyawan.png width=70px><h3>Data Pegawai</h3>
          </div>
        </div></td>&nbsp;
	<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-green'>
            <div class='inner'>
              <a href=media.php?module=nppt><img src=images/mnppd.png width=70px><h3>Kelola NPPD</h3>
          </div>
        </div></td>
	<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-yellow'>
            <div class='inner'>
              <a href=media.php?module=spt><img src=images/surat.png width=70px><h3>Kelola SPT</h3>
          </div>
        </div></td>
	<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-red'>
            <div class='inner'>
              <a href=media.php?module=sppd><img src=images/kotaks.png width=70px><h3>Kelola SPPD</h3>
          </div>
        </div></td>
		</tr>
		</table></div></center>

	
	<div align='center'>
		<table><thead>
			<th class='center' colspan=15><center>Control Panel</center></th></thead>
			<tr>
		<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-gray'>
            <div class='inner'>
            <a href=media.php?module=kwitansi><img src=images/receipt.png width=70px><h3>Kelola Kwitansi</h3>
          </div>
        </div></td>
		<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-lime'>
            <div class='inner'>
              <a href=media.php?module=kwitansi><img src=images/ps.png width=70px><h3>Ganti Password</h3>
          </div></td>
		  
		 <td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-purple'>
            <div class='inner'>
              <a href=media.php?module=lpd><img src=images/lapp.png width=70px><h3>Kelola LPD</h3>
          </div>
        </div></td> 
		  
        </div>	
		</table></div></center>

	<br><br><br><br><br><br>
	
          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
 }elseif($_SESSION['level']=="kabag") {
  echo "<div class='row'
  
		
  <div align='center'>
  <table><thead>
	<center><th class='center' colspan=15><center>Control Panel</center></th></thead></center>
		<tr>
        <center><td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-aqua'>
            <div class='inner'>
               <a href=media.php?module=nppt><img src=images/karyawan.png width=70px><h3>kelola NPPD</h3>
          </div>
        </div></td>&nbsp;
	<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-green'>
            <div class='inner'>
              <a href=media.php?module=lpd><img src=images/mnppd.png width=70px><h3>Kelola LPD</h3>
          </div>
        </div></td>
	<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-yellow'>
            <div class='inner'>
              <a href=media.php?module=kwitansi><img src=images/surat.png width=70px><h3>Kelola Kwitansi</h3>
          </div>
        </div></td>
	<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-red'>
            <div class='inner'>
              <a href=media.php?module=password><img src=images/kotaks.png width=70px><h3>Ganti Password</h3>
          </div>
        </div></td>
		</tr>
		</table></div></center>

<br><br><br><br><br><br>
          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
 }else{
   echo "<div class='row'
  
  <div align='center'>
  <table><thead>
	<center><th class='center' colspan=15><center>Control Panel</center></th></thead></center>
		<tr>
        <center><td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-aqua'>
            <div class='inner'>
               <a href=media.php?module=spt><img src=images/karyawan.png width=70px><h3>kelola SPT</h3>
          </div>
        </div></td>&nbsp;
	<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-green'>
            <div class='inner'>
              <a href=media.php?module=lpd><img src=images/mnppd.png width=70px><h3>Kelola LPD</h3>
          </div>
        </div></td>
	<td><div class='col-lg-16 col-xs-17'>
          <!-- small box -->
          <div class='small-box bg-yellow'>
            <div class='inner'>
              <a href=media.php?module=password><img src=images/surat.png width=70px><h3>Ganti Password</h3>
          </div>
        </div></td>
		</tr>
		</table></div></center>

	<br><br><br><br><br><br>
          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
 }
  
}
//users
elseif ($mod=='pegawai'){
    include "modul/mod_pegawai/pegawai.php";
}
elseif ($mod=='spt'){
    include "modul/mod_spt/spt.php";
}
//supplier
elseif ($mod=='nppt'){
    include "modul/mod_nppt/nppt.php";
}
elseif ($mod=='tambahnppt'){
    include "modul/mod_nppt/tambahnppt.php";
}

elseif ($mod=='sppd'){
    include "modul/mod_sppd/sppd.php";
}
elseif ($mod=='golongan'){
    include "modul/mod_golongan/golongan.php";
}
//biaya
elseif ($mod=='biaya'){
    include "modul/mod_biaya/biaya.php";
}

elseif ($mod=='tujuan'){
    include "modul/mod_tujuan/tujuan.php";
}
elseif ($mod=='transportasi'){
    include "modul/mod_transportasi/transportasi.php";
}
elseif ($mod=='kwitansi'){
    include "modul/mod_kwitansi/kwitansi.php";
}
elseif ($mod=='ttdkwitansi'){
    include "modul/mod_ttdkwitansi/ttdkwitansi.php";
}
elseif ($mod=='lpd'){
    include "modul/mod_lpd/lpd.php";
}
elseif ($mod=='password'){
    include "modul/mod_password/password.php";
}

// Apabila modul tidak ditemukan
else{
  echo "<b>MODUL BELUM ADA ATAU BELUM LENGKAP</b>";
}
?>

   
		
		
	
		
