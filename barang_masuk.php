<div class="priority low"><span>Filter Data Berdasarkan Tanggal :</span></div>
<form id="form1" name="form1" method="post" action="index.php?halaman=barang_masuk_cari">
			<div class="control-group">
			<label class="control-label" for="date01">Tanggal Awal &nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Tanggal akhir</label>
			<div class="controls">
			<input type="text" class="input-xlarge datepicker" id="date01" name="tgl_awal" readonly="true" value="<?php echo date(Y)."-".date(m)."-".date(d);?>">
			<input type="text" class="input-xlarge datepicker" id="date02" name="tgl_akhir" readonly="true" value="<?php echo date(Y)."-".date(m)."-".date(d);?>">
			</div>			
			</div>
			<input name="tampil" class="btn btn-mini btn-success"  type="submit" value="tampilkan" />
			
 </form>

<hr/>

<div class="alert alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 class="alert-heading">Attention!</h4>
							<p>Click buttons tampilkan untuk menampilkan data berdasarkan tanggal .</p>
						</div>

	
<a href='form_beli.php' class='btn btn-small btn-primary'> <i class="halflings-icon white plus"></i> <span>Tambah Data</span>
   </a>
   <br/>
   <br/>
<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon user'></i><span class='break'></span>Data Barang Masuk</h2>
						<div class='box-icon'>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<table class='table table-striped table-bordered bootstrap-datatable datatable'>
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
							
							<?php
		$pesan="SELECT * FROM beli ORDER BY inc DESC LIMIT 25";
		$query=mysql_query($pesan);
		$no=1;
		while($row=mysql_fetch_array($query)){ 
		$z=mysql_fetch_array(mysql_query("SELECT * FROM supplier WHERE supplier_id='$row[supplier_id]'"));
		?>
		
		
		<tr><td><?php echo "$no"; ?></td>
           <td><a href="#" onclick="javascript:wincal=window.open('beli_detail.php?id=<?php echo $row['beli_id']; ?>','Lihat Data','width=790,height=400,scrollbars=1');">
    <?php echo $row['beli_id']; ?></a>
    </td>
    <td><?php echo "$row[tgl_trans]"; ?></td>
    <td><?php echo "$z[supplier_nama]"; ?></td>
    <td align="right"><?php echo "Rp "; echo digit($row['total']); ?></td>
		
		
								
							</tr>
							<?php $no++;}?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


