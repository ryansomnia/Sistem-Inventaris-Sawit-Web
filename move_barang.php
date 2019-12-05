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
					<a href="index.php?halaman=see_move" class="btn btn-default">Lihat Data Move Barang</a><br><br>
						<table class='table table-striped table-bordered bootstrap-datatable datatable'>
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kode Barang</th>
								  <th>Nama Barang</th>
								  <th>Stok</th>
								  <th>Ketentuan Eceran</th>
								  <th><center>Aksi</center></th>
							  </tr>
						  </thead>
						  <tbody>
							
							<?php
		$qtmpil_barang="select * from stok join barang on stok.barang_id = barang.barang_id join lokasi on barang.lokasi_id = lokasi.lokasi_id join unit on barang.unit_id = unit.unit_id order by inc asc";						
		$qp_brg=mysql_query($qtmpil_barang);
		$no=1;
		while($row1=mysql_fetch_array($qp_brg)){ ?>
		<tr>
		  <td><?php echo "$no"; ?></td>
          
          <td><a href="#" onclick="javascript:wincal=window.open('barcode/generate-verified-files.php?kode=<?php echo $row1[barang_id]; ?>','Lihat Data','width=213,height=150,scrollbars=1,');">
    <?php echo "$row1[barang_id]"; ?></a></td>
          <td><?php echo "$row1[barang_nama]"; ?></td>
          <td><?php echo $row1['qty']." ".$row1['nama_unit']; ?></td>
		  <td><?php echo $row1['eceran']." ".$row1['keterangan']; ?></td>
          <td><center><?php echo "<a class='btn btn-mini btn-primary' title='Ecerin' data-toggle='modal' href='#ecerin$row1[inc]'>"; ?>
          	 <i class='halflings-icon white arrow-right'></i>
			 <?php echo "</a> ";
			?>
			 </center>
		  </td>
		</tr>

            <div class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="ecerin<?php echo $row1[inc]; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ecerin</h4>
                  </div>
                  <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                    	<div class="form-group">
                          <label class="control-label">ID Barang</label>
                          <input type="text" name="barang_id" value="<?php echo "$row1[barang_id]"; ?>" class="form-control" readonly maxlength="10">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Berapa stok yang mau diecerin?</label>
                          <input type="number" name="ecer" class="form-control" required placeholder="Berapaa?" maxlength="10">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                      <button type="submit" name="ecerkan" class="btn btn-info">Ecerkan</button>
                    </div>
                  </form>
                </div>
              </div>
             </div>

		<?php $no++;} ?>
						  </tbody>
					  </table> 
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	if (isset($_POST['ecerkan'])) {
		$id = $_POST['barang_id'];
		$ecer = $_POST['ecer'];
		$ambil_stok = mysql_query("SELECT * FROM barang INNER JOIN unit ON unit.unit_id=barang.unit_id INNER JOIN stok ON stok.barang_id = barang.barang_id WHERE barang.barang_id = '$id'");
		$array = mysql_fetch_array($ambil_stok);
		$kali = $ecer * $array['eceran'];
		if ($ecer > $array['qty']) {
			echo "<script>alert('Stok tidak tercukupi'); location='index.php?halaman=move_barang';</script>";
		}
		else {
			$masuk_ecer = mysql_query("INSERT INTO eceran VALUES(NULL,'$id','$kali','".$_SESSION['username']."')");
			$kurang_stok = mysql_query("UPDATE stok SET qty =qty - $ecer WHERE barang_id = '$id'");
			if ($kurang_stok and $masuk_ecer) {
				echo "<script>alert('Berhasil ngecerin'); location='index.php?halaman=move_barang';</script>";
			}
			else {
				echo "<script>alert('Gagal ngecerin'); location='index.php?halaman=move_barang';</script>";
			}
		}
	}
?>