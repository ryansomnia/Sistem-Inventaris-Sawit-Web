<?php
error_reporting(0);
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
$idn=mysql_fetch_array(mysql_query("SELECT * FROM identitas WHERE id_identitas='1'"));
?>
<link href="css/styles_cetak.css" rel="stylesheet" type="text/css">
<body onload="window.print();"> 
<table cellspacing="0" cellpadding="0">
 <tr>
 <td><center><?php echo"".strtoupper($idn['nama_identitas'])."";?></center></td>
 </tr>
 <tr>
 <td><center><?php echo"".strtoupper($idn['keterangan'])."";?></center></td>
 </tr>
 
 <tr>
 <td><center><?php echo"".strtoupper($idn['alamat'])."";?></center> </td>
 </tr>
 
 
 <tr>
 <td></center>----------------------------------------------------------------------------------</center></td>
 </tr>
 <?php
	$jual="SELECT * FROM keluar WHERE keluar_id='$_GET[id]' order by inc asc";
	$qjual=mysql_query($jual);
	$data=mysql_fetch_array($qjual);
  $z=mysql_fetch_array(mysql_query("SELECT * FROM pelanggan WHERE pelanggan_id='$data[pelanggan_id]'"));
  $q=mysql_fetch_array(mysql_query("SELECT * FROM karyawan WHERE kar_id='$data[kar_id]'"));
?>
?>
 <tr>
    <td>NO. SPB : <?php echo "$data[spb]"; ?></td>
  </tr>
 <tr>
 <tr>
    <td>NO. Polisi : <?php echo "$data[nopol]"; ?></td>
  </tr>
   <tr>
    <td>Nama Karyawan : <?php echo "$q[kar_nama]"; ?></td>
  </tr>
   <tr>
    <td>Nama Pembeli : <?php echo "$z[pelanggan_nama]"; ?></td>
  </tr>
 <tr>
    <td><?php echo "$data[no_nota]"; ?>*******</td>
  </tr>
</table>

<table  cellpadding="0" cellspacing="0">
<?php 
		$pesan="SELECT * FROM keluar_detail WHERE keluar_id='$_GET[id]'";
		$query=mysql_query($pesan);
		
		while($row=mysql_fetch_array($query)){
	$b=mysql_fetch_array(mysql_query("SELECT * FROM panen WHERE panen_id='$row[panen_id]'"));
		?>
		

      <tr>
        <td style="border-bottom: 1px dotted #000; " width="78"><?php echo "$row[panen_id]"; ?></td>
        <td style="border-bottom: 1px dotted #000; " width="193"><?php echo "$b[panen_nama]"; ?></td>
        <td style="border-bottom: 1px dotted #000; " width="22"><?php echo "$row[bruto]"; ?></td>
        <td style="border-bottom: 1px dotted #000; ">
        <td style="border-bottom: 1px dotted #000; " width="400" align="center"><?php echo "$row[tarra]"; ?></td>
        <td style="border-bottom: 1px dotted #000; " width="200"><?php echo "$row[qty]"; ?></td>
        <td style="border-bottom: 1px dotted #000; " width="36"><?php echo "$row[satuan]"; ?></td>
        <td style="border-bottom: 1px dotted #000; " width="25" align="right"><?php echo digit($row['harga_satuan']);?></td>
        <!--<td style="border-bottom: 1px dotted #000; " width="108" align="right">Disc:<?php echo digit($row['diskon']);?>%</td>-->
        <td style="border-bottom: 1px dotted #000; " width="239" align="right"><?php echo digit($row['harga_total']); ?></td>
      </tr>
      <?php } ?>
	  
      <tr>
	  
        <td style="border-bottom: 1px dotted #000; " height="42" colspan="5" align="center">Total Qty :</td>
       
        <td style="border-bottom: 1px dotted #000; ">
        	<?php
				$sumQty="SELECT SUM(qty) AS totalQty FROM keluar_detail WHERE keluar_id='$_GET[id]'";
				$qsumQty=mysql_query($sumQty);
				$dsumQty=mysql_fetch_array($qsumQty);
				echo $dsumQty['totalQty'];
			?>
        </td>
         <td style="border-bottom: 1px dotted #000; "><?php echo $dsumQty['satuan'];?></td>
        <td style="border-bottom: 1px dotted #000; " colspan="1" align="right">Total=</td>
        <td align="right" style="border-bottom: 1px dotted #000; ">
        	<?php
				$jual="SELECT * FROM keluar WHERE keluar_id='$_GET[id]'";
        $qjual=mysql_query($jual);
        $djual=mysql_fetch_array($qjual);
        echo "Rp ".digit($djual['total']);
        
        $grand_total=$djual['total']+$djual['biaya_kirim'];
			?>
        </td>
      </tr>
       <tr>
        <td height="44" colspan="8" align="right" style="border-bottom: 1px dotted #000; ">Ongkos Kirim =</td>
        <td style="border-bottom: 1px dotted #000; " align="right"><?php echo "Rp ".digit($djual['biaya_kirim']); ?></td>
      </tr>
      <tr>
      	<td height="44" colspan="8" align="right" style="border-bottom: 1px dotted #000; ">Grand Total (total + Ongkos Kirim) =</td>
        <td style="border-bottom: 1px dotted #000; " align="right"><?php echo "Rp ".digit($grand_total); ?></td>
      </tr>
      
    </table>
	
	<table cellspacing="0" cellpadding="0">
 <tr>
 <td></center>----------------------------------------------------------------------------------</center></td>
 </tr>
 <tr>
 <td><center>TERIMAKASIH PELANGGAN SETIA</center></td>
 </tr>
 <tr>
 <td><center>KAMI SENANTIASA SIAP MELAYANI ANDA</center></td>
 </tr>
 <tr>
 <td></center>******************************************************</center></td>
 </tr>
 <tr>
 <td><center>SARAN DAN KRITIK HUBUNGI <?php echo"".strtoupper($idn['telp'])."";?></center> </td>
 </tr>
 
 <tr>
 <td></center>******************************************************</center></td>
 </tr>
 <tr>
 <td><center><?php echo"".strtoupper($idn['nama_identitas'])."";?></center></td>
 </tr>
 <tr>
 <td><center><?php echo "$data[tgl_jual]"; ?></center></td>
 </tr>
 
</table>

       </body> 