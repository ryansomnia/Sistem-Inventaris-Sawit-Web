<?php
if ($_SESSION['level'] == "admin")
	{
?>


<a href='index.php?halaman=form_akun' class='btn btn-small btn-primary'>
   <i class="halflings-icon white plus"></i> <span>Tambah Data</span>
   </a>
   <br/>
   <br/>
<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon user'></i><span class='break'></span>Data Akun</h2>
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
		  
          <th>Username</th>
          <th>Password</th>
          <th>Nama Lengkap</th>
          <th>Level</th>
      
          <th>Aksi</th>
							  </tr>
						  </thead>   
						  <tbody>
							
							<?php
		$akun="SELECT * FROM account";
	$qakun=mysql_query($akun);
  while($dakun=mysql_fetch_array($qakun))
  { ?>
		
		
		  
          <?php
		  echo" <tr><td>$dakun[username]</td>
    <td>$dakun[password]</td>
    <td>$dakun[nama]</td>
    <td>$dakun[level]</td>";
		  ?>
		  
          <td><?php echo "<a class='btn btn-mini btn-primary' href='index.php?halaman=form_ubah_akun&id=$dakun[username]'>"; ?>
          	 <i class='halflings-icon white edit'></i>
			 <?php echo "</a> ";
			 
			 echo "<a class='btn btn-mini btn-danger' href='proses.php?proses=hapus_akun&id=$dakun[username]'>"; ?>
          	 <i class='halflings-icon white trash'></i>
			 <?php echo "</a>";

         	 
          echo"</td>
		
		
								
							</tr>";
							$no++;}?>
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