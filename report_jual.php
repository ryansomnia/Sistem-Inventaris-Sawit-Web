<link href="css/style_doc.css" rel="stylesheet" type="text/css" />
<body onload="window.print();"> 
<?php
error_reporting(0);
session_start();
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
$day =date(d);
$month =date(M);
$mo =date(m);
$year =date(y);

if($_POST['berdasar'] == "Semua Data"){
//modus delete Semua Data
	$sql = "SELECT * FROM jual_detail ORDER BY jual_id ASC";
	$sum="SELECT SUM(qty)AS qty FROM jual_detail";
						$qsum=mysql_query($sum);
						$dsum=mysql_fetch_array($qsum);
						$qty=$dsum['qty'];
						
	$sumx="SELECT SUM(harga_total)AS total FROM jual_detail";
						$qsumx=mysql_query($sumx);
						$dsumx=mysql_fetch_array($qsumx);
						
}
else if ($_POST['berdasar'] == "Tanggal"){
	//modus tanggal
	$dari = $_POST['dari'];
	$ke = $_POST['ke'];

	$sql = "SELECT * FROM jual_detail, jual where jual_detail.jual_id = jual.jual_id  AND jual.tgl_jual >= '$dari' and jual.tgl_jual <= '$ke'";
	
	$sum="SELECT SUM(qty)AS qty FROM jual_detail, jual where jual_detail.jual_id = jual.jual_id  AND jual.tgl_jual >= '$dari' and jual.tgl_jual <= '$ke'";
						$qsum=mysql_query($sum);
						$dsum=mysql_fetch_array($qsum);
						$qty=$dsum['qty'];
						
	$sumx="SELECT SUM(harga_total)AS total FROM jual_detail, jual where jual_detail.jual_id = jual.jual_id  AND jual.tgl_jual >= '$dari' and jual.tgl_jual <= '$ke'";
						$qsumx=mysql_query($sumx);
						$dsumx=mysql_fetch_array($qsumx);
						$jual_detail=$dsumx['total'];				
	
	}

  else if($_POST['berdasar'] == "Pencarian Kata"){
  //modus berdasarkan kata
  $field = $_POST['field'];
  $kata = $_POST['kata'];

  $sql = "select a.jual_id,
                 a.tgl_jual,
                 a.kar_id,
                 a.total,
                 a.biaya_kirim,
                 b.barang_id,
                 b.qty,

        from jual a
        inner join jual_detail b using(jual_id)
        where $field like '%$kata%'";
        
        //Pisahkan Field dari Select BOX Form Laptran_jual
        $field2 =explode('.', $field);
        $filed3=$field2[1];

        $sum="SELECT SUM(qty)AS qty FROM jual_detail, jual where jual_detail.jual_id = jual.jual_id  AND $filed3 like '%$kata%'";
            $qsum=mysql_query($sum);
            $dsum=mysql_fetch_array($qsum);
            $qty=$dsum['qty'];
            
  $sumx="SELECT SUM(harga_total)AS total FROM jual_detail, jual where jual_detail.jual_id = jual.jual_id  AND $filed3 like '%$kata%'";
            $qsumx=mysql_query($sumx);
            $dsumx=mysql_fetch_array($qsumx);
            $jual_detail=$dsumx['total'];   
    
  }

$query = mysql_query($sql);
$idn=mysql_fetch_array(mysql_query("SELECT * FROM identitas WHERE id_identitas='1'"));
echo"<table width='70%' border='0'>
<tr>
    <td colspan='3' align=center><b>REKAPITULASI TRANSAKSI PENJUALAN BARANG</b></td>
  </tr  
</table>
<table width='100%' border='0'>
<tr>
    <th align='left' width='108' scope='row'>Nama Cabang &nbsp;&nbsp;&nbsp;&nbsp; : ".strtoupper($idn['nama_identitas'])."</th>
    <th align='left' width='85'>Periode &nbsp;&nbsp;&nbsp;&nbsp; : $day/$mo/$year</th>
 
  </tr>
<tr>
    <th align='left' width='108' scope='row'>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ".strtoupper($idn['alamat'])."</th>
    <th align='left' width='85'>Petugas  &nbsp; &nbsp;&nbsp;&nbsp;: $_SESSION[nama]</th>
	
  </tr>
  
  <tr>
    <th align='left' width='108' scope='row'></th>
   
  </tr>
  
</table>
";
?>
	
							 
						
<br/>
 <table width='80%' border='1'>
							  <thead>
								  <tr>
									  <th>Tanggal</th>
									  <th><center>No. Transaksi</center></th>
									  <th><center>Nama Pemakai</center></th>
									  <th>Nama Barang</th>
									  <th>Quantity</th>
									  <!--<th>Harga jual</th>
									  <th>Diskon</th>
									  <th>Total</th>-->
                    
									 
									  							  
								  </tr>
							  </thead>   
							  <tbody>
							   <?php
			  	
				 while ($d = mysql_fetch_array($query)){
				
				//$umurqty=$d[umur]*$d[qty];
				$e=mysql_fetch_array(mysql_query("select * from jual where jual_id ='$d[jual_id]'"));
				$f=mysql_fetch_array(mysql_query("select * from barang where barang_id ='$d[barang_id]'"));
				$z=mysql_fetch_array(mysql_query("select * from karyawan WHERE kar_id='$e[kar_id]'"));
			  ?>
				<tr>
                <td><center><?php echo $e['tgl_jual']; ?></center></td>
                <td><center><?php echo "$d[jual_id]"; ?></center></td>
                <td><?php echo "$z[kar_nama]"; ?></td>
                <td><?php echo "$d[barang_id]"; ?> - <?php echo "$f[barang_nama]"; ?></td>
                <td align="right"><center><?php echo digit($d['qty']); ?></td>
               <!-- <td align="right"><?php echo digit($d['harga_satuan']); ?></td>
                <td align="right"><center><?php echo digit($d['diskon']); ?></center></td>
                <td align="right"><?php echo digit($d['harga_total']); ?></td>-->
               
                </tr>
			   <?php } ?>
			    <tr>
				<td style="color:#FFF; background-color:#C0C0C0; border:none" colspan="2" align="left">Total</td>
                <td colspan="1" style="color:#FFF; background-color:#C0C0C0; border:none" align="right"></td>
                <td style="color:#FFF; background-color:#C0C0C0; border:none" align="right"></td>
                <td style="color:#FFF; background-color:#C0C0C0; border:none"><center>
				<?php
						
						echo digit($dsum['qty']);
				?>
				</center></td>
               <!-- <td style="color:#FFF; background-color:#C0C0C0; border:none" align="right"></td>
                 <td style="color:#FFF; background-color:#C0C0C0; border:none" align="right">
				
				</td>-->
               <!-- <td style="color:#FFF; background-color:#C0C0C0; border:none" align="right">
				<?php
						
						echo digit($dsumx['total']);
						
				?>
				</td>-->
                 
                
				
              </tr>
			  

								                                  
							  </tbody>
				
				
							  
						 </table> 
<br/>
<br/>
<br/>
<table width='80%' border='0'>
  <tr>
    <th width='201' scope='col'>Issued By</th>
    <th width='202' scope='col'>Verified By</th>
    <th width='218' scope='col'>Approved By</th>
    
  </tr>
   <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr><tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr><tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  </tr>
   <tr>
    <th width='201' scope='col'>(<?php echo $_SESSION['nama']; ?>)</th>
    <th width='202' scope='col'>(----------------------------) </th>
    <th width='218' scope='col'>(----------------------------)</th>
    
  </tr>
  
</table>
			</body> 			 
						 
							 