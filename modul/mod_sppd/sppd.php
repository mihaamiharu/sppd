<?php
$aksi="modul/mod_sppd/aksi_sppd.php";
$print ="modul/mod_sppd/cetak.php";

switch($_GET[act]){
  // Tampil sppd
  default:
      $tampil = mysql_query("SELECT * FROM sppd,nppt,pegawai,tujuan WHERE sppd.id_nppt=nppt.id_nppt AND pegawai.id_pegawai=sppd.id_pegawai AND nppt.id_tujuan=tujuan.id_tujuan");
  echo   "<h1>
        SPPD |
        <small>Surat Perintah Perjalanan Dinas</small>
      </h1>
          <input type=button value='Tambah Data' class='btn btn-success' 
          onclick=\"window.location.href='?module=sppd&act=tambahsppd';\"><br /><br />";
    echo "
    <table id=\"example1\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th>Nama</th><th>No SPPD</th><th>Tugas</th><th>T.Berangkat</th><th>T.Tujuan</th><th>Cetak</th><th>Hapus</th><th>Kwitansi</th></tr></thead>"; 
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
	   		 <td>$r[nama]</td>
			 <td>$r[no_sppd]</td>
		     <td>$r[maksud]</td>
			 <td>Kecamatan Margahayu</td>
			 <td>$r[tujuan]</td>
             <td align='center'><a href=$print?module=sppd$act=print&id=$r[id_sppd]><img src=images/cetak.png width=30px data-toggle='tooltip'title='Print'</td>
			 
			 <td align='center'><a href=$aksi?module=sppd&act=hapus&id=$r[id_sppd] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src=images/traz.png width=30px data-toggle='tooltip'title='Hapus'</a></td>
			 <td align='center'>";
			 $cek=mysql_num_rows(mysql_query("SELECT * FROM kwitansi WHERE id_sppd='$r[id_sppd]'"));
			 if ($cek > 0 ) {
			  echo "<img src='images/ico_active_16.png'>";
			 }else {
			 echo "
			 <input type=button value='Buat Kwitansi' class='btn btn-info'
			 
			 
          onclick=\"window.location.href='?module=kwitansi&act=tambahkwitansi&id=$r[id_sppd]&id_pegawai=$r[id_pegawai]';\">";
			 }
			 echo "</td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  case "tambahsppd":
    echo "<h1>
        SPPD |
        <small>Surat Perintah Perjalanan Dinas</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/tambah.png width=30px>Form Tambah Data SPPD</h3>
        </div>
        <div class='box-body'>
		<div align='center'><form method=POST action='$aksi?module=sppd&act=input'>
		  <table width=\"100%\">
		  <tr align='center'><th><b>Pilih Data Pegawai</b></th><th><b>Isi Data Berikut</b></th></tr>
		  <tr><td valign='top' style='padding-left:4px'>";
		  if ($_GET['id']=="") {
		   $sql=mysql_query("SELECT * FROM pegawai");
		   while ($t=mysql_fetch_array($sql)) {
		  echo "<input type='checkbox' name='id_pegawai[]' value='$t[id_pegawai]'> $t[nama]<br/>"; 
		   }
		  }else{
		  $sql=mysql_query("SELECT * FROM spt WHERE id_spt='$_GET[id]'");
		  while($r=mysql_fetch_array($sql)) {
			$value =explode('-',$r['id_pegawai']);
			$nomer= 0;
			for($i=0;$i<count($value);$i++) { 
			$data=$value[$i];
			$nomer++;
		   $sql=mysql_query("SELECT * FROM pegawai WHERE id_pegawai='$data'");
		   $t=mysql_fetch_array($sql);
		  echo "<input type='checkbox' name='id_pegawai[]' value='$t[id_pegawai]' checked='checked'> $t[nama]<br/>";  
			}
		  }
	echo  "</td>";
		  }
  $sql=mysql_query("SELECT * FROM spt WHERE id_spt='$_GET[id]'");
  $r=mysql_fetch_array($sql);
    $edit=mysql_query("SELECT * FROM nppt,tujuan WHERE id_nppt='$r[id_nppt]' AND nppt.id_tujuan=tujuan.id_tujuan");
    $t=mysql_fetch_array($edit);
	echo"
		  <td>
		  <div align=\"center\">
          <table class='table2'><input type=hidden name='id_nppt' value='$r[id_nppt]'>
          <tr><td>Pejabat Yang Memberi Perintah</td><td> <input type=text name='pemberi_perintah' size=35 value='CAMAT'></td></tr>
          <tr><td>Tempat Tujuan</td><td> <input type=text class='form-control' name='tujuan' placeholder='Masukan Tempat Tujuan...' value='$t[tujuan]' size=35></td></tr>
          <tr><td>Maksud Perjanalan Dinas</td><td> <input type=text class='form-control' name='maksud' placeholder='Masukan Maksud Perjalanan dinas...'  value='$t[maksud]' size=60></td></tr>
          <tr><td>Kendaraan Yang Di Pergunakan</td><td>";
		  if ($t['id_transportasi'] !="") {
				$value =explode('-',$t['id_transportasi']);
				for($i=0;$i<count($value);$i++) { 
				$data=$value[$i];
				$nomer++;
				   $sql=mysql_query("SELECT * FROM transportasi WHERE id_transportasi='$data'");
				   $r=mysql_fetch_array($sql);
				   echo "- $r[transportasi] ";
				   echo "<br/>";
				}
		  }else {
		  $sql=mysql_query("SELECT * FROM transportasi");
		  while($r=mysql_fetch_array($sql)) {
		  echo "<input type='radio' name='id_transportasi[]' value='$r[id_transportasi]'>$r[transportasi]<br/>";  
		  }
			  
		  }
			echo "</td></tr>
          <tr><td>Lama Perjalanan</td><td><input type=text name='lama' value='$t[lama]' size=4 disabled='disabled'>&nbsp; Hari</td></tr>
          <tr><td>Tanggal Berangkat</td><td><input type=text name='tgl_pergi' id='tgl_pergi' value='$t[tgl_pergi]' size=10 disabled='disabled'></td></tr>
          <tr><td>Tanggal Kembali</td><td><input type=text name='tgl_kembali' id='tgl_kembali' value='$t[tgl_kembali]' size=10 disabled='disabled'></td></tr>
          <tr><td>Instansi</td><td><input type=text name='instansi' size=45
		  value='Kecamatan Margahayu'></td></tr>
          <tr><td>Mata Anggaran</td><td><input type=text name='mata_anggaran' size=25 value='APBD 2019'></td></tr>
          <tr><td>Keterangan Lain</td><td> <textarea class='form-control' name='keterangan' placeholder='Masukan Keterangan Lain...' style='width: 480px; height: 100px;'></textarea></td></tr>
          </table></div>
		  </td>
		  </tr>
          <tr><td></td><td><input type=submit name=submit value=Simpan class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'></td></tr>
		  </table></form></div></div></div>";
     break;
  case "editsppd":
    $edit=mysql_query("SELECT * FROM sppd WHERE id_sppd='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit sppd</h2>
    <div class='box box-success'>
		<div align='center'>
          <form method=POST action=$aksi?module=sppd&act=update>
          <input type=hidden name=id value='$r[id_sppd]'>
          <table>
          <tr><td>NIP</td><td> : <input type=text name='nip' value='$r[nip]' size=45></td></tr>
          <tr><td>Nama</td><td> : <input type=text name='nama' value='$r[nama]' size=30></td></tr>
          <tr><td>Pangkat</td><td> : <input type=text name='pangkat' value='$r[pangkat]' size=45></td></tr>
		  <tr><td>Golongan</td><td> : <input type=text name='golongan' value='$r[golongan]' size=10></td></tr>
		  <tr><td>Jabatan</td><td> : <input type=text name='jabatan' value='$r[jabatan]' size=45></td></tr>
		  <tr><td>Unit Kerja</td><td> : <input type=text name='unitkerja' value='$r[unitkerja]' size=45></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form></div></div>";     
    break;  
}
?>
