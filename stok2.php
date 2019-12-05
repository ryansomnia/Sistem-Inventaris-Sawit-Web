<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
if (!isset($_POST['proses']) and ($_POST['proses']=="form1"))
	{
		$sql="SELECT * FROM stok2 ORDER BY panen_id ASC";	
		$sumQty="SELECT SUM(qty) AS totalQty FROM stok2";
	}
	elseif (isset($_POST['proses']) and ($_POST['panen_nama']==""))
	{
		$sql="SELECT * FROM stok2 ORDER BY panen_id ASC";
		$sumQty="SELECT SUM(qty) AS totalQty FROM stok2";
	}
	else
	{
		$sql="SELECT * FROM stok2 WHERE panen_nama LIKE '%$_POST[panen_nama]%' OR panen_id LIKE '%$_POST[panen_nama]%'";	
		$sumQty="SELECT SUM(qty) AS totalQty FROM stok2 WHERE panen_nama LIKE '%$_POST[panen_nama]%' OR panen_id LIKE '%$_POST[panen_nama]%'";
	}

?>
<h1>Data Stok Panen</h1>
<form id="form1" name="form1" method="post" action="index.php?halaman=stok2">
<input name="proses" type="hidden" value="form1" />
<div class="control-group">
<label class="control-label" for="typeahead">Cari Barang Panen </label>
	<div class="controls">
<input type="text" name="panen_nama" class="span6 typeahead" id="typeahead" value='<?php echo$_POST['panen_nama'];?>'>
		<input name="cari" class='btn btn-small btn-success' type="submit" value="cari" />
	</div>
</div>					
</form>					
					

    <br/>
	

   
<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Data Stock Panen</h2>
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
    <th>ID Panen</th>
    <th>Nama Panen</th>
    <th>Qty</th>
   <!--  <th><center>Menu</center></th> -->
   
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
							<?php 
  		$no=1;
		$query=mysql_query($sql);
		while($data=mysql_fetch_array($query))
		{
		$b=mysql_fetch_array(mysql_query("SELECT * FROM panen WHERE panen_id='$data[panen_id]'"));
		?>
		
		
       <?php echo"<td>$no</td>
    <td>$data[panen_id]</td>
    <td>$b[panen_nama]</td>
    <td>$data[qty]</td>
	<td>$b[panen_kategori]</td>

    </tr>";
	$no++;
	} ?>
   <tr>
   <td style="background-color:#333;color:#FFF;border:none" colspan='3'>Grand Total</td>
  	<td style="background-color:#333;color:#FFF;border:none"><?php
			$qsumQty=mysql_query($sumQty);
			$dsumQty=mysql_fetch_array($qsumQty);
			echo $dsumQty['totalQty'];
		?></td>
		<td style="background-color:#333;color:#FFF;border:none" colspan='7'></td>

  	
  
  </tr>
								
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->