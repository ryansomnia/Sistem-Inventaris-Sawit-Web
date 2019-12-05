<?php
error_reporting(0);
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$a="SELECT * FROM hasil";
$b="SELECT inc FROM hasil ORDER BY inc DESC LIMIT 1";
$inc=penambahan($a, $b);
if (isset($_POST['proses'])and($_POST['proses']=="form2"))
{
	if (!empty($_POST['qty'])and(!empty($_POST['harga'])))
	{
  //CEK APAKAH BARANG SUDAH DI INPUT SEBELUMNYA
  $cekKode=mysql_fetch_array(mysql_query("SELECT * FROM temp_hasil_detail WHERE panen_id='$_POST[pilih_barang]'"));
        if ($cekKode>0){
          $xx=mysql_fetch_array(mysql_query("SELECT SUM(qty) AS totalQty FROM temp_hasil_detail WHERE panen_id='$_POST[pilih_barang]'"));
          $qtyy=$xx['totalQty']+$_POST['qty'];
          $subtotalX=$_POST['harga']* $qtyy;
          $sql="UPDATE temp_hasil_detail SET qty='$qtyy', harga_total='$subtotalX' WHERE panen_id='$_POST[pilih_barang]'";
      mysql_query($sql);

        }
        else {
        $dBrG=mysql_fetch_array(mysql_query("SELECT * FROM panen WHERE panen_id='$_POST[pilih_barang]'"));
		//insert ke temp_beli_detail
		$harga_total=$_POST['qty']*$_POST['harga'];
		$input="INSERT INTO temp_hasil_detail(hasil_id, panen_id, qty, harga_satuan, harga_total)
		VALUES('PM-$inc', '$dBrG[panen_id]', '$_POST[qty]', '$_POST[harga]', '$harga_total')";
		mysql_query($input);
        }


		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Panen</title>   
<style type="text/css">
#formID
{
  border:none;
  margin:0px;
  padding:0px;
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
body {
  color:#315567;
  background-color:#e9e9e9;
  
}

#noborder
{
  border:none;
}
</style>
<link href="select-box-searching/select2.css" rel="stylesheet"/>
    <script src="select-box-searching/jquery-1.8.0.min.js"></script>
    <script src="select-box-searching/select2.js"></script>
    <script>
        $(document).ready(function() {
            $("#states").select2();   
        });
    </script>
<script language=Javascript>
function isNumberKey(evt)
//Membuat validasi hanya untuk input angka menggunakan kode javascript
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;
return true;
}
</script>
</head>

<body>
<div id="page"> 
<a href="index.php?halaman=panen_masuk"><div id="keluar">Kembali</div></a>
<div class="header"><h1>Transaksi Panen Masuk</h1></div>
<div class="halaman">
  <div class="tengah">
	<div class="batas_isi">
    <div class="isi">

<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>
    	<form id="form1" name="form1" method="post" action="proses.php">
        <input name="proses" type="hidden" value="hasil_insert" />
        <input name="inc" type="hidden" value="<?php echo "$inc"; ?>" />
			<table border="0" cellspacing="1" cellpadding="0">
  				<tr>
    				<td id="noborder">No. Transaksi</td>
    				<td id="noborder">:</td>
    				<td id="noborder"><?php echo "PM-$inc" ?><input name="hasil_id" type="hidden" value="<?php echo "PM-$inc"; ?>" /></td>
  				</tr>
  				
  				<tr>
    				<td id="noborder">Tgl. Transaksi</td>
    				<td id="noborder">:</td>
    				<td id="noborder"><input name="tgl_trans" type="text" id="datepicker" readonly='true' value="<?php echo date(Y)."-".date(m)."-".date(d);?>" /></td>
  				</tr>
  				<tr>
    				<td id="noborder">Karyawan</td>
    				<td id="noborder">:</td>
    				<td id="noborder">
    				<select name="pilih_karyawan" id="input">
                    <?php
						$supplier="SELECT * FROM karyawan ORDER BY kar_nama ASC";
						$qsupplier=mysql_query($supplier);
						while($dkar=mysql_fetch_array($qsupplier))
						{
							echo "<option value='$dkar[kar_id]'>$dkar[kar_nama]</option>";
						}
					?>
    				</select>
    				</td>
  				</tr>
  				
			</table>
            
            <table border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td id="noborder" colspan="8"><h3>Panen yang dihasilkan :</h3></td>
              </tr>
              <tr>
                <td id="namaField">ID</td>
                <td id="namaField">Nama Panen</td>
                <td id="namaField">Qty</td>
                <td id="namaField">Harga Satuan</td>
                <td id="namaField">Harga Total</td>
                <td style="background-color:#CCC">
				<?php echo "<a href=proses.php?proses=hapus_item_hasil&status=all&id=PM-$inc><div id=tombol>Hapus Semua</div></a>"; ?>
                </td>
              </tr>
              <?php
			  	$rinci="SELECT * FROM temp_hasil_detail WHERE hasil_id='PM-$inc'";
				$qrinci=mysql_query($rinci);
				while($drinci=mysql_fetch_array($qrinci))
				{
        		$b=mysql_fetch_array(mysql_query("select * from panen where panen_id ='$drinci[panen_id]'"));
			  ?>
              <tr>
                <td><?php echo $drinci['panen_id']; ?></td>
                <td><?php echo $b['panen_nama']; ?></td>
                <td><?php echo $drinci['qty']; ?></td>
                <td align="right"><?php echo digit($drinci['harga_satuan']); ?></td>
                <td align="right"><?php echo digit($drinci['harga_total']); ?></td>
               <td><?php echo "<a href=proses.php?proses=hapus_item_hasil&status=satu&id=$drinci[panen_id]><div id=tombol>Hapus</div></a>"; ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td style="color:#FFF; background-color:#333; border:none" colspan="4 align="right">Total :</td>
                <td style="color:#FFF; background-color:#333; border:none" align="right">
					<?php
						$sum="SELECT SUM(harga_total)AS total FROM temp_hasil_detail WHERE hasil_id='PM-$inc'";
						$qsum=mysql_query($sum);
						$dsum=mysql_fetch_array($qsum);
						echo digit($dsum['total']);
					?>
                </td>
                <td style="color:#FFF; background-color:#333; border:none">&nbsp;</td>
              </tr>
            </table>

            <table border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td><input type="submit" name="simpan" id="tombol" value="simpan" /></td>
              </tr>
            </table>

		</form>
	</td>
    <td valign="top">
    	<form id="formID"  name="form2" method="post" action="form_hasil.php">
        <input name="proses" type="hidden" value="form2" />
        <table border="0" cellspacing="1" cellpadding="0">
  			<tr>
    			<td>Nama Panen</td>
    			<td>Qty</td>
    			<td>Harga</td>
    			<td>Menu</td>
  			</tr>
  			<tr>
    			<td>
    			  <?php     
$result = mysql_query("select * from panen");  
$jsArray = "var prdName = new Array();\n";  
echo 'Kode Produk : <select style="width:200px" id="states" name="pilih_barang" required="required" onchange="document.getElementById(\'panen_harga\').value = prdName[this.value]">';  
echo '<option>-------</option>';  
while ($row = mysql_fetch_array($result)) {  
    echo '<option value="' . $row['panen_id'] . '">' . $row['panen_nama'] . '</option>'; 	
    $jsArray .= "prdName['" . $row['panen_id'] . "'] = '" . addslashes($row['harga_beli']) . "';\n";  
}  
echo '</select>';  
?>  
  			  	</td>
    			<td>
                <input type="text" name="qty" id="input" required='required' size="3" onkeypress="return isNumberKey(event)"/>
  			  	</td>
    			<td><label>
    			 <input name="harga" type="text" id="panen_harga" readonly='true' required='required' size="9" />
				  <script type='text/javascript'>    
    <?php echo $jsArray; ?>  
    </script> 
  			  </label></td>
   				<td><label>
   				  <input type="submit" name="add" id="tombol" value="add" />
			    </label></td>
  			</tr>
			</table>
	  </form>
    </td>
  </tr>
</table>
		</div>
    </div>
    </div>  
  </div>
</div>
</body>
</html>