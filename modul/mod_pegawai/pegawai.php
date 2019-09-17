<?php
$aksi="modul/mod_pegawai/aksi_pegawai.php";
$aksi2="modul/mod_pegawai/cetak.php";
switch($_GET[act]){
  // Tampil Pegawai
  default:
      $tampil = mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan ");
  echo   "<h1>
        Master |
        <small>Data Pegawai</small>
      </h1>
          <input type=button value='Tambah Data Pegawai' class='btn btn-success'
          onclick=\"window.location.href='?module=pegawai&act=tambahPegawai';\">
		  <div style='float:right'>
          <input type=button value='Cetak Data Pegawai' class='btn btn-warning'
          onclick=\"window.location.href='$aksi2';\">
		  </div><br /><br />
    <table id=\"example1\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th>NIP</th><th>Nama</th><th>Pangkat</th><th>Golongan</th><th>Jabatan</th><th>Unit Kerja</th><th>Username</th><th>Password</th><th>Action </th></tr></thead>
          <tfoot><tr><th>No</th><th>NIP</th><th>Nama</th><th>Pangkat</th><th>Golongan</th><th>Jabatan</th><th>Unit Kerja</th><th>Username</th><th>Password</th><th>Action </th></tr></tfoot>"; 
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nip]</td>
             <td>$r[nama]</td>
		     <td>$r[pangkat]</td>
		     <td>$r[golongan]</td>
			 <td>$r[jabatan]</td>
			 <td>$r[unitkerja]</td>	 
			 <td>$r[username]</td>
			 <td>$r[password]</td>
             <td><a href=?module=pegawai&act=editPegawai&id=$r[id_pegawai]><img src=images/editz.png width=28 data-toggle='tooltip'title='Update'</a>
			 <a href=$aksi?module=pegawai&act=hapus&id=$r[id_pegawai] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src=images/traz.png width=28px data-toggle='tooltip'title='Hapus'</a></td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  case "tambahPegawai":
echo "<h1>
        Master |
        <small>Data Pegawai</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/tambah.png width=30px>Form Input Pegawai</h3>
        </div>
        <div class='box-body'>
		<div align='center'>
          <form method=POST action='$aksi?module=pegawai&act=input'>
          <table class='table2'>
          <tr><td width='150'>NIP</td><td><input type=text class='form-control' name='nip' maxlength='17' placeholder=' NIP (Max 19 digit)' size=45 required /></td></tr>
          <tr><td>Nama</td><td><input type=text class='form-control' name='nama' placeholder=' Masukan Nama...' size=30 required /></td></tr>
          <tr><td>Pangkat</td><td><input type=text class='form-control' name='pangkat' placeholder=' Masukan Pangkat...' size=45 required /></td></tr>
		  <tr><td>Golongan</td><td><select name='golongan' required />
			  <option value=0 selected>Pilih Kategori</option>";
			   $tampil=mysql_query("SELECT * FROM golongan");
			   while($r=mysql_fetch_array($tampil)){
			   echo "<option value=$r[id_golongan]>$r[golongan]</option></p>"; }
   
   echo "</select>";	
echo " <tr><td>Jabatan</td><td><input type=text class='form-control' name='jabatan' placeholder=' Masukan Jabatan...' size=60 required /></td></tr>
   	   <tr><td>Unit Kerja</td><td><input type=text class='form-control' name='unitkerja' placeholder=' Masukan Unit Kerja...' size=65 required /></td></tr>
          <tr><td></td><td><input type=submit name=submit value=Simpan class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></td></tr>
          </table></form>
		  </div></div></div>";
     break;
  case "editPegawai":
    $edit=mysql_query("SELECT * FROM Pegawai WHERE id_Pegawai='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "
	<h1>
        Master |
        <small>Data Pegawai</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'> <img src=images/editz.png width=30px> &nbsp Form Edit Pegawai</h3>
        </div>
        <div class='box-body'>
		<div align='center'>
          <form method=POST action=$aksi?module=pegawai&act=update>
          <input type=hidden name=id value='$r[id_pegawai]'>
		  <table class='table2'>
          <tr><td width=150>NIP</td><td><input type=text name='nip' value='$r[nip]' size=45 required /></td></tr>
          <tr><td>Nama</td><td><input type=text name='nama' value='$r[nama]' size=30 required /></td></tr>
          <tr><td>Pangkat</td><td><input type=text name='pangkat' value='$r[pangkat]' size=45 required /></td></tr>
		  <tr><td>Golongan</td><td> <select name='golongan'>";
		  $tampil=mysql_query("SELECT * FROM golongan");
		   if ($r[id_golongan]==0){
		   echo "<option value=0 selected>- Pilih Kategori -</option>"; }   
		
		   while($w=mysql_fetch_array($tampil)){
		   if ($r[id_golongan]==$w[id_golongan]){
		   echo "<option value=$w[id_golongan] selected>$w[golongan]</option>";}
		   else{
		   echo "<option value=$w[id_golongan]>$w[golongan]</option> </p> ";}}
		
		   echo "</select>";	
echo " <tr><td>Jabatan</td><td><input type=text name='jabatan' size=60 value='$r[jabatan]' required /></td></tr>
		  <tr><td>Unit Kerja</td><td><input type=text name='unitkerja' value='$r[unitkerja]' size=65 required /></td></tr>
          <tr><td></td><td><input type=submit value=Update class='btn btn-danger'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'></td></tr>
          </table>
		  </form></div></div></div>";     
    break;  
}
?>
