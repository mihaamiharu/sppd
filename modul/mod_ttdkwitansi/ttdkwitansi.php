<?php
$aksi="modul/mod_ttdkwitansi/aksi_ttdkwitansi.php";

switch($_GET[act]){
  // Tampil Pegawai
  default:
      $tampil = mysql_query("SELECT * FROM ttdkwitansi");
  echo   "<h1>
        Setting |
        <small>Penanda tangan Kwitansi</small>
      </h1>";
    echo "<table id=\"datatables\" class=\"display\">
          <thead><tr><th>No</th><th>Kabag</th><th>Bendahara</th><th>PPTK</th><th>aksi</th></tr></thead>"; 
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[kabag]<br />
				  $r[nip_kabag]</td>
             <td>$r[bendahara]<br />
			 	 $r[nip_bendahara]</td>
		     <td>$r[pptk]<br />
				 $r[nip_pptk]</td>
             <td><a href=?module=ttdkwitansi&act=editttdkwitansi&id=$r[id]><img src=images/editz.png width=27,5 data-toggle='tooltip'title='Update'</a>
			 </a></td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  case "editttdkwitansi":
    $edit=mysql_query("SELECT * FROM ttdkwitansi WHERE id='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h1>
        Setting |
        <small>Penanda tangan Kwitansi</small>
      </h1>
	<fieldset>
	
          <form method=POST action=$aksi?module=ttdkwitansi&act=update>
          <input type=hidden name=id value='$r[id]'>
		  <table>
          <tr><td width=150>Kabag</td><td><input type=text name='kabag' value='$r[kabag]' size=45 required /></td></tr>
          <tr><td>Nip Kabag</td><td><input type=text name='nip_kabag' value='$r[nip_kabag]' size=30 required /></td></tr>
          <tr><td width=150>Bendahara</td><td><input type=text name='bendahara' value='$r[bendahara]' size=45 required /></td></tr>
          <tr><td>Nip Bendahara</td><td><input type=text name='nip_bendahara' value='$r[nip_bendahara]' size=30 required /></td></tr>
          <tr><td width=150>PPTK</td><td><input type=text name='pptk' value='$r[pptk]' size=45 required /></td></tr>
          <tr><td>Nip PPTK</td><td><input type=text name='nip_pptk' value='$r[nip_pptk]' size=30 required /></td></tr>
          <tr><td></td><td><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table>
		  </form></fieldset></div>";     
    break;  
}
?>
