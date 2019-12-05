<?php
// memulai session
session_start();
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";


$username = anti_injection(md5($_POST['username']));
$password     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($password)){


  echo "<p>Login tidak dapat di-injeksi !</p><br/>
  <p><a class='tombol' href='index.php'><b>ULANGI LAGI</b></a></p>";
}


else{
// query untuk mendapatkan record dari username
$query = "SELECT * FROM account WHERE username = '$username'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);

// cek kesesuaian password

if (($username == $data['username'])and($password == $data['password']))
{

	// menyimpan username dan level ke dalam session
	
	$_SESSION['level'] = $data['level'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['nama'] = $data['nama'];
	
	// tampilkan menu
	lompat_ke("index.php");

}
else
{
	lompat_ke("form_login.php");
}

}

?>