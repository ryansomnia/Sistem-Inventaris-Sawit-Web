<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
?>
<script type="text/javascript">
	function limit_checkbox(max,identifier)
	{
		var checkbox = $("input[name='"+identifier+"']");
		var checked  = $("input[name='"+identifier+"']:checked").length;
		checkbox.filter(':not(:checked)').prop('disabled', checked >= max);
	}
</script>
<a href='index.php?halaman=form_data_master&kode=panen_insert' class='btn btn-small btn-primary'>
   <i class="halflings-icon white plus"></i> <span>Tambah Data</span>
   </a> <a class="btn btn-small btn-success" href='index.php?halaman=import'>Import Data dari Excel</a>
   <br/>
   <br/>
   
  

<div class='row-fluid sortable'>		
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon user'></i><span class='break'></span>Data Panen</h2>
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
								  <th>Kode Panen</th>
								  <th>Nama Panen</th>
								  <th>Lokasi</th>
								  <th>Unit Panen</th>
								  <th>Kategori Panen</th>
								  <th>Harga Beli</th>
								  <th>Harga Jual</th>
								  <!--<th>Diskon</th>-->
								 <!-- <th width="5%">Struk</th>-->
								  <th><center>Actions</center></th>
							  </tr>
						  </thead>
						  <tbody>
							
							<?php
		$qtmpil_barang="select * from panen inner join unit on panen.unit_id = unit.unit_id inner join kategori on panen.kategori_id=kategori.kategori_id inner join lokasi on panen.lokasi_id=lokasi.lokasi_id  ";						
		$qp_brg=mysql_query($qtmpil_barang);
		$no=1;
		while($row1=mysql_fetch_array($qp_brg)){ ?>
		<tr>
		  <td><?php echo "$no"; ?></td>  
    	  <td><?php echo "$row1[panen_id]"; ?></td>
          <td><?php echo "$row1[panen_nama]"; ?></td>
          <td><?php echo "$row1[lokasi]"; ?></td>
          <td><?php echo "$row1[unit]"; ?></td>
          <td><?php echo "$row1[kategori]"; ?></td>
		  <td><?php echo "".digit($row1[harga_beli]).""; ?></td>
          <td><?php echo "".digit($row1[harga_jual]).""; ?></td>
         <!-- <td><?php echo "$row1[diskon]%"; ?></td>-->
          <!--<td><?php echo "<img src=gambar/".$row1[gambar].">" ?></td>-->
          
          <td><center><?php echo "<a class='btn btn-mini btn-primary' href=coba.php?halaman=form_ubah_data&kode=panen_update&id=$row1[inc]>"; ?>
          	 <i class='halflings-icon white edit'></i>
			 <?php echo "</a> ";
			 
			 echo "<a class='btn btn-mini btn-danger' href='proses.php?proses=panen_delete&id=$row1[inc]'>"; ?>
          	 <i class='halflings-icon white trash'></i>
			 <?php echo "</a>"; ?>
			 </center>
		  </td>
		</tr>
		<?php $no++;} ?>
						  </tbody>
					  </table>
					 <!-- <button type="button" onclick="cetak()">Cetak Barcode</button>   -->
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<!--<script type="text/javascript">
	function cetak(){   
	 	var selectedcheck="";
	 	var c = document.getElementById('checklist');
	    for (i = 0; i < checklist.length; i++){   
	  		if (checklist[i].checked){   
	   			selectedcheck += checklist[i].value +",";
	  		}
	    }
	    document.location = "barcode/generate-verified-files.php?kode2="+selectedcheck;
	}
</script>-->
</script>
</head>
<!-- <form>
<p>Pilih check favoritmu :</p>
<input type="checkbox" name="check" value="Anggur">Anggur
<input type="checkbox" name="check" value="Apel">Apel
<input type="checkbox" name="check" value="Semangka">Semangka
<input type="checkbox" name="check" value="Durian">Durian
<input type="checkbox" name="check" value="Mangga">Mangga

<button type="button" onclick="displayAlert(this.form)">Lihat check favoritmu</button>
</form> -->