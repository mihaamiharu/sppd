<?php
$aksi="modul/mod_lpd/aksi_lpd.php";
$print ="modul/mod_lpd/cetak.php";

switch($_GET[act]){
  // Tampil lpd
  default:
  echo   "<h1>
        Laporan |
        <small>Laporan Perjalanan Dinas</small>
      </h1>";
        //  <input type=button value='Tambah Data lpd' 
         // onclick=\"window.location.href='?module=lpd&act=tambahlpd';\">";
    echo "
    <table id=\"example1\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th>Nama</th><th>NO SPT</th><th>Hasil</th><th>Tanggal</th><th>aksi</th></tr></thead>"; 
    $no=0;
	echo "<tbody>";
      $tampil = mysql_query("SELECT * FROM lpd,pegawai,spt WHERE lpd.id_pegawai=pegawai.id_pegawai 
	  AND lpd.id_spt=spt.id_spt");
    while ($t=mysql_fetch_array($tampil)){
		$tanggal = tgl_indo($t['tanggal']);
		$no++;
	   echo "</td>
	   		<td>$no</td>
			<td>$t[nama]</td>
			<td>$t[no_spt]</td>
		     <td>$t[hasil]</td>
			 <td>$tanggal</td>
             <td align='center'><a href=$print?&id=$t[id_lpd]><img src=images/cetak.png width=27,5px data-toggle='tooltip'title='Print'</a>";
		if($_SESSION['level']!="kabag") {
		echo "<a href=?module=lpd&act=editlpd&id=$t[id_lpd]><img src=images/editz.png width=27,5 data-toggle='tooltip'title='Update'</a>
			 <a href=$aksi?module=lpd&act=hapus&id=$t[id_lpd]><img src=images/traz.png width=27,5px data-toggle='tooltip'title='Hapus'</a>
			 ";
		}
		echo "</td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  case "tambahlpd":
  	$t=mysql_fetch_array(mysql_query("SELECT * FROM pegawai,golongan WHERE golongan.id_golongan=pegawai.id_golongan 
	AND pegawai.id_pegawai='$_SESSION[id_pegawai]'"));
    echo "<h2>BUAT LAPORAN PERJALANAN DINAS</h2>
		  <form method=POST action='$aksi?module=lpd&act=input'>
          <table width=100%>
		  <tr><td>Nama / NIP</td><td>$t[nama]  <input type='hidden' name='id_pegawai' value='$t[id_pegawai]'></td></tr>
		  <tr><td>Pangkat / Golongan </td><td>$t[pangkat] / $t[golongan]</td></tr>
		  <tr><td>NIP</td><td>$t[nip]</td></tr>
		  <tr><td>Jabatan</td><td>$t[jabatan]</td></tr>			
    	  <tr><td>Unit Kerja</td><td>$t[unitkerja]</td></tr>";
  $c = mysql_fetch_array(mysql_query("SELECT * FROM spt,nppt,tujuan WHERE spt.id_nppt=nppt.id_nppt AND spt.id_spt='$_GET[id]' AND tujuan.id_tujuan=nppt.id_tujuan"));
  $tgl_pergi = tgl_indo($c['tgl_pergi']);
  $tgl_kembali = tgl_indo($c['tgl_kembali']);
   echo " <tr><td colspan=2><input type='hidden' name='id_spt' value='$c[id_spt]'>
   <textarea name='dari' style='width:100%;height:150px'>
		  Telah melaksanakan Perjalanan Dinas dalam rangka $c[tugas] , berdasarkan
		  Surat Perintah Tugas Nomor : $c[no_spt] , dari tanggal $tgl_pergi s/d $tgl_kembali di $c[tujuan]</textarea></td></tr>
   		  <tr><td colspan=2><textarea name='hasil' style='width:100%;height:150px'>
		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : 
		  </textarea></td></tr>
          <tr><td></td><td><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
		  </table></form>";
     break;
  case "editlpd":
  	$t=mysql_fetch_array(mysql_query("SELECT * FROM pegawai,golongan WHERE golongan.id_golongan=pegawai.id_golongan 
	AND pegawai.id_pegawai='$_SESSION[id_pegawai]'"));
		  $k=mysql_fetch_array(mysql_query("SELECT * FROM lpd WHERE id_lpd='$_GET[id]'"));
    echo "<h1>
        Laporan |
        <small>Laporan Perjalanan Dinas</small>
      </h1>
          <form method=POST action=$aksi?module=lpd&act=update>
          <input type=hidden name=id value='$k[id_lpd]'>
          <table width=100%>
		  <tr><td>Nama / NIP</td><td>$t[nama]  <input type='hidden' name='id_pegawai' value='$t[id_pegawai]'></td></tr>
		  <tr><td>Pangkat / Golongan </td><td>$t[pangkat] / $t[golongan]</td></tr>
		  <tr><td>NIP</td><td>$t[nip]</td></tr>
		  <tr><td>Jabatan</td><td>$t[jabatan]</td></tr>			
    	  <tr><td>Unit Kerja</td><td>$t[unitkerja]</td></tr>";
		  $c = mysql_fetch_array(mysql_query("SELECT * FROM spt,nppt,tujuan WHERE spt.id_nppt=nppt.id_nppt AND spt.id_spt='$k[id_spt]' AND tujuan.id_tujuan=nppt.id_tujuan"));
		  $tgl_pergi = tgl_indo($c['tgl_pergi']);
		  $tgl_kembali = tgl_indo($c['tgl_kembali']);
		  echo " <tr><td colspan=2><input type='hidden' name='id_spt' value='$c[id_spt]'>
		  <textarea name='dari' style='width:100%;height:60px'>
		  Telah melaksanakan Perjalanan Dinas dalam rangka $c[tugas] , berdasarkan
		  Surat Perintah Tugas Nomor : $c[no_spt] , dari tanggal $tgl_pergi s/d $tgl_kembali di $c[tujuan]</textarea></td></tr>";
		  
   		  echo "<tr><td colspan=2><textarea name='hasil' style='width:100%;height:100px'>$k[hasil]</textarea></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    break;  
}
?>
