<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon user'></i><span class='break'></span>Move Barang</h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
					<button type="button" class="btn btn-danger" onclick="history.go(-1)"><i class="halflings-icon back"></i> Kembali</button><br><br>
						<table class='table table-striped table-bordered bootstrap-datatable datatable'>
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kode Barang</th>
								  <th>Nama Barang</th>
								  <th>Qty</th>
								  <th>Petugas</th>
							  </tr>
						  </thead>
						  <tbody>
							
							<?php
		$qtmpil_barang="select * from eceran INNER JOIN barang on eceran.barang_id=barang.barang_id INNER JOIN account ON eceran.username=account.username";						
		$qp_brg=mysql_query($qtmpil_barang);
		$no=1;
		while($row1=mysql_fetch_array($qp_brg)){ ?>
		<tr>
		  <td><?php echo "$no"; ?></td>
          
          <td><a href="#" onclick="javascript:wincal=window.open('barcode/generate-verified-files.php?kode=<?php echo $row1[barang_id]; ?>','Lihat Data','width=213,height=150,scrollbars=1,');">
    <?php echo "$row1[barang_id]"; ?></a></td>
          <td><?php echo "$row1[barang_nama]"; ?></td>
          <td><?php echo $row1['qty'] ?></td>
          <td><?php echo $row1['nama'] ?></td>
		</tr>

		<?php $no++;} ?>
						  </tbody>
					  </table>  
					</div>
				</div><!--/span-->
			
			</div><!--/row-->