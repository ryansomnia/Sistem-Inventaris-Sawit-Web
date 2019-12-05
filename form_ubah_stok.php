<?php
if ($_SESSION['level'] == "admin")
	{
$sql="SELECT * FROM stok WHERE barang_id='$_GET[id]'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
 $b=mysql_fetch_array(mysql_query("SELECT * FROM barang WHERE barang_id='$data[barang_id]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
td
{
	padding:5px 9px;
	border:none;
}
</style>
</head>

<body>
<div id="judulHalaman"><strong>Form ubah data stok</strong></div>
<form id="form1" name="form1" method="post" action="proses.php">
<input name="proses" type="hidden" value="ubah_stok" />
  <table width="0" border="0" cellpadding="0" cellspacing="1">
    <tr>
      <td>ID Barang</td>
      <td>:</td>
      <td><input name="barang_id" type="hidden" value="<?php echo $data['barang_id']; ?>" /><?php echo $data['barang_id']; ?></td>
    </tr>
    <tr>
      <td>Nama Barang</td>
      <td>:</td>
      <td><?php echo $data['barang_nama']; ?></td>
    </tr>
    
    <tr>
      <td>Qty</td>
      <td>:</td>
      <td><label>
        <input name="qty" type="text" id="input" size="9" value="<?php echo $data['qty']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Satuan</td>
      <td>:</td>
      <td><?php echo $b['barang_kategori']; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="simpan" id="tombol" value="simpan" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
	}
	else
	{
		echo "anda tidak berhak meng-akses halaman ini !";
	}
?>