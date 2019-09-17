<?php
$aksi="modul/mod_nppt/aksi_nppt.php";
$print ="modul/mod_nppt/cetak.php";

switch($_GET[act]){
  // Tampil nppt
  default:
      $tampil = mysql_query("SELECT * FROM nppt,tujuan WHERE nppt.id_tujuan=tujuan.id_tujuan ORDER BY id_nppt DESC");
  echo   "<h1>
        NPPD |
        <small>Nota Permintaan Perjanalan Dinas</small>
      </h1>
	 
          <input type=button value='Tambah Data'  class='btn btn-success' 
          onclick=\"window.location.href='?module=tambahnppt';\"><br /><br />";
		  
		  
   echo "
    <table id=\"example1\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th align='left'>Penugasan Kepada</th><th>Golongan</th><th>Tujuan</th><th>Maksud Perjalan<br>Dinas
		  <th>Tgl Pergi<br />s/d<br />Tgl Kembali<th>Lama</th><th>Status</th><th>Aksi Selanjutnya</th></tr></thead>"; 
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
	$value =explode('-',$r['id_pegawai']);
       echo "<tr>
	        <td>$no</td>
             <td>";
	$nomer= 0;
	for($i=0;$i<count($value);$i++) { 
	$data=$value[$i];
	$nomer++;
	   $sql=mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan AND id_pegawai='$data'");
	   $t=mysql_fetch_array($sql);
	   echo "$nomer. $t[nama]";
	   echo "<br/>";
	}
	   echo "</td>
	   		 <td>";
	$value =explode('-',$r['id_pegawai']);
	$nomer= 0;
	for($i=0;$i<count($value);$i++) { 
	$data=$value[$i];
	$nomer++;
	   $sql=mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan AND id_pegawai='$data'");
	   $t=mysql_fetch_array($sql);
	   echo "$t[golongan] ";
	   echo "<br/>";
	}
echo "	 </td>
		     <td>$r[tujuan]</td>
			 <td>$r[maksud]</td>
			 <td align='center'>$r[tgl_pergi] <br />s/d <br />$r[tgl_kembali]</td>
			 <td>$r[lama] hari </td>
			 <td align='center'>";
			 if ($r['status']== 'Y') {
				echo "<div style='color:#FF007F'>Terverifikasi</div>";
			 }else{
				 if ($_SESSION['level']=="kabag"){
				echo "<a href=$aksi?module=nppt&act=editstatus&id=$r[id_nppt]&status=Y onClick=\"return confirm('Apakah Anda Mensetujui SPT ini?')\">N</a>";
				 }else{
				echo "<div style='color:#1693D1'>Belum Di Setujui</div>";
				 }
			 }
		echo "</td>
<td align='center'><a href=$print?module=nppt$act=print&id=$r[id_nppt]><img src=images/cetak.png width=27,5px data-toggle='tooltip'title='Print'</a>
&nbsp;<a href=?module=nppt&act=editnppt&id=$r[id_nppt]><img src=images/editz.png width=27,5 data-toggle='tooltip'title='Update'</a>
&nbsp;<a href=$aksi?module=nppt&act=hapus&id=$r[id_nppt] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src=images/traz.png width=27,5px data-toggle='tooltip'title='Hapus'</a></td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  case "editnppt":
    $edit=mysql_query("SELECT * FROM nppt WHERE id_nppt='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h1>
        NPPD |
        <small>Nota Permintaan Perjanalan Dinas</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/editz.png width=31px> &nbsp Form Edit NPPT</h3>
        </div>
        <div class='box-body'>
		<div align='center'>
          <form method=POST action=$aksi?module=nppt&act=update>
          <input type=hidden name=id value='$r[id_nppt]'>
		  <table width=100%>
		  <tr><th width='250'><b>Pilih Data Pegawai</b></th><th><b>Isi Data Berikut Ini</b></th></tr>
		  <tr><td valign='top' style='padding-left:4px'>";
			  $id2=explode("-",$r['id_pegawai']);
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
          <table class='table2'>
		  <tr><td>Tempat Tujuan</td><td><select name='tujuan'>";
		  $tampil=mysql_query("SELECT * FROM tujuan");
		   if ($r[id_tujuan]==0){
		   echo "<option value=0 selected>- Pilih Kategori -</option>"; }   
		
		   while($w=mysql_fetch_array($tampil)){
		   if ($r[id_tujuan]==$w[id_tujuan]){
		   echo "<option value=$w[id_tujuan] selected>$w[tujuan]</option>";}
		   else{
		   echo "<option value=$w[id_tujuan]>$w[tujuan]</option> </p> ";}}
		
		   echo "</select>";
		   echo "</td></tr>
          <tr><td>Maksud Perjanalan Dinas</td><td><input type=text name='maksud' value='$r[maksud]' size=80></td></tr>
		  <tr><td>Tipe Transportasi</td><td valign='top'>";
			  $id2=explode("-",$r['id_transportasi']);
			  echo "$data<br>";
			  $tam1=mysql_query("SELECT * FROM transportasi");
			  while ($k=mysql_fetch_array($tam1)) {
				  $selected = "";
				  if (in_array($k['id_transportasi'],$id2)) {
					  $selected = "checked='checked'";
		 		 echo "<input type='radio' name='id_transportasi[]' value='$k[id_transportasi]' $selected>$k[transportasi]<br/>";
				  }else{
		 		 echo "<input type='radio' name='id_transportasi[]' value='$k[id_transportasi]'>$k[transportasi]<br/>";
				}

			  }	
	echo  "</td></tr>
          <tr><td>Lama Perjalanan</td><td><input type=text name='lama' value='$r[lama]' size=4>&nbsp; Hari</td></tr>
          <tr><td>Tanggal Berangkat</td><td><input type=text name='tgl_pergi' id='tgl_pergi' value='$r[tgl_pergi]' size=10> &nbsp<img src=images/kalender.png width=28px >&nbsp</span></td></tr>
          <tr><td>Tanggal Kembali</td><td><input type=text name='tgl_kembali' id='tgl_kembali' value='$r[tgl_kembali]' size=10> &nbsp<img src=images/kalender.png width=28px >&nbsp</span></td></tr>
          </table class='table2'>
		  </td>
		  </tr>
          <tr><td></td><td><input type=submit name=submit value=Update class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></td></tr>
		  </table></form></div></div></div>";
    break;  
}
?>