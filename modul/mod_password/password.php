<style type="text/css">
#info {
	border:1px solid #E78686;padding:15px;background:#FFE1E1;width:95%;color:#D22E23;text-align:center;margin:10px;
}
</style>
<?php	
session_start();
	if ($_GET['aksi']=="ganti"){
		if ($_POST['passwordbaru']==$_POST['cpassword']) {
			$sql=mysql_query("SELECT * FROM admins WHERE level='$_SESSION[level]'");
			$r=mysql_fetch_array($sql);
			$passwordlama =$r['password'];
			$id=$r['id'];
			if ($_POST['passwordlama']==$passwordlama) {
				mysql_query("UPDATE admins SET password='$_POST[passwordbaru]' WHERE  id='$id'");
				echo "<div id=\"info\">Password Anda Berhasil Di UBah <b>$_POST[passwordbaru]</b></div>";
			}
			else{
				echo "<div id=\"info\">Password Lama Yang Anda Masukkan Tidak Ada Dalam Database</div>";	
			}
	}else{
			echo "<div id=\"info\">Proses Pergantian Password Tidak Berhasil, ulangi Kembali<br />
			 Anda Salah Memasukkan Password Pada \"Ulangi Password Baru\"</div>";
		}
	}
	
		echo "
		<div class='box box-solid box-success'>
        <div class='box-header'>
          <h3 class='box-title'><img src=images/editz.png width=27,5> &nbspForm Edit Password</h3>
        </div>
        <div class='box-body'>
		<div align='center'>
		<form name='form2' method='POST' action='?module=password&aksi=ganti' id='form2' onSubmit=\"return validasi2(this)\">
		<table width=340 align=\"center\">
		<tr><td>Masukkan Password Lama</td><td><input type='password' class='form-control' name='passwordlama' placeholder='Masukkan Password Lama...' ></td></tr>
		<tr><td>Masukkan Password Baru</td><td> <input type='password' class='form-control' name='passwordbaru' placeholder='Masukkan Password Baru...' id='passwordbaru'></td></tr>
		<tr><td>Ulangi Password Baru</td><td><input type='password' class='form-control' name='cpassword' placeholder='Ulangi Password Baru...' id='cpassword'></td></tr>
		<tr><td> 		</td><td> <input type='submit' name='ganti' value='Ganti!' class='btn btn-success'></td></tr>
		</table></form>
		</div></div></div>";
?>
<script>
function validasi2(form2){
  if (form2.passwordlama.value == ""){
    alert("Anda belum mengisikan Password Lama.");
    form2.passwordlama.focus();
    return (false);
  }
  if (form2.passwordbaru.value == ""){
    alert("Anda belum mengisikan Password Baru.");
    form2.passwordbaru.focus();
    return (false);
  }
  if (form2.cpassword.value == ""){
    alert("Ulangi Password Baru.");
    form2.cpassword.focus();
    return (false);
  }
  return (true);
}	
</script>
