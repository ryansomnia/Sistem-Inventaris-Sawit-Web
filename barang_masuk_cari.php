<?php
	if ($_SESSION['level'] == "admin")
	{
?>
   
   <a href='index.php?halaman=barang_masuk' class='btn btn-small btn-danger'>
   <span>Kembali </span>
   </a>
   <br/>
   <br/>
 <h1>Data Barang Masuk:</h1>
					
					<div class="priority low"><span><?php echo "tanggal ".$_POST['tgl_awal']." sampai dengan ".$_POST['tgl_akhir'];?></span></div>  

    <br/>

<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Combined All Table</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
						  <thead>
							  <tr>
	<th>No</th>						  
	<th>No.Trans</th>
    <th>Tgl. Trans</th>
    <th>Nama Supplier</th>
    <th>Total Harga</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
							<?php
		$pesan="SELECT * FROM beli WHERE tgl_trans BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
		$query=mysql_query($pesan);
		$no=1;
		while($row=mysql_fetch_array($query)){ 
		$z=mysql_fetch_array(mysql_query("SELECT * FROM supplier WHERE supplier_id='$row[supplier_id]'"));
		?>
		
		
		<td><?php echo "$no"; ?></td>
           <td><a href="#" onclick="javascript:wincal=window.open('beli_detail.php?id=<?php echo $row['beli_id']; ?>','Lihat Data','width=790,height=400,scrollbars=1');">
    <?php echo $row['beli_id']; ?></a></td>
    <td><?php echo "$row[tgl_trans]"; ?></td>
    <td><?php echo "$z[supplier_nama]"; ?></td>
    <td align="right">Rp. <?php echo digit($row['total']); ?></td>
								
							</tr>
							<?php $no++;}?>
							<?php 
  
	$sum2="SELECT SUM(total) AS total_harga FROM beli WHERE tgl_trans BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
	$qsum2=mysql_query($sum2);
	$dsum2=mysql_fetch_array($qsum2);
  ?>
  
  <tr>
    <td style="color:#FFF; background-color:#333; border:none;" colspan="4" align="right" id="tabel_judul">Total :</td>
    <td style="color:#FFF; background-color:#333; border:none;" align="right"><?php echo "Rp ".digit($dsum2['total_harga']); ?></td>
  </tr>
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	}
	else
	{
		echo "anda tidak berhak meng-akses halaman ini !";
	}
?>