<?php
$aksi="modul/mod_spt/aksi_spt.php";
$print ="modul/mod_spt/cetak.php";

switch($_GET[act]){
  // Tampil spt
  default:
  
  if ($_SESSION['level']=="operator") {
      $tampil = mysql_query("SELECT * FROM spt");
  echo   "<h1>
        SPT |
        <small>Surat Perintah Tugas</small>
      </h1>
          <input type=button value='Tambah Data SPT' class='btn btn-success' 
          onclick=\"window.location.href='?module=spt&act=tambahspt';\"><br /><br />";
		  
    echo "
    <table id=\"example1\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th>Nama</th><th>Golongan</th><th>No SPT</th><th>Tugas</th><th>Aksi Selanjutnya</th><th>SPPD</th></tr></thead>"; 
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
	$value =explode('-',$r['id_pegawai']);
       echo "<tr><td>$no</td>
             <td>";
	$nomer= 0;
	for($i=0;$i<count($value);$i++) { 
	$data=$value[$i];
	$nomer++;
	   $sql=mysql_query("SELECT * FROM pegawai WHERE id_pegawai='$data'");
	   $t=mysql_fetch_array($sql);
	   echo "$nomer. $t[nama]";
	   echo "<br/>";
	}
	   echo "</td><td>";
	$value =explode('-',$r['id_pegawai']);
	for($i=0;$i<count($value);$i++) { 
	$data=$value[$i];
	   $sql=mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan AND id_pegawai='$data'");
	   $t=mysql_fetch_array($sql);
	   echo "$t[golongan]";
	   echo "<br/>";
	}
	  echo "<td>$r[no_spt]</td>
		     <td>$r[tugas]</td>
			 <td>
<a href=$print?module=spt&act=print&id=$r[id_spt] target=\"_blank\" ><img src=images/cetak.png width=30px data-toggle='tooltip'title='Print'</a> 
&nbsp;<a href=?module=spt&act=editspt&id=$r[id_spt]><img src=images/editz.png width=30 data-toggle='tooltip'title='Update'</a>
&nbsp;<a href=$aksi?module=spt&act=hapus&id=$r[id_spt] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src=images/traz.png width=30px data-toggle='tooltip'title='Hapus'</a>
 <td>";
 $cek=mysql_fetch_array(mysql_query("SELECT * FROM sppd WHERE id_nppt='$r[id_nppt]'"));
 if ($cek > 0) {
 echo "sppd sudah dibuat";
 }
 elseif ($r['no_spt'] != "") {
 echo "<input type=button value='Buat SPPD' 
          onclick=\"window.location.href='?module=sppd&act=tambahsppd&id=$r[id_spt]';\">";
 }elseif ($r['no_spt']== ""){
	echo "No SPT Kosong";	 
 }
echo "
</td></tr>";
      $no++;
    }
    echo "</tbody></table>";
  }
  else {
  $tampil = mysql_query("SELECT * FROM spt,nppt WHERE spt.id_nppt=nppt.id_nppt AND spt.id_pegawai LIKE '%$_SESSION[id_pegawai]%'");
  echo    "<h1>
        SPT |
        <small>Surat Perintah Tugas</small>
      </h1>
  		  <table id=\"example1\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th>No SPT</th><th>Tugas</th><th>T.Pergi</th><th>T.Kembali</th>
		  <th>Lama</th><th>Laporan</th></tr></thead>"; 
    $no=0;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
		$no++;
	  echo "<tr>
	  		 <td>$no</td>
	  		 <td>$r[no_spt]</td>
		     <td>$r[tugas]</td>
			 <td>$r[tgl_pergi]</td>
			 <td>$r[tgl_kembali]</td>
			 <td>$r[lama] hari</td>
			 <td>";
			 $cek=mysql_num_rows(mysql_query("SELECT * FROM lpd WHERE id_spt='$r[id_spt]'"));
			 if ($cek > 0 ) {
			  echo "<img src='images/ico_active_16.png'>";
			 }else {
			 echo "
				<input type=button value='Buat Laporan' class='btn btn-info'
				
				  onclick=\"window.location.href='?module=lpd&act=tambahlpd&id=$r[id_spt]';\">";	
			 }
			 echo "</td></tr>";
	}
	echo "</tbody></table>";
  }
    break;
	
  case "tambahspt":
    echo "
	<h1>
        SPT |
        <small>Surat Perintah Tugas</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/tambah.png width=30px>&nbsp Form Tambah Data SPT</h3>
        </div>
        <div class='box-body'>
		<div align='center'>          
		<form method=POST action='$aksi?module=spt&act=input'>
		  <table>
		  <tr align='center'><th>Pilih Data Pegawai</th><th>Isi Data Berikut</th></tr>
		  <tr><td valign='top' style='padding-left:4px'>";
		  $sql=mysql_query("SELECT * FROM pegawai");
		  while($r=mysql_fetch_array($sql)) {
		  echo "<input type='checkbox' name='id_pegawai[]' value='$r[id_pegawai]'> $r[nama]<br/>";  
			  
		  }
	echo  "</td>
		  <td>
          <table width=600px class='table2'>
          <tr><td>No spt<br/><input type=text class='form-control' name='no_spt' placeholder='Masukan No SPT...' size=45 required /></td></tr>
          <tr><td>Untuk<br /> <textarea class='form-control' name='tugas' placeholder='Masukan Rencana Kegiatan...' style='width: 750px; height: 100px;'></textarea></td></tr>
		  <tr><td>Dasar<br /><textarea class='form-control' name='dasar_hukum' placeholder='Masukan Dasar Kegiatan...' style='width:750px;height:150px'></textarea></td></tr>
          </table>
		  </td>
		  </tr>
          <tr><td></td><td><input type=submit name=submit value=Simpan class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></td></tr>
		  </table></form></div></div></div>
		  ";
     break;
  case "editspt":
    $edit=mysql_query("SELECT * FROM spt WHERE id_spt='$_GET[id]'");
    $c=mysql_fetch_array($edit);

    echo "
	<h1>
        SPT |
        <small>Surat Perintah Tugas</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/editz.png width=31px> &nbsp Form Edit Data SPT</h3>
        </div>
        <div class='box-body'>
		<div align='center'>          
          <form method=POST action=$aksi?module=spt&act=update>
          <input type=hidden name=id value='$c[id_spt]'>
		  <table>
		  <tr><th><b>Pilih Data Pegawai</b></th><th><b>Isi Data Berikut</b></th></tr>
		  <tr><td valign='top' style='padding-left:4px'>";
			  $id2=explode("-",$c['id_pegawai']);
			  echo "$data<br>";
			  $tam1=mysql_query("SELECT * FROM pegawai");
			  while ($k=mysql_fetch_array($tam1)) {
				  $selected = "";
				  if (in_array($k['id_pegawai'],$id2)) {
					  $selected = "checked='checked'";
		 		 echo "<input type='checkbox' name='id_pegawai[]' value='$k[id_pegawai]' $selected> $k[nama]<br/>";
				  }else{
		 		 echo "<input type='checkbox' name='id_pegawai[]' value='$k[id_pegawai]'> $k[nama]<br/>";
				}
			  }	
	echo  "</td>
		  <td>
          <table width=500px>
          <tr><td>No Spt <br/><input type=text name='no_spt' size=45 value='$c[no_spt]'></td></tr>
          <tr><td>Untuk <br /> <textarea name='tugas' style='width:750px; height: 100px;'>$c[tugas]</textarea></td></tr>
		  <tr><td>Dasar<br /><textarea name='dasar_hukum' style='width:750px;height:150px'>$c[dasar_hukum]</textarea></td></tr>
          </table>
		  </td>
		  </tr>
          <tr><td></td><td><input type=submit name=submit value=Update  class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back()  class='btn btn-warning'></td></tr>
		  </table></form></div></div></div>";
    break;  
}
?>
