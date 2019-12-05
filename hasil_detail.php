<?php
error_reporting(0);
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style/style_index.css" type="text/css">
<style type="text/css">
#noBorder
{
	border:none;	
}
table
{
	margin:5px 9px;
}
td
{
	padding:5px 9px;
	border:1px solid #c0d3e2;
}
#namaField{
	color:#FFF;
	background-color:#333;
	text-align:center;
	padding-top:7px;
	border:none;
}
</style>

</head>

<body>
  <a href="index.php?halaman=panen_masuk"><div id="Keluar">Kembali</div></a>
<?php
	$warna1="#c0d3e2";
	$warna2="#cfdde7";
	$warna=$warna1;

	$hasil="SELECT * FROM hasil WHERE hasil_id='$_GET[id]' order by inc asc";
	$qhasil=mysql_query($hasil);
	$data=mysql_fetch_array($qhasil);
	$z=mysql_fetch_array(mysql_query("SELECT * FROM karyawan WHERE kar_id='$data[kar_id]'"));

?>
<table cellspacing="0" cellpadding="0">
  <tr>
    <td id="noBorder">No. Transaksi</td>
    <td id="noBorder">:</td>
    <td id="noBorder"><?php echo "$data[hasil_id]"; ?></td>
  </tr>
 
  <tr>
    <td id="noBorder">Tgl Transaksi</td>
    <td id="noBorder">:</td>
    <td id="noBorder"><?php echo "$data[tgl_trans]"; ?></td>
  </tr>
  <tr>
    <td id="noBorder">Nama Karyawan</td>
    <td id="noBorder">:</td>
    <td id="noBorder"><?php echo "$z[kar_nama]"; ?></td>
  </tr>
 
</table>
    <table cellspacing="1" cellpadding="0">
      <tr>
        <td id="namaField">Kode Panen</td>
        <td id="namaField">Nama Panen</td>
        <td id="namaField">Qty</td>
        <td id="namaField">Harga satuan</td>
        <td id="namaField">Harga total</td>
      </tr>
      <?php 
		$pesan="SELECT * FROM hasil_detail WHERE hasil_id='$_GET[id]'";
		$query=mysql_query($pesan);
		while($row=mysql_fetch_array($query)){
      $b=mysql_fetch_array(mysql_query("SELECT * FROM panen WHERE panen_id='$row[panen_id]'"));
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
		?>
      <tr bgcolor=<?php echo $warna; ?>>
        <td><?php echo "$row[panen_id]"; ?></td>
        <td><?php echo "$b[panen_nama]"; ?></td>
        <td><?php echo "$row[qty]"; ?></td>
        <td align="right"><?php echo digit($row['harga_satuan']);?></td>
        <td align="right"><?php echo digit($row['harga_total']); ?></td>
      </tr>
      <?php } ?>
      <tr>
        <td style="color:#FFF; background-color:#333; border:none" colspan="2" align="right">Total Qty :</td>
        <td style="color:#FFF; background-color:#333; border:none">
        	<?php
				$sumQty="SELECT SUM(qty) AS totalQty FROM hasil_detail WHERE hasil_id='$_GET[id]'";
				$qsumQty=mysql_query($sumQty);
				$dsumQty=mysql_fetch_array($qsumQty);
				echo $dsumQty['totalQty'];
			?>
        </td>
        <td style="color:#FFF; background-color:#333; border:none" align="right">Total =</td>
        <td style="color:#FFF; background-color:#333; border:none" align="right"><?php echo "Rp "; echo digit($data['total']); ?></td>
      </tr>
      <tr>
      	<td style="color:#FFF; background-color:#333; border:none" colspan="4" align="right">Total keseluruhan=</td>
        <td style="color:#FFF; background-color:#333; border:none" align="right"><?php $alltotal=$data['total']+$data['biaya_kirim'];
	echo "Rp ";
	echo digit($alltotal); ?></td>
      </tr>
    </table>
</body>
</html>