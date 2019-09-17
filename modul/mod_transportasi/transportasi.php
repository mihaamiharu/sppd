<?php
$aksi="modul/mod_transportasi/aksi_transportasi.php";

switch($_GET[act]){
  // Tampil transportasi
  default:
      $tampil = mysql_query("SELECT * FROM transportasi");
  echo   "
  <h1>
        Master |
        <small>Data Transportasi</small>
      </h1>
          <input type=button value='Tambah Data' class='btn btn-success' 
          onclick=\"window.location.href='?module=transportasi&act=tambahtransportasi';\"><br /><br />";
    echo "<div style=\"width:450px\">
    <table id=\"example2\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th>transportasi</th><th>aksi</th></tr></thead>"; 
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
		$biaya = number_format($r['biaya'],0,'','.');
       echo "<tr><td align='center'>$no</td>
             <td>$r[transportasi]</td>
             <td align='center'><a href=?module=transportasi&act=edittransportasi&id=$r[id_transportasi]><img src=images/editz.png width=30</a>
			 <a href=$aksi?module=transportasi&act=hapus&id=$r[id_transportasi] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src=images/traz.png width=30px</a></td></tr>";
      $no++;
    }
    echo "</tbody></table></div>";
    break;
  case "tambahtransportasi":
    echo "
	<h1>
        Master |
        <small>Data Transportasi</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/tambah.png width=30px> &nbspForm Tambah Data Transportasi</h3>
        </div>
        <div class='box-body'>
		<div align='center'>          <form method=POST action='$aksi?module=transportasi&act=input'>
          <table width='100%' class='table2'>
          <tr><td>Transportasi</td><td> <input type=text class='form-control' name='transportasi' placeholder='Masukan Jenis Transportasi...' size=45 required /></td></tr>
          <tr><td></td><td><input type=submit name=submit value=Simpan class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'></td></tr>
          </table></form></div></div></div>";
     break;
  case "edittransportasi":
    $edit=mysql_query("SELECT * FROM transportasi WHERE id_transportasi='$_GET[id]'");
    $r=mysql_fetch_array($edit);
    echo "<h1>
	Master |
        <small>Data Transportasi</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'>Form Edit Transportasi</h3>
        </div>
        <div class='box-body'>
		<div align='center' class='table2'>          
		<form method=POST action=$aksi?module=transportasi&act=update>
          <input type=hidden name=id value='$r[id_transportasi]'>
		  <table width='100%' class='table2'>
          <tr><td>Transportasi</td><td> <input type=text name='transportasi' size=45 value='$r[transportasi]' required /></td></tr>
          <tr><td></td><td><input type=submit value=Update class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></td></tr>
          </table>
		  </form></div></div></div>";     
    break;  
}
?>
