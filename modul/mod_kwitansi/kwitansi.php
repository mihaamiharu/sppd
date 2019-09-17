<?php
$aksi="modul/mod_kwitansi/aksi_kwitansi.php";
$print ="modul/mod_kwitansi/cetak.php";

switch($_GET[act]){
  // Tampil kwitansi
  default:
  echo   "<h1>
        Laporan |
        <small>Kwitansi Perjalanan Dinas</small>
      </h1>";
        //  <input type=button value='Tambah Data kwitansi' 
         // onclick=\"window.location.href='?module=kwitansi&act=tambahkwitansi';\">";
    echo "
    <table id=\"example1\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th>Nama</th><th>Tujuan</th><th>Lama</th><th>Lumpsum</th><th>Penginapan</th>
		  <th>Transportasi</th><th>Total</th><th>aksi</th></tr></thead>"; 
    $no=0;
	echo "<tbody>";
      $tampil = mysql_query("SELECT * FROM kwitansi,pegawai WHERE kwitansi.id_pegawai=pegawai.id_pegawai");
    while ($t=mysql_fetch_array($tampil)){
		$lumpsum= $t['lama'] * $t['lumpsum'];
		$penginapan= $t['lama'] * $t['penginapan'];
		$transportasi= $t['lama'] * $t['transportasi'];
		$tot =$lumpsum + $penginapan + $transportasi;
		$total = number_format($tot,0,'','.');
		$no++;
	   echo "</td>
	   		<td>$no</td>
			<td>$t[nama]</td>
		     <td>$t[tujuan]</td>
			 <td>$t[lama]</td>
			 <td>$lumpsum</td>
			 <td>$penginapan</td>
			 <td>$transportasi</td>
			 <td>RP. $total</td>
             <td><a href=$print?module=kwitansi$act=print&id=$t[id_kwitansi]><img src=images/cetak.png width=30px data-toggle='tooltip'title='Print'</a>";
			 if($_SESSION['level']!="kabag") {
			 echo " <a href=$aksi?module=kwitansi&act=hapus&id=$t[id_kwitansi]><img src=images/traz.png width=30px data-toggle='tooltip'title='Hapus'></a>";
			 }
			 echo "</td></tr>";
    }
    echo "</tbody></table>";
    break;
  case "tambahkwitansi":
  	$t=mysql_fetch_array(mysql_query("SELECT * FROM sppd,pegawai,golongan,nppt,tujuan WHERE id_sppd='$_GET[id]'
	AND sppd.id_pegawai=pegawai.id_pegawai AND golongan.id_golongan=pegawai.id_golongan AND sppd.id_nppt=nppt.id_nppt
	AND tujuan.id_tujuan=nppt.id_tujuan"));
    echo "<h1>
        KWITANSI |
        <small>Tambah Data Kwitansi</small>
      </h1>
		  <form method=POST action='$aksi?module=kwitansi&act=input'>
          <table width=100%>
		  <tr><td>Nama Pegawai</td><td>$t[nama] <input type='hidden' name='id_pegawai' value='$_GET[id_pegawai]'>
		  <input type='hidden' name='id_sppd' value='$t[id_sppd]'></td></tr>
		  <tr><td>Golongan </td><td>$t[golongan]</td></tr>
		  <tr><td>Dari/Ke </td><td>Kecamatan Margahayu / $t[tujuan]<input type=hidden name='tujuan' value='$t[tujuan]'></td></tr>
		  <tr><td>Lama Perjalanan </td><td>$t[lama] hari<input type=hidden name='lama' value='$t[lama]'></td></tr>";
		  $c=mysql_query("SELECT * FROM biaya WHERE id_golongan='$t[id_golongan]' AND id_tujuan LIKE '%$t[id_tujuan]%'");
		  $b=mysql_fetch_array($c);
		  $lumpsum = $t['lama'] * $b['lumpsum'];
		  $penginapan = $t['lama'] * $b['penginapan'];
		  $transportasi = $t['lama'] * $b['transportasi'];
		  
			
    echo "<tr><td>Lumpsum</td><td>$t[lama] x $b[lumpsum]</td></tr>
		  <tr><td>Total Lumpsum</td>		  <td><input type='text' name='' value='$lumpsum'>
	<input type='hidden' name='lumpsum' value='$b[lumpsum]'></td></tr>
		  <tr><td>Penginapan</td><td>$t[lama] x $b[penginapan]</td></tr>
		  <tr><td>Total Penginapan</td><td><input type='text' name='' value='$penginapan'>
	<input type='hidden' name='penginapan' value='$b[penginapan]'></td></tr>
		  <tr><td>Transportasi</td><td><input type='text' name='transportasi' value='$transportasi'>
	<input type='hidden' name='transportasi' value='$b[transportasi]'></td></tr>	  </td></tr>
   		  <tr><td>Sudah di Terima dari</td><td><textarea name='dari' style='width:500px;height:50px'>
		  KUASA PENGGUNA ANGGARAN / KEPALA BAGIAN KESEJAHTERAAN RAKYAT SEKRETARIAT DAERAH KECAMATAN MARGAHAYU</textarea></td></tr>
   		  <tr><td>Untuk Pembayaran</td><td><textarea class='form-control' name='untuk' placeholder='Masukan Maksud Pembayaran...' style='width:500px;height:50px'></textarea></td></tr>
          <tr><td></td><td><input type=submit name=submit value=Simpan class='btn btn-success'>		  
		  
                            <input type=button value=Batal class='btn btn-danger' onclick=self.history.back()></td></tr>
		  </table></form>";
     break;

}
?>
