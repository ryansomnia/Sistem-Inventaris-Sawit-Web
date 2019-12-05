<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
if (!isset($_POST['proses']) and ($_POST['proses']=="form1"))
	{
		$sql="SELECT * FROM stok ORDER BY barang_id ASC";	
		$sumQty="SELECT SUM(qty) AS totalQty FROM stok";
	}
	elseif (isset($_POST['proses']) and ($_POST['barang_nama']==""))
	{
		$sql="SELECT * FROM stok ORDER BY barang_id ASC";
		$sumQty="SELECT SUM(qty) AS totalQty FROM stok";
	}
	else
	{
		$sql="SELECT * FROM stok WHERE barang_nama LIKE '%$_POST[barang_nama]%' OR barang_id LIKE '%$_POST[barang_nama]%'";	
		$sumQty="SELECT SUM(qty) AS totalQty FROM stok WHERE barang_nama LIKE '%$_POST[barang_nama]%' OR barang_id LIKE '%$_POST[barang_nama]%'";
	}

?>
<h1>Data Stok</h1>
<form id="form1" name="form1" method="post" action="index.php?halaman=stok">
<input name="proses" type="hidden" value="form1" />
<div class="control-group">
<label class="control-label" for="typeahead">Cari Barang </label>
	<div class="controls">
<input type="text" name="barang_nama" class="span6 typeahead" id="typeahead" value='<?php echo$_POST['barang_nama'];?>'>
		<input name="cari" class='btn btn-small btn-success' type="submit" value="cari" />
	</div>
</div>					
</form>					
					

    <br/>
	

   
<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Data Stock</h2>
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
    <th>ID Barang</th>
    <th>Nama Barang</th>
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
		$b=mysql_fetch_array(mysql_query("SELECT * FROM barang WHERE barang_id='$data[barang_id]'"));
		?>
		
		
       <?php echo"<td>$no</td>
    <td>$data[barang_id]</td>
    <td>$b[barang_nama]</td>
    <td>$data[qty]</td>
	<td>$b[barang_kategori]</td>

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