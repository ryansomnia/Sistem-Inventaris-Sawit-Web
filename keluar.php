 <div class="priority low"><span>Filter Data Berdasarkan Tanggal :</span></div>
 <form id="form1" name="form1" method="post" action="index.php?halaman=keluar_cari">
			<div class="control-group">
			<label class="control-label" for="date01">Tanggal Awal &nbsp&nbsp&nbsp&nbsp 
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Tanggal akhir</label>
			<div class="controls">
			<input type="text" class="input-xlarge datepicker" id="datepicker" name="tgl_awal" readonly="true" value="<?php echo date(Y)."-".date(m)."-".date(d);?>">
			<input type="text" class="input-xlarge datepicker" id="datepicker1" name="tgl_akhir"  readonly="true" value="<?php echo date(Y)."-".date(m)."-".date(d);?>">
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
	
<a href='form_keluar.php' class='btn btn-small btn-primary'><i class="halflings-icon white plus"></i> <span>Tambah Data</span>
   </a>
   <br/>
   <br/>
<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon user'></i><span class='break'></span>Data Penjualan Panen</h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
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
    <th>No. SPB</th>
        <th>No. Polisi</th>
     <th>Nama Karyawan</th>
    <th>Nama Pembeli</th>
     <!--<th>Bruto</th> 
     <th>Tarra</th>
      <th>Netto(Qty)</th>-->
    <th>Total Harga</th>
    <th>Biaya Kirim</th>
    <th>Grand Total</th>
    <th>Print</th>
							  </tr>
						  </thead>   
						  <tbody>
							
							<?php
		$pesan="SELECT * FROM keluar ORDER BY inc DESC LIMIT 25";
		$query=mysql_query($pesan);
		$no=1;
		while($row=mysql_fetch_array($query)){
		
		//Menampilkan Grand Total
		$grand_total=$row['total']+$row['biaya_kirim'];
		//menampilkan nama pelanggan
		$z=mysql_fetch_array(mysql_query("SELECT * FROM pelanggan WHERE Pelanggan_id='$row[pelanggan_id]'"));
		$y=mysql_fetch_array(mysql_query("SELECT * FROM Karyawan WHERE kar_id='$row[kar_id]'"));

		?>
	
    <tr><td><?php echo "$no"; ?></td>
    <td><a href="#" onclick="javascript:wincal=window.open('keluar_detail.php?id=<?php echo $row['keluar_id']; ?>','Lihat Data','width=790,height=400,scrollbars=1');">
    <?php echo $row['keluar_id']; ?></a></td>
       <td><?php echo "$row[tgl_keluar]"; ?></td>
      <td><?php echo "$row[spb]"; ?></td>
        <td><?php echo "$row[nopol]"; ?></td>
    <td><?php echo "$y[kar_nama]"; ?></td>
    <td><?php echo "$z[pelanggan_nama]"; ?></td>
      <!--  <td><?php echo "$row[bruto]"; ?></td>
    <td><?php echo "$row[tarra]"; ?></td>
    <td><?php echo "$row[qty]"; ?></td>-->
   <td align="right"><?php echo "Rp "; echo digit($row['total']); ?></td>
    <td align="right"><?php echo "Rp "; echo digit($row['biaya_kirim']); ?></td>
    <td align="right"><?php echo "Rp "; echo digit($grand_total); ?></td>
	 <td><a class='btn btn-mini btn-info' href="#" onclick="javascript:wincal=window.open('print_nota2.php?id=<?php echo $row['keluar_id']; ?>','Lihat Data','width=700,height=400,scrollbars=1');">
    <i class='halflings-icon white print'></i></a></td>
			
							</tr>

							<?php $no++;}?>
								
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


