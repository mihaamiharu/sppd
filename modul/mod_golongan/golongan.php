<?php
$aksi="modul/mod_golongan/aksi_golongan.php";

switch($_GET[act]){
  // Tampil golongan
  default:
      $tampil = mysql_query("SELECT * FROM golongan");
  echo   "<h1>
        MASTER |
        <small>Data Golongan</small>
      </h1>
          <input type=button value='Tambah Data' class='btn btn-success'
          onclick=\"window.location.href='?module=golongan&act=tambahgolongan';\"><br /><br />";
    echo "<div style=\"width:450px\">
    <table id=\"example1\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th>golongan</th><th>aksi</th></tr></thead>"; 
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
		$biaya = number_format($r['biaya'],0,'','.');
       echo "<tr><td align='center'>$no</td>
             <td>$r[golongan]</td>
             <td align='center'><a href=?module=golongan&act=editgolongan&id=$r[id_golongan]><img src=images/editz.png width=30 data-toggle='tooltip'title='Update'</a>
			 <a href=$aksi?module=golongan&act=hapus&id=$r[id_golongan] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src=images/traz.png width=30px data-toggle='tooltip'title='Hapus'</a></td></tr>";
      $no++;
    }
    echo "</tbody></table></div>>";
    break;
  case "tambahgolongan":
	echo "<h1>
        MASTER |
        <small>Data Golongan</small>
      </h1>
          <form method=POST action='$aksi?module=golongan&act=input'>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/tambah.png width=30px> &nbsp Form Tambah Data Golongan Pegawai</h3>
        </div>
        <div class='box-body'>
		<div align='center'>
          <table width=600px class='table2'>
          <tr><td>Golongan</td><td><input type=text class='form-control' name='golongan' placeholder='Masukan Golongan...' size=45 required /></td></tr>
          <tr><td></td><td><input type=submit name=submit  class='btn btn-success' value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()  class='btn btn-warning'></td></tr>
          </table></form></div></div></div>";
     break;
  case "editgolongan":
    $edit=mysql_query("SELECT * FROM golongan WHERE id_golongan='$_GET[id]'");
    $r=mysql_fetch_array($edit);
    echo "
	<h1>
        MASTER |
        <small>Data Golongan</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/editz.png width=30px>&nbsp Form Edit Data Golongan Pegawai</h3>
        </div>
        <div class='box-body'>
		<div align='center'>
          <form method=POST action=$aksi?module=golongan&act=update>
          <input type=hidden name=id value='$r[id_golongan]'>
		  <table class='table2'>
          <tr><td>Golongan</td><td> <input type=text name='golongan' size=45 value='$r[golongan]' required /></td></tr>
          <tr><td></td><td><input type=submit value=Update  class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back()  class='btn btn-danger'></td></tr>
          </table>
		  </form>
	</div></div></div>";     
    break;  
}
?>
