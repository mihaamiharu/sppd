<?php
session_start();
error_reporting(0);
include "../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='nppt' AND $act=='hapus') {
	mysql_query("DELETE FROM nppt WHERE id_nppt='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='nppt' AND $act=='editstatus') {
	if($_GET['status']=='Y') {
	 $sql=mysql_query("SELECT * FROM nppt WHERE id_nppt='$_GET[id]'");
	 $r=mysql_fetch_array($sql);

	 $no_spt= '../spt/';
	 
	 $tanggal= date("d/m/Y");
	 $dasar_hukum = "....";
	 mysql_query("INSERT INTO spt (id_nppt,no_spt,id_pegawai,tugas,tgl_spt,dasar_hukum) values ('$_GET[id]','$no_spt','$r[id_pegawai]','$r[maksud]','$tanggal','$dasar_hukum')");
	 mysql_query("UPDATE nppt SET status='Y' WHERE id_nppt='$_GET[id]'");
	}else{
	 mysql_query("UPDATE nppt SET status='N' WHERE id_nppt='$_GET[id]'");
	}
  header('location:../../media.php?module='.$module);
}
elseif ($module=='nppt' AND $act=='input'){
	  $value = (count($_POST['id_pegawai']) > 0) ? implode('-', $_POST['id_pegawai']) : ""; 
	  $transportasi = (count($_POST['id_transportasi']) > 0) ? implode('-', $_POST['id_transportasi']) : ""; 
	  //Cek Pegawai Yang Berangkat Pada Tanggal Yang Sama
	  $t=mysql_fetch_array(mysql_query("SELECT * FROM nppt WHERE id_pegawai Like '%$value%' ORDER BY tgl_kembali DESC"));
	  $tanggal3 = "$_POST[tgl_pergi]";	  
	  $tanggal1 = "$t[tgl_pergi]";
	  $tanggal2 = "$t[tgl_kembali]";
	  if ($tanggal3 >= $tanggal1 AND $tanggal3 <=$tanggal2) {
	  echo "<script>alert('Tidak Bisa Di Input kan');window.location='../../media.php?module=tambahnppt'</script>";
	  }
		else {
		if ($transportasi == "") {
	  echo "<script>alert('Pilih Transportasi Yang digunakan');window.location='../../media.php?module=tambahnppt'</script>";
	  }else{
mysql_query("INSERT INTO nppt(id_pegawai,id_tujuan,maksud,id_transportasi,lama,tgl_pergi,tgl_kembali) 
	VALUES('$value','$_POST[tujuan]','$_POST[maksud]','$transportasi','$_POST[lama]','$_POST[tgl_pergi]','$_POST[tgl_kembali]')");
  header('location:../../media.php?module='.$module);
  }
 }
}
elseif ($module=='nppt' AND $act=='update'){
	  $value = (count($_POST['id_pegawai']) > 0) ? implode('-', $_POST['id_pegawai']) : ""; 
	  $transportasi = (count($_POST['id_transportasi']) > 0) ? implode('-', $_POST['id_transportasi']) : ""; 
	  mysql_query("UPDATE nppt SET id_pegawai='$value',
	  								id_tujuan ='$_POST[tujuan]',
									maksud ='$_POST[maksud]',
									id_transportasi ='$transportasi',
									lama = '$_POST[lama]',
									tgl_pergi ='$_POST[tgl_pergi]',
									tgl_kembali ='$_POST[tgl_kembali]'
									WHERE id_nppt ='$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>

