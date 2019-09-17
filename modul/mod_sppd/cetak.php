<style>
h2,h1,h3{ padding:0;margin:0;}
h1 {font-size:22px;font-weight:bold}
h2 {font-size:22px;font-weight:normal}
#wrapper {
	width:780px;
	margin:0 auto;
	font-size:15px;
}
#ol {margin:0}
#logo {
	width:95px;
	float:left;	
	margin-bottom:8px;
}
hr{border-bottom: 5px double #000;clear:both}
#cop {
	float:left;width:600px;text-align:center;
}
#kanan{clear:both;width:auto;float:right;margin-bottom:10px;}
#header {clear:both;text-align:center;}

#garis1{border-top:double 5px #000000;border-bottom:1px solid #000}
#garis2 {border-bottom:1px solid #000}
#garis3{border-bottom:3px solid #000}
#g4{border-right:1px solid #000}
#table {
	font-family: Verdana, Arial, Helvetica, sans-serif; 
	font-size: 10pt;
	border-width: 1px;
	border-style: solid;
	border-color: #000;
	border-collapse: collapse;
	margin: 10px 0px;
}
#table td{
	padding: 0.4em;
	border-right:1px solid #000;
}

</style>
<div id="wrapper">
<div id="logo"><img src="../../Bandung.png" width="110" height="100"></div>
<div id="cop">
  <h2>PEMERINTAH KABUPATEN BANDUNG</h2>
  <h1>KECAMATAN MARGAHAYU</h1>
  Jln. Sukamenak No. 145  Telp.(022) 5417870 Margahayu 40227
</div>
<hr>
<div id="kanan">
<?php
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
$qry=mysql_query("SELECT * FROM sppd,nppt,pegawai,tujuan,golongan WHERE id_sppd='$_GET[id]' AND sppd.id_pegawai=pegawai.id_pegawai AND sppd.id_nppt=nppt.id_nppt AND nppt.id_tujuan=tujuan.id_tujuan AND golongan.id_golongan=pegawai.id_golongan");
$r=mysql_fetch_array($qry);
?>
<table width="350">
<tr><td width="100">Lembar ke </td><td>: </td></tr>
<tr><td>Kode No </td><td>: </td></tr>
<tr><td>Nomor </td><td>: <?php echo $r['no_sppd']; ?></td></tr>
</table>
</div>	
<div id="header">
<h2><u><strong>SURAT PERINTAH PERJALANAN DINAS</strong></u><strong><br />
(SPPD)</strong></h2></div>
<?php
$tglpergi= tgl_indo ($r['tgl_pergi']);
$tglkembali= tgl_indo ($r['tgl_kembali']);

echo "<table id='table' width=100%>
<tr id='garis1'><td>1.</td><td width=50% id='g4'>Pejabat yang memberi perintah		</td><td>CAMAT</td></tr>


 <tr id='garis3'><td>2.</td><td id='g4'> Nama / NIP Pegawai yang diperintah			</td><td>$r[nip]</td></tr>
 <tr><td>3.</td><td id='g4'>a. Pangkat dan Golongan 	</td><td>$r[pangkat] $r[golongan]</td></tr>
 <tr><td></td><td id='g4'>b. Jabatan								</td><td>$r[jabatan]</td></tr>
 <tr  id='garis3'><td></td><td id='g4'>c. Tingkat menurut peraturan perjalanan </td><td> </td></tr>
 <tr  id='garis2'><td>4. </td><td id='g4'>Maksud Perjalan Dinas						</td><td>$r[maksud]</td></tr>
 <tr id='garis2'><td>5. </td><td id='g4'>Alat Angkutan Yang di Pergunakan			</td><td>";
			$value =explode('-',$r['id_transportasi']);
			$nomer= 0;
			for($i=0;$i<count($value);$i++) { 
			$data=$value[$i];
			$nomer++;
			   $sql=mysql_query("SELECT * FROM transportasi WHERE id_transportasi='$data'");
			   $t=mysql_fetch_array($sql);
			   echo "$t[transportasi] ";
			   echo ",&nbsp;";
			}
 
 echo"</td></tr>
 <tr><td>6. </td><td id='g4'>a. Tempat Berangkat										</td><td> </td></tr>
 <tr  id='garis2'><td></td><td id='g4'>b. Tempat Tujuan			</td><td> $r[tujuan]</td></tr>
 <tr><td>7. </td><td id='g4'>a. Lama Perjalanan Dinas								</td><td>$r[lama] hari</td></tr>
 <tr><td></td><td id='g4'>b. Tanggal Berangkat					</td><td>$tglpergi </td></tr>
 <tr id='garis2'><td></td><td id='g4'>c. Tanggal Kembali			</td><td>$tglkembali </td></tr>
 <tr><td>8.</td><td id='g4'>Pengikut									</td><td> </td></tr>
 <tr><td></td><td id='g4'>a. 								</td><td></td></tr>
 <tr><td></td><td id='g4'>b. 								</td><td></td></tr>
 <tr id='garis2'><td></td><td id='g4'>c.					</td><td></td></tr>
 <tr><td>9. </td><td id='g4'>Pembina Angaran											</td><td> </td></tr>
 <tr><td></td><td id='g4'>a. Instansi								</td><td>$r[instansi] </td></tr>
 <tr id='garis2'><td></td><td id='g4'>b. Mata Anggaran			</td><td>$r[mata_anggaran] </td></tr>
 <tr id='garis2'><td>10.</td><td id='g4'>Keterangan Lain-Lain						</td><td>$r[keterangan]</td></tr>
 </table>";		

?>
<div style="width:300px;float:right;margin-top:15px">
DIKELUARKAN &nbsp; : Margahayu<br>
PADA TANGGAL  : <?php echo date("d-m-Y") ?><br>
<div style="text-align:center;font-weight:bold">
<br>
CAMAT MARGAHAYU<br>
<p>&nbsp;</p>
<br />
<p><u>MOCHAMAD ISCHAQ, S.Sos</u><br>
NIP. 19650529 198903 1 009</p></div>
</div>

</div>
<p>
<p>
<div style="clear:both;"></div>
<div style="margin-top:100px"></div>
<div id="wrapper">
<?php
	echo "<table id='table' width=100%>
	<tr id='garis2'><td width='50%'></td>
	<td>SPPD  No	:<br />
		Berangkat dari	:<br />
		(Tempat Kedudukan)	:<br />
		Pada Tanggal		:<br />
		Ke					:<br /><br />

		<h4>Selaku Pelaksana Teknis Kegiatan</h4>
		<br />
		Nama		:<br />
		Pangkat		:<br />
		NIP			:
	</td>
	</tr>
	<tr id='garis3'>
	<td> I Tiba di		:<br />
		 Pada Tanggal	:<br />
		 Kepala			:
	</td>
	<td>Berangkat dari	:<br />
		Ke				:<br />
		Pada Tanggal	:<br />
<br />
		Kepala			:
	</td>
	</tr>
	<tr id='garis2'>
	<td> II Tiba di		:<br />
		 Pada Tanggal	:<br />
		 Kepala			:
	</td>
	<td>Berangkat dari	:<br />
		Ke				:<br />
		Pada Tanggal	:<br />
<br />
		Kepala			:
	</td>
	</tr>
	<tr id='garis2'>
	<td> I Tiba di		:<br />
		 Pada Tanggal	:<br />
		 Kepala			:
	</td>
	<td>Berangkat dari	:<br />
		Ke				:<br />
		Pada Tanggal	:<br />
<br />
		Kepala			:
	</td>
	</tr>
	<tr ><td width='50%'></td>
	<td>IV Tiba kembali di 	:<br />
		Pada tanggal		:<br />
		Telah diperiksa, dengan keterangan bahwa<br />
		perjalanan tersebut diatas benar dilakukan<br />
		atau perintahnya dan semata-mata untuk<br />
		kepentingan jabatan dalam waktu yang<br />
		sesingkat-singkatnya.<br />
<br />
<br />
		

	</td>
	</tr>
	</table>";

echo "<table style='border:1px solid #000;width:100%'>
		<tr><td><h4>V CATATAN LAIN</td></tr></table>";
echo "<table>
	  <tr><td><h4>VI</h4></td><td><h4>PERHATIAN</h4></td></tr>
	  <tr><td></td><td>
	  Pejabat yang berwenang menerbitkan SPPD. Pegawai yang melakukan perjalanan dinas,
	  para pejabat yang mengesahkan tanggal berangkat/tiba 
	  serta Bendaharawan bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila Negara mendapat rugi
	  akibat kesalahan, kealpaanya.
	  </td></tr></table>";
?>
</div>