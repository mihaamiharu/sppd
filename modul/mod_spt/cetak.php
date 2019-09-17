<style>
h2,h1,h3{ padding:0;margin:0;}
h1 {font-size:22px;font-weight:bold}
h2 {font-size:22px;font-weight:normal}
#wrapper {
	width:780px;
	margin:0 auto;
}
#ol {margin:0}
#logo {
	width:95px;
	float:left;	
}
hr{border-bottom: 5px double #000;}
#cop {
	float:left;width:600px;text-align:center;
}

#kodepos{clear:both;text-align:right}
#header {clear:both;text-align:center}
</style>
<div id="wrapper">
<div id="logo"><img src="../../Bandung.png" width="110" height="100"></div>
<div id="cop">
  <h2>PEMERINTAH KABUPATEN BANDUNG</h2>
  <h1>KECAMATAN MARGAHAYU</h1>
  Jln. Sukamenak No. 145  Telp.(022) 5417870 Margahayu 40227<br>
</div>
<div id="kodepos"></div>
<hr>
<?php
include "../../config/koneksi.php";
$qry=mysql_query("Select * FROM spt WHERE id_spt='$_GET[id]'");
$r=mysql_fetch_array($qry);
echo "
<div id='header'>
<h2><u>SURAT PERINTAH TUGAS</u></h2>
NOMOR : &nbsp;&nbsp;&nbsp;&nbsp;  /$r[no_spt]
<div id='isi'>
<table>
<ol style='padding:0;margin-left:0'>
</ol>
</td></tr>
</table>
<br>
<h1>MEMERINTAHKAN</h1></div>
<br>
<div style='float:left'>Kepada :</div><br>";

$value= explode("-",$r['id_pegawai']);
$no=0;
echo "<ol>";
for ($i=0;$i<count($value);$i++) {
	$data=$value[$i];
	$no++;
	$qs=mysql_query("Select * from pegawai,golongan WHERE id_pegawai='$data' AND golongan.id_golongan=pegawai.id_golongan");
	$t=mysql_fetch_array($qs); 
	
	echo "<table>
			<tr><td width=250>$no.Nama/NIP			</td><td>: <b> $t[nama]</b>/$t[nip]</td></tr>
		     <tr><td>&nbsp; &nbsp;Pangkat/Golongan Ruang	</td><td>: $t[pangkat]/$t[golongan]</td></tr>
			 <tr><td>&nbsp; &nbsp;Jabatan					</td><td>: $t[jabatan]</td></tr>
			 <tr><td>&nbsp; &nbsp;Unit Kerja				</td><td>: $t[unitkerja]</td></tr></table>";		
}
echo "</ol>";
echo "<div style='float:left;width:50px;'>Untuk :</div>";
echo "<div style='float:left;width:730px;padding:0'>$r[tugas]</div>";
?>
</div>
<div style="width:300px;float:right;margin-top:10px;">
<br>
MARGAHAYU, <?php echo date("d-m-Y") ?><br>
<div style="text-align:center;font-weight:bold">
<br>
CAMAT MARGAHAYU<br>
<br>
<p>&nbsp;</p>
<p><u>MOCHAMAD ISCHAQ, S.Sos</u><br>
  Pembina Tk.I<br>
NIP. 19650529 198903 1 009</p></div>
</div>

</div>
