<?php
error_reporting(0);
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$a="SELECT * FROM beli";
$b="SELECT inc FROM beli ORDER BY inc DESC LIMIT 1";
$inc=penambahan($a, $b);
if (isset($_POST['proses'])and($_POST['proses']=="form2"))
{
	if (!empty($_POST['qty'])and(!empty($_POST['harga'])))
	{
  //CEK APAKAH BARANG SUDAH DI INPUT SEBELUMNYA
  $cekKode=mysql_fetch_array(mysql_query("SELECT * FROM temp_beli_detail WHERE barang_id='$_POST[pilih_barang]'"));
        if ($cekKode>0){
          $xx=mysql_fetch_array(mysql_query("SELECT SUM(qty) AS totalQty FROM temp_beli_detail WHERE barang_id='$_POST[pilih_barang]'"));
          $qtyy=$xx['totalQty']+$_POST['qty'];
          $subtotalX=$_POST['harga']* $qtyy;
          $sql="UPDATE temp_beli_detail SET qty='$qtyy', harga_total='$subtotalX' WHERE barang_id='$_POST[pilih_barang]'";
      mysql_query($sql);

        }
        else {
        $dBrG=mysql_fetch_array(mysql_query("SELECT * FROM barang WHERE barang_id='$_POST[pilih_barang]'"));
		//insert ke temp_beli_detail
		$harga_total=$_POST['qty']*$_POST['harga'];
		$input="INSERT INTO temp_beli_detail(beli_id, barang_id, qty, harga_satuan, harga_total)
		VALUES('BM-$inc', '$dBrG[barang_id]', '$_POST[qty]', '$_POST[harga]', '$harga_total')";
		mysql_query($input);
        }


		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Pembelian</title>   
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

<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
  <link id="base-style" href="css/style.css" rel="stylesheet">
  <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
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
<a href="index.php?halaman=barang_masuk"><div id="keluar" class="btn btn-warning">BACK</div></a>
<div class="header"><h1>Transaksi Barang Masuk</h1></div>
<div class="halaman">
  <div class="tengah">
	<div class="batas_isi">
    <div class="isi">

<table border="1" cellspacing="1" cellpadding="0" class="table table-hover">
  <tr>
    <td>
    	<form id="form1" name="form1" class="form-group" method="post" action="proses.php">
        <input name="proses" type="hidden" value="beli_insert" />
        <input name="inc" type="hidden" value="<?php echo "$inc"; ?>" />
			<table border="0" cellspacing="1" cellpadding="0">
  				<tr>
    				<td id="noborder">No. Transaksi</td>
    				<td id="noborder">:</td>
    				<td id="noborder"><?php echo "BM-$inc" ?><input name="beli_id" type="hidden" value="<?php echo "BM-$inc"; ?>" /></td>
  				</tr>
  				
  				<tr>
    				<td id="noborder">Tgl. Transaksi</td>
    				<td id="noborder">:</td>
    				<td id="noborder"><input name="tgl_trans" type="text" id="datepicker" readonly='true' value="<?php echo date(Y)."-".date(m)."-".date(d);?>" /></td>
  				</tr>
  				<tr>
    				<td id="noborder">Supplier</td>
    				<td id="noborder">:</td>
    				<td id="noborder">
    				<select name="pilih_supplier" id="input" class="form-control">
                    <?php
						$supplier="SELECT * FROM supplier ORDER BY supplier_nama ASC";
						$qsupplier=mysql_query($supplier);
						while($dsupplier=mysql_fetch_array($qsupplier))
						{
							echo "<option value='$dsupplier[supplier_id]'>$dsupplier[supplier_nama]</option>";
						}
					?>
    				</select><h3 style="color:red" >ATTENTION !!!</h3>
            <p style="background-color:Tomato; color: white; padding: 10px">"pengisian Supplier diisi terakhir dipilih setelah semua data terisi"  </p>
    				</td>
  				</tr>
  				
			</table>
            
            <table border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td id="noborder" colspan="8"><h3>Barang yang dibeli :</h3></td>
              </tr>
              <tr>
                <td id="namaField">ID</td>
                <td id="namaField">Nama Barang</td>
                <td id="namaField">Qty</td>
                <td id="namaField" type="number">Harga Satuan</td>
                <td id="namaField">Harga Total</td>
                <td style="background-color:#CCC">
				<?php echo "<a href=proses.php?proses=hapus_item_beli&status=all&id=BM-$inc ><div class=btn btn-danger id=tombol>Hapus Semua</div></a>"; ?>
                </td>
              </tr>
              <?php
			  	$rinci="SELECT * FROM temp_beli_detail WHERE beli_id='BM-$inc'";
				$qrinci=mysql_query($rinci);
				while($drinci=mysql_fetch_array($qrinci))
				{
        		$b=mysql_fetch_array(mysql_query("select * from barang where barang_id ='$drinci[barang_id]'"));
			  ?>
              <tr>
                <td><?php echo $drinci['barang_id']; ?></td>
                <td><?php echo $b['barang_nama']; ?></td>
                <td><?php echo $drinci['qty']; ?></td>
                <td align="right"><?php echo digit($drinci['harga_satuan']); ?></td>
                <td align="right"><?php echo digit($drinci['harga_total']); ?></td>
               <td><?php echo "<a href=proses.php?proses=hapus_item_beli&status=satu&id=$drinci[barang_id]><div id=tombol>Hapus</div></a>"; ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td style="color:#FFF; background-color:#333; border:none" colspan="4 align="right">Total :</td>
                <td style="color:#FFF; background-color:#333; border:none" align="right">
					<?php
						$sum="SELECT SUM(harga_total)AS total FROM temp_beli_detail WHERE beli_id='BM-$inc'";
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
                <td><input type="submit" class="btn btn-primary" name="simpan" id="tombol" value="simpan" /></td>
              </tr>
            </table>

		</form>
	</td>
    <td valign="top">
    	<form id="formID"  name="form2" method="post" action="form_beli.php">
        <input name="proses" type="hidden" value="form2" />
        <table border="0" cellspacing="1" cellpadding="0">
  			<tr>
    			<td>Nama Barang</td>
    			<td>Qty</td>
    			<td>Harga</td>
    			<td>Menu</td>
  			</tr>
  			<tr>
    			<td>
    			  <?php     
$result = mysql_query("select * from barang");  
$jsArray = "var prdName = new Array();\n";  
echo '<select style="width:200px" id="states" name="pilih_barang" required="required" onchange="document.getElementById(\'barang_harga\').value = prdName[this.value]">';  
echo '<option>-------</option>';  
while ($row = mysql_fetch_array($result)) {  
    echo '<option value="' . $row['barang_id'] . '">' . $row['barang_nama'] . '</option>'; 	
    $jsArray .= "prdName['" . $row['barang_id'] . "'] = '" . addslashes($row['harga_beli']) . "';\n";  
}  
echo '</select>';  
?>  
  			  	</td>
    			<td>
                <input type="text" name="qty" id="input" required='required' size="3" onkeypress="return isNumberKey(event)"/>
  			  	</td>
    			<td><label>
    			 <input name="harga" type="text" id="barang_harga" readonly='true' required='required' size="9" />
				  <script type='text/javascript'>    
    <?php echo $jsArray; ?>  
    </script> 
  			  </label></td>
   				<td><label>
   				  <input type="submit" class="btn btn-default" name="add" id="tombol" value="add" />
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