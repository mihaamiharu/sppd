<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "p_sppd.v3";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
