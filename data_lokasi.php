<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
?>
<a href='index.php?halaman=form_data_master&kode=lokasi_insert' class='btn btn-small btn-primary'>
   <i class="halflings-icon white plus"></i> <span>Tambah Data</span>
   </a>
   <br/>
   <br/>
   
  

<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon user'></i><span class='break'></span>Data Lokasi</h2>
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
								  <th>Lokasi</th>
								  <th><center>Actions</center></th>
							  </tr>
						  </thead>   
						  <tbody>
							
							<?php
		$qtmpil_barang="select * from lokasi order by lokasi_id asc";						
		$qp_brg=mysql_query($qtmpil_barang);
		$no=1;
		while($row1=mysql_fetch_array($qp_brg)){ ?>
		<tr><td><?php echo "$no"; ?></td>
          <td><?php echo "$row1[lokasi]"; ?></td>
          <td><center><?php echo "<a class='btn btn-mini btn-primary' href=index.php?halaman=form_ubah_data&kode=lokasi_update&id=$row1[lokasi_id]>"; ?>
          	 <i class='halflings-icon white edit'></i>
			 <?php echo "</a> ";
			 
			 echo "<a class='btn btn-mini btn-danger' href='proses.php?proses=lokasi_delete&id=$row1[lokasi_id]'>"; ?>
          	 <i class='halflings-icon white trash'></i>
			 <?php echo "</a>";

         	 
          echo"</center></td>
		
		
								
							</tr>";
							$no++;}?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->