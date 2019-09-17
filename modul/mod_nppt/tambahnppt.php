<?php
$aksi="modul/mod_nppt/aksi_nppt.php";
    echo "
	
	
	<h1>
        NPPD |
        <small>Nota Permintaan Perjanalan Dinas</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/tambah.png width=30px>Form Tambah NPPD</h3>
        </div>
        <div class='box-body'>
		<div align='center'>  <form method=POST action='$aksi?module=nppt&act=input' onsubmit='return checkForm(this);'>
		  <table width=100%>
		  <tr align='center'><th><b>PILIH DATA PEGAWAI</b></th><th><b>ISI DATA BERIKUT</b></th></tr>
		  <tr><td valign='top' style='padding-left:4px'>
		  <div style='overflow:auto;height:400px;'>";
		  $sql=mysql_query("SELECT * FROM pegawai");
		  while($r=mysql_fetch_array($sql)) {
		  echo "<input type='checkbox' name='id_pegawai[]' value='$r[id_pegawai]' > $r[nama]<br/>";  
		  }
	echo  "</div></td>
		  <td>
      <div align=\"center\">
        <table class='table2'>
		  <tr><td>Tujuan Perjalanan</td><td><select name='tujuan'>
			  <option value=0 selected>Pilih Tujuan</option>";
			   $tampil=mysql_query("SELECT * FROM tujuan");
			   while($r=mysql_fetch_array($tampil)){
			   echo "<option value=$r[id_tujuan]> $r[tujuan]</option></p>"; }
   
   echo "</select></td></tr>
          <tr><td>Maksud Perjanalan Dinas</td><td><input type='text' class='form-control' name='maksud' maxlength='1000' placeholder='Maksud Perjalanan Dinas...' size=80 required /> </td></tr>
		  <tr><td>Tipe Transportasi:</td><td valign='top'>";
		  $sql=mysql_query("SELECT * FROM transportasi");
		  while($r=mysql_fetch_array($sql)) {
		  echo "<input type='radio' name='id_transportasi[]' value='$r[id_transportasi]' class='flat-red'>$r[transportasi]<br/>";  
		  }
	echo  "</td></tr>
          <tr><td>Tanggal Berangkat</td><td><input type=date name='tgl_pergi' id='tanggal' size=15 required/> &nbsp<img src=images/kalender.png width=30px >&nbsp Thn-Bln-hari</td></tr>
          <tr><td>Tanggal Kembali</td><td><input type=date name='tgl_kembali' id='tgl_kembali' onChange='kurangi()' size=15 required> &nbsp<img src=images/kalender.png width=30px>&nbsp Thn-Bln-hari</td></tr>
          <tr><td>Lama Perjalanan</td><td><input type=text class='form-control' name='lama' placeholder='...' size=5 id='lama' required />&nbsp; Hari</td></tr>
          </table></div>
		  </td>
		  </tr>
          <tr><td></td><td><input type=submit name=submit value=Simpan class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></td></tr>
		  </table></form></div></div></div>";
?>