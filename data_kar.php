<a href='index.php?halaman=form_data_master&kode=kar_insert' class='btn btn-small btn-primary'>
   <i class="halflings-icon white plus"></i> <span>Tambah Data</span>
   </a>
   <br/>
   <br/>

<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon user'></i><span class='break'></span>Data Karyawan</h2>
						<div class='box-icon'>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<table class='table table-striped table-bordered bootstrap-datatable datatable'>
						  <thead>
							  <tr>
          <th>Kode Karyawan</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Email</th>
          <th>Kontak</th>
           <th><center>Aksi</center></th>
							  </tr>
						  </thead>   
						  <tbody>
							
							<?php
		$qtmpil_sup="select * from karyawan order by inc asc";					
		$qp_sup=mysql_query($qtmpil_sup);		
		while($row2=mysql_fetch_array($qp_sup)){ ?>
		  <tr><td><?php echo "$row2[kar_id]"; ?></td>
          <td><?php echo "$row2[kar_nama]"; ?></td>
          <td><?php echo "$row2[kar_alamat]"; ?></td>
          <td><?php echo "$row2[kar_kota]"; ?></td>
          <td><?php echo "$row2[kar_email]"; ?></td>
          <td><?php echo "$row2[kar_kontak]"; ?></td>
		  
          <td><center><?php echo "<a class='btn btn-mini btn-primary' href=index.php?halaman=form_ubah_data&kode=kar_update&id=$row2[kar_id]>"; ?>
          	 <i class='halflings-icon white edit'></i>
			 <?php echo "</a> ";
			 
			 echo "<a class='btn btn-mini btn-danger' href='proses.php?proses=kar_delete&id=$row2[kar_id]'>"; ?>
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