<?php
error_reporting(0);
session_start();
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
$a="SELECT * FROM jual";
$b="SELECT inc FROM jual ORDER BY inc DESC LIMIT 1";
$inc=penambahan($a, $b);
if (isset($_POST['run'])and($_POST['run']=="form2"))
{
	$cekQty="SELECT * FROM stok WHERE barang_id='$_POST[pilih_barang]'";
	$qcekQty=mysql_query($cekQty);
	$dcekQty=mysql_fetch_array($qcekQty);
	if (!empty($_POST['qty']))
	{
		//ambil dari stok
		$buah="SELECT * FROM stok WHERE barang_id='$_POST[pilih_barang]'";
		$qbuah=mysql_query($buah);
		$dbuah=mysql_fetch_array($qbuah);
		$sisa_qty=$dbuah['qty']-$_POST['qty'];
		if ($sisa_qty >= 0)
		{
		//Ambil data diskon
		$brg="SELECT * FROM  barang WHERE barang_id='$_POST[pilih_barang]'";
        $dbrg=mysql_query($brg);
        $y=mysql_fetch_array($dbrg);
		
		
		
			//insert ke temp_jual_detail
			//$disc= ($_POST['diskon']/100)*$_POST['harga'];	
			$subtotal    =  $_POST['qty'];
			
        $cekKode=mysql_fetch_array(mysql_query("SELECT * FROM temp_jual_detail WHERE barang_id='$_POST[pilih_barang]'"));
        if ($cekKode>0){
          $xx=mysql_fetch_array(mysql_query("SELECT SUM(qty) AS totalQty FROM temp_jual_detail WHERE barang_id='$_POST[pilih_barang]'"));
          $qtyy=$xx['totalQty']+$_POST['qty'];
          $subtotalX=($_POST['harga']-$disc) * $qtyy;
          $sql="UPDATE temp_jual_detail SET qty='$qtyy' WHERE barang_id='$_POST[pilih_barang]'";
      mysql_query($sql);

      //update tabel stok
      $upstok="UPDATE stok SET qty='$sisa_qty' WHERE barang_id='$dbuah[barang_id]'";
      mysql_query($upstok);

        }
        else {
      $input="INSERT INTO temp_jual_detail(jual_id, barang_id, qty)
      VALUES('JL-$inc', '$dbuah[barang_id]', '$_POST[qty]')";
      mysql_query($input);
      //update tabel stok
      $upstok="UPDATE stok SET qty='$sisa_qty' WHERE barang_id='$dbuah[barang_id]'";
      mysql_query($upstok);
        }
		}
		else
		{
			echo "
			<script type=text/javascript>";
			echo "alert('Qty yang diambil melebihi stok')";
			echo "</script>";
		}
	}
}


                    $jml="SELECT SUM(qty) AS htotal FROM temp_jual_detail WHERE jual_id='JL-$inc'";
                    $qjml=mysql_query($jml);
                    $djml=mysql_fetch_array($qjml);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Pemakaian</title>

<style type="text/css">
#formID
{
	border:none;
	margin:0px;
	padding:0px;
}
#formID1
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


<link href="select-box-searching/select2.css" rel="stylesheet"/>
    <script src="select-box-searching/jquery-1.8.0.min.js"></script>
    <script src="select-box-searching/select2.js"></script>
    <script>
        $(document).ready(function() {
            $("#states").select2(); 
        });

         function diskon(){
            var disk = document.getElementById('disk');
            var totalBayar = document.getElementById('totalBayar');  

            total = totalBayar*disk/100;
            totalBayar = total;
          }
    </script>


<body>
<div id="page"> 
<a href="index.php?halaman=penjualan"><div id="keluar">Kembali</div></a>
<div class="header"><h1 style="float: left;">Transaksi Pemakaian</h1>
<h1 style="float: right; font-size:70px; padding:0px; margin:0px 80px 0px 0px;">Menu TR <?php echo $djml['btotal']; ?></h1>
</div>
<div class="halaman">
  <div class="tengah">
	<div class="batas_isi">
    <div class="isi">
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="proses.php">
            <input type="hidden" name="proses" id="proses" value="jual_insert" />
          <table border="0" cellspacing="1" cellpadding="0">
            <tr><input name="inc" type="hidden" value="<?php echo "$inc"; ?>" />
              <td id="noborder">No. Transaksi</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="jual_id" type="hidden" value="<?php echo "JL-$inc"; ?>" /><?php echo "JL-$inc"; ?></td>
            </tr>
            
            <tr>
              <td id="noborder">Tgl. Transaksi</td>
              <td id="noborder">:</td>
              <td id="noborder">
                <input type="text" name="tgl_jual" id="datepicker" readonly='true' value="<?php echo date(Y)."-".date(m)."-".date(d);?>" />
              </td><input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" />
            </tr>
            <tr>
              <td id="noborder">Pemakai</td>
              <td id="noborder">:</td>
              <td id="noborder"><select name="kar_nama" id="input">
                <?php
                $pel="SELECT * FROM karyawan ORDER BY inc ASC";
                $qpel=mysql_query($pel);
                while ($dtpel=mysql_fetch_array($qpel)){
              echo "
                <option value='$dtpel[kar_id]'>$dtpel[kar_nama]</option>";
                }
                ?>
              </select></td>
            </tr>
          </table>
        
        <!--tabel item barang -->
        <h3>Barang yg di Pakai :</h3>
        <table border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td id="namaField">ID</td>
            <td id="namaField">Nama Barang</td>
            <td id="namaField">Qty</td>
         <!--   <td id="namaField">Harga Satuan</td>
            <td id="namaField">Diskon</td>
            <td id="namaField">Harga Total</td>-->
            <td id="namaField">Menu</td>
          </tr>
          <?php
          $tmp="SELECT * FROM temp_jual_detail WHERE jual_id='JL-$inc'";
          $qtmp=mysql_query($tmp);
          while ($dtmp=mysql_fetch_array($qtmp))
          {
		   $brg="SELECT * FROM  barang WHERE barang_id='$dtmp[barang_id]'";
                    $dbrg=mysql_query($brg);
                    $y=mysql_fetch_array($dbrg);
			
          echo "
          <tr>
            <td>$dtmp[barang_id]</td>
            <td>$y[barang_nama]</td>
            <td>$dtmp[qty]</td>
            <td><a href=proses.php?proses=hapus_item_jual&id=$dtmp[barang_id]><div id=tombol>hapus</div></a></td>
          </tr>";
          }
          ?>
          <tr>
            <td id="namaField" colspan="1">&nbsp;</td>
            <td style="color:#FFF; border:none; background-color:#333" align="right">TotalQty:</td>
            <td style="color:#FFF; border:none; background-color:#333" align="right">
                <?php
                    echo digit($djml['htotal']);
                ?>
            </td>
            <td id="namaField"><input name="total" type="hidden" value="<?php echo $djml['htotal'] ?>" /></td>
          </tr>
        </table>
        <!--tabel pembayaran-->
        <table border="0" cellspacing="1" cellpadding="0">
          <!--<tr>
            <td id="noborder">Total Bayar</td>
            <td id="noborder">:</td>
            <td id="noborder"><label>
              <input type="text" name="jml_bayar_tampil" id="totalBayar" required='required' value="<?php echo $djml['htotal']; ?>" disabled='disabled'/>
              <input type="hidden" name="jml_bayar" id="input" required='required' value="<?php echo $djml['htotal'] ?>"/>
            </label></td>
          </tr>
		      <tr>
            <td id="noborder"> Biaya Kirim</td>
            <td id="noborder">:</td>
            <td id="noborder"><label>
              <input type="text" name="biaya_kirim" id="kirim" required='required' onkeypress="return isNumberKey(event)"/>
            </label></td>
          </tr>
         <tr>
            <td id="noborder">Uang Bayar</td>
            <td id="noborder">:</td>
            <td id="noborder"><label>
              <input type="text" name="bayar" id="uang_bayar" required='required' onkeyup="hitung();"/>
            </label></td>
          </tr>
          <tr>
            <td id="noborder">Uang Kembali</td>
            <td id="noborder">:</td>
            <td id="noborder"><label>
              <input type="text" name="biaya_kirim" id="uangKembali" required='required'  disabled />
            </label></td>
          </tr>-->
          <tr>
            <td id="noborder">&nbsp;</td>
            <td id="noborder">&nbsp;</td>
            <td id="noborder">
              <input type="submit" name="simpan" id="tombol" value="simpan" />
            </td>
          </tr>
        </table>
		
		
      </form>
    </td>
    <td valign="top">
      	<form id="formID" name="form2" method="post" action="">
        <input name="run" type="hidden" value="form2" />
        <table border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td id="namaField">Pilih Barang</td>
            <td id="namaField">Qty</td>
          <!--  <td id="namaField">Harga</td>
          <td id="namaField">Diskon</td>-->
            <td id="namaField">add</td>
          </tr>
          <tr>
            <td>
 <?php     
$result = mysql_query("select * from barang");  
$jsArray = "var prdName = new Array();\n";  
echo '<select autofocus style="width:200px" id="states" name="pilih_barang" onchange="document.getElementById(\'barang_harga\').value = prdName[this.value]">';  
echo '<option>-------</option>';  
while ($row = mysql_fetch_array($result)) { 
 
    echo '<option value="' . $row['barang_id'] . '">' . $row['barang_nama'] . '</option>'; 
	
    //$jsArray .= "prdName['" . $row['barang_id'] . "'] = '" . addslashes($row['harga_jual']) . "';\n";  
	
}  
echo '</select>';  

?>  
  			  	</td>
            <td>
              <input name="qty" type="text" id="input" required='required' size="5" onkeypress="return isNumberKey(event)" />
            </td>
         <!--   <td><label>
    			 <input name="harga" type="text" id="barang_harga" required='required' readonly='true' size="9" />
				  <script type='text/javascript'>    
    <?php echo $jsArray; ?>  
    </script> 
  			  </label></td>	
			     <td nowrap>
              <input name="diskon" type="text" id="input" required='required' size="5" onkeypress="return isNumberKey(event)" /> %
            </td>-->
			  
            <td>
              <input type="submit" name="add" id="tombol" value="add" />
            </td>
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
<!--<script type="text/javascript">
  function hitung() {
    var a = parseInt(document.getElementById('totalBayar').value);
    var b = parseInt(document.getElementById('uang_bayar').value);
    var d = document.getElementById('kirim').value;
    var e = (parseInt(a)+parseInt(d));
    var c = parseInt(b) - parseInt(e);
    document.getElementById('uangKembali').value = c;
  }
</script>-->
</body>
</html>