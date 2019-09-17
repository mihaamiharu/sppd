<?php
$aksi="modul/mod_biaya/aksi_biaya.php";

switch($_GET[act]){
  // Tampil biaya
  default:
      $tampil = mysql_query("SELECT * FROM biaya,golongan WHERE biaya.id_golongan=golongan.id_golongan ");
  echo   "<h1>
        Master |
        <small>Biaya Perjalanan Dinas</small>
      </h1>
          <input type=button value='Tambah Data ' class='btn btn-success'
          onclick=\"window.location.href='?module=biaya&act=tambahbiaya';\"><br /><br />";
    echo "
    <table id=\"example1\" class=\"table table-bordered table-hover\">
          <thead><tr><th>No</th><th>Tujuan</th><th>Golongan</th><th>Lumpsum</th><th>Penginapan</th><th>Transportasi</th><th>aksi</th></tr></thead>"; 
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
	$value =explode('-',$r['id_tujuan']);
       echo "<tr><td>$no</td>
             <td>";
	$nomer= 0;
	for($i=0;$i<count($value);$i++) { 
	$data=$value[$i];
	$nomer++;
	   $sql=mysql_query("SELECT * FROM tujuan WHERE id_tujuan='$data'");
	   $t=mysql_fetch_array($sql);
	   echo "$t[tujuan]<br/> ";
	}
	   echo "</td>
             <td>$r[golongan]</td>
             <td>$r[lumpsum]</td>
		     <td>$r[penginapan]</td>
		     <td>$r[transportasi]</td>
             <td><a href=?module=biaya&act=editbiaya&id=$r[id_biaya]><img src=images/editz.png width=30 data-toggle='tooltip'title='Update'</a>
			 <a href=$aksi?module=biaya&act=hapus&id=$r[id_biaya] onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src=images/traz.png width=30px data-toggle='tooltip'title='Hapus'</a></a></td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  case "tambahbiaya":
    echo "
	 <h1>
        Master |
        <small>Biaya Perjalanan Dinas</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/tambah.png width=30px>Form Tambah Biaya Perjalanan Dinas</h3>
        </div>
        <div class='box-body'>
		<div align='center'>
          <form method=POST action='$aksi?module=biaya&act=input'>
		  <table width='100%'>
		  <tr align='center'><th>Pilih Kota Tujuan</th><th>Isi Data Berikut</th></tr>
		  <tr>
		  <td valign='top' style='padding-left:4px'>";
		  $sql=mysql_query("SELECT * FROM tujuan");
		  while($r=mysql_fetch_array($sql)) {
		  echo "<input type='checkbox' name='id_tujuan[]' value='$r[id_tujuan]'> $r[tujuan]<br/>";  
		  }
	echo  "</td>
	<td>   <div align='center'>
          <table width='90%' class='table2'>
		  <tr><td>Golongan</td><td> <select name='id_golongan'>
			  <option value=0 selected>Pilih Kategori</option>";
			   $tampil=mysql_query("SELECT * FROM golongan");
			   while($r=mysql_fetch_array($tampil)){
			   echo "<option value=$r[id_golongan]>$r[golongan]</option></p>"; }
   echo "</select>";	
 echo "   <tr><td>Lumpsum</td><td> <input type=text class='form-control' name='lumpsum' placeholder='Masukan Biaya Lumpsum...' size=45 required /></td></tr>
          <tr><td>Penginapan</td><td> <input type=text class='form-control' name='penginapan' placeholder='Masukan Biaya Penginapan...' size=30 required /></td></tr>
          <tr><td>Transportasi</td><td> <input type=text class='form-control' name='transportasi' placeholder='Masukan Biaya Transportasi...' size=45 required /></td></tr>
          <tr><td></td><td><input type=submit name=submit value=Simpan  class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back()  class='btn btn-danger'></td></tr>
          </table></div>
		  </td></tr></table></form></div></div></div>";
     break;
  case "editbiaya":
    $edit=mysql_query("SELECT * FROM biaya WHERE id_biaya='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "
	<h1>
        Master |
        <small>Biaya Perjalanan Dinas</small>
      </h1>
       <div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/editz.png width=31px>&nbspForm Edit Biaya Perjalanan Dinas</h3>
        </div>
        <div class='box-body'>
		<div align='center'>
          <form method=POST action=$aksi?module=biaya&act=update>
          <input type=hidden name=id value='$r[id_biaya]'>
		  <table width='100%'>
		  <tr align='center'><th>Pilih Kota Tujuan</th><th>Isi Data Berikut</th></tr>
		  <tr>
		  <tr><td valign='top' style='padding-left:4px'>";
			  $id2=explode("-",$r['id_tujuan']);
			  echo "$data<br>";
			  $tam1=mysql_query("SELECT * FROM tujuan");
			  while ($k=mysql_fetch_array($tam1)) {
				  $selected = "";
				  if (in_array($k['id_tujuan'],$id2)) {
					  $selected = "checked='checked'";
		 		 echo "<input type='checkbox' name='id_tujuan[]' value='$k[id_tujuan]' $selected> $k[tujuan]<br/>";
				  }else{
		 		 echo "<input type='checkbox' name='id_tujuan[]' value='$k[id_tujuan]'> $k[tujuan]<br/>";
				}

			  }	
	echo  "</td>
	<td>
		  <table width='100%' class='table2'>
		  <tr><td>Golongan</td><td><select name='id_golongan'>";
		  $tampil=mysql_query("SELECT * FROM golongan");
		   if ($r[id_golongan]==0){
		   echo "<option value=0 selected>- Pilih Kategori -</option>"; }   
		
		   while($w=mysql_fetch_array($tampil)){
		   if ($r[id_golongan]==$w[id_golongan]){
		   echo "<option value=$w[id_golongan] selected>$w[golongan]</option>";}
		   else{
		   echo "<option value=$w[id_golongan]>$w[golongan]</option> </p> ";}}
		
		   echo "</select>";	
echo "    <tr><td>Lumpsum</td><td> <input type=text name='lumpsum' value='$r[lumpsum]' size=45></td></tr>
          <tr><td>Penginapan</td><td> <input type=text name='penginapan' value='$r[penginapan]' size=30></td></tr>
          <tr><td>Transportasi</td><td> <input type=text name='transportasi' value='$r[transportasi]' size=45></td></tr>
          <tr><td></td><td><input type=submit value=Update class='btn btn-success'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'></td></tr>
          </table>
		  </td></tr></table></form></div></div></div>";     
    break;  
}
?>
