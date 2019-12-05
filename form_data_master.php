<link href="validasi/style_login.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="validasi/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="validasi/jquery-validation.js"></script>


<?php
   if ($_GET['id']=='duplikat'){
   	echo" <div class='alert alert-error'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							<h4 class='alert-heading'>Duplicate Data</h4>
							<p>Data <b>$_GET[data]</b> yang anda masukkan sudah ada didatabase, Silahkan Input data Lainnya.</p>
						</div>";
   }
   ?>
   
<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

	echo "
	<form id=login name=login method=post action=proses.php enctype='multipart/form-data'>
	  <input type=hidden name=proses id=proses value=$_GET[kode] />";
//form data barang
	if ($_GET['kode']=="barang_insert"){
		//pemanggilan fungsi penambahan
		$a="SELECT * FROM barang";
		$b="SELECT inc FROM barang ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($a, $b);
		$sql = mysql_query("SELECT * FROM lokasi");
		$sql2 = mysql_query("SELECT * FROM kategori");
		$sql3 = mysql_query("SELECT * FROM unit");
	?><div class='row-fluid sortable'>
				<div class='col-md-12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form input data barang</h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
								<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						  <fieldset>
						  <input type=hidden name=proses id=proses value="<?php echo $_GET['kode'] ?>" />
						  <input type=hidden name=inc id=inc value='<?php echo $inc ?>' />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode Barang </label>
							<div class='controls'>
							
							<input type='text' name='Barang_Kode' class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' readonly='true' value='BRG-<?php echo $inc; ?>'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Barang </label>
							<div class='controls'>
							
							<input type='text' name=nmBarang class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>

							<div class='control-group'>
							<label class='control-label' for='typeahead'>Lokasi </label>
							<div class='controls'>
							
							<select name='lokasi' class="span6 typeahead field required">
								<option disabled selected>Silahkan Pilih Lokasi</option>
								<?php while($tampil = mysql_fetch_array($sql)): ?>
								<option value="<?php echo $tampil['lokasi_id']; ?>"><?php echo $tampil['lokasi']; ?></option>
								<?php endwhile; ?>
							</select>
							</div>

							<div class='control-group'>
							<label class='control-label' for='typeahead'>Unit Barang </label>
							<div class='controls'>
							<select name='unit' class="span6 typeahead field required">
								<option disabled selected>Silahkan Pilih Unit</option>
								<?php while($tampil3 = mysql_fetch_array($sql3)): ?>
								<option value="<?php echo $tampil3['unit_id']; ?>"><?php echo $tampil3['unit']; ?></option>
								<?php endwhile; ?>
							</select>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kategori Barang </label>
							<div class='controls'>
							<select name='kategori' class="span6 typeahead field required">
								<option disabled selected>Silahkan Pilih Kategori</option>
								<?php while($tampil2 = mysql_fetch_array($sql2)): ?>
								<option value="<?php echo $tampil2['kategori_id']; ?>"><?php echo $tampil2['kategori']; ?></option>
								<?php endwhile; ?>
							</select>
							</div>
						<?php echo"	
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Harga beli </label>
							<div class='controls'>
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=harga_beli class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>			
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanBar value=Simpan />
							 <a href='index.php?halaman=data_barang' class='btn'>
   <span>Kembali </span>
   </a>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div><!--/span-->

			</div><!--/row-->"?><?php
	}
	elseif ($_GET['kode']=="panen_insert"){
		//pemanggilan fungsi penambahan
		$c="SELECT * FROM panen";
		$d="SELECT inc FROM panen ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($c, $d);
		$sql = mysql_query("SELECT * FROM lokasi");
		$sql2 = mysql_query("SELECT * FROM kategori");
		$sql3 = mysql_query("SELECT * FROM unit");
	?><div class='row-fluid sortable'>
				<div class='col-md-12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form input data panen</h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
								<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						  <fieldset>
						  <input type=hidden name=proses id=proses value="<?php echo $_GET['kode'] ?>" />
						  <input type=hidden name=inc id=inc value='<?php echo $inc ?>' />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode Panen </label>
							<div class='controls'>
							
							<input type='text' name='panen_Kode' class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' readonly='true' value='PNN-<?php echo $inc; ?>'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Panen </label>
							<div class='controls'>
							
							<input type='text' name=nmpanen class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>

							<div class='control-group'>
							<label class='control-label' for='typeahead'>Lokasi </label>
							<div class='controls'>
							
							<select name='lokasi' class="span6 typeahead field required">
								<option disabled selected>Silahkan Pilih Lokasi</option>
								<?php while($tampil = mysql_fetch_array($sql)): ?>
								<option value="<?php echo $tampil['lokasi_id']; ?>"><?php echo $tampil['lokasi']; ?></option>
								<?php endwhile; ?>
							</select>
							</div>

							<div class='control-group'>
							<label class='control-label' for='typeahead'>Unit Barang </label>
							<div class='controls'>
							<select name='unit' class="span6 typeahead field required">
								<option disabled selected>Silahkan Pilih Unit</option>
								<?php while($tampil3 = mysql_fetch_array($sql3)): ?>
								<option value="<?php echo $tampil3['unit_id']; ?>"><?php echo $tampil3['unit']; ?></option>
								<?php endwhile; ?>
							</select>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kategori Barang </label>
							<div class='controls'>
							<select name='kategori' class="span6 typeahead field required">
								<option disabled selected>Silahkan Pilih Kategori</option>
								<?php while($tampil2 = mysql_fetch_array($sql2)): ?>
								<option value="<?php echo $tampil2['kategori_id']; ?>"><?php echo $tampil2['kategori']; ?></option>
								<?php endwhile; ?>
							</select>
							</div>
						<?php echo"	
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Harga beli </label>
							<div class='controls'>
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=harga_beli class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Harga Jual </label>
							<div class='controls'>
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=harga_jual class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>			
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanBar value=Simpan />
													 <a href='index.php?halaman=data_panen' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   
					</div>
				</div><!--/span-->

			</div><!--/row-->"?><?php
	}
//form data supplier
	elseif($_GET['kode']=="supplier_insert"){
		//pemanggilan fungsi penambahan
		$a="SELECT * FROM supplier";
		$b="SELECT inc FROM supplier ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($a, $b);
    echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form input data supplier </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=supplier_inc id=supplier_inc value=$inc />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode Suplier </label>
							<div class='controls'>
							
							<input type='text' name=supplier_id class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' readonly='true' value='SPL-$inc'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Supplier </label>
							<div class='controls'>
							
							<input type='text' name=nmSupplier class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Alamat Supplier </label>
							<div class='controls'>
							
							<input type='text' name=alamatSup class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kota Supplier </label>
							<div class='controls'>
							
							<input type='text' name=kotaSup class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Email Supplier </label>
							<div class='controls'>
							
							<input type='text' name=emailSup class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kontak Supplier </label>
							<div class='controls'>
							
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=kontakSup class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanSup value=Simpan />
													 <a href='index.php?halaman=data_supplier' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";
	}

//form data supplier
	elseif($_GET['kode']=="lokasi_insert"){
		//pemanggilan fungsi penambahan
		$a="SELECT * FROM lokasi";
		$b="SELECT lokasi_id FROM lokasi ORDER BY lokasi_id DESC LIMIT 1";
		$inc=penambahan($a, $b);
    echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form input data Lokasi </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=supplier_inc id=supplier_inc value=$inc />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Lokasi </label>
							<div class='controls'>
							
							<input type='text' name=lokasi class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>							
							
							</div>			
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanLok value=Simpan />
													 <a href='index.php?halaman=data_lokasi' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";
	}
	elseif($_GET['kode']=="kategori_insert"){
		//pemanggilan fungsi penambahan
		$a="SELECT * FROM lokasi";
		$b="SELECT lokasi_id FROM lokasi ORDER BY lokasi_id DESC LIMIT 1";
    echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Input Data Kategori </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=supplier_inc id=supplier_inc value=$inc />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Kategori </label>
							<div class='controls'>
							
							<input type='text' name=kategori class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>							
							
							</div>			
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanKat value=Simpan />
													 <a href='index.php?halaman=data_kategori' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";
	}
	elseif($_GET['kode']=="unit_insert"){
		//pemanggilan fungsi penambahan
		$a="SELECT * FROM unit";
		$b="SELECT unit_id FROM unit ORDER BY unit_id DESC LIMIT 1";
    echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Input Data Unit </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=supplier_inc id=supplier_inc value=$inc />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Unit </label>
							<div class='controls'>
							
							<input type='text' name=unit class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>							
							
							</div>
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanKat value=Simpan />
													 <a href='index.php?halaman=data_unit' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";
	}elseif($_GET['kode']=="pelanggan_insert"){  
//form data pelanggan
	//pemanggilan fungsi penambahan
		$a="SELECT * FROM pelanggan";
		$b="SELECT inc FROM pelanggan ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($a, $b);
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form input data pelanggan </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=pelanggan_inc id=pelanggan_inc value=$inc />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode Pelanggan </label>
							<div class='controls'>
							
							<input type='text' name=pelanggan_id class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' readonly='true' value='PLG-$inc'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Pelanggan </label>
							<div class='controls'>
							
							<input type='text' name=nmPelanggan class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Alamat Pelanggan </label>
							<div class='controls'>
							
							<input type='text' name=alamatPel class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kota Pelanggan </label>
							<div class='controls'>
							
							<input type='text' name=kotaPel class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Email Pelanggan </label>
							<div class='controls'>
							
							<input type='text' name=emailPel class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kontak Pelanggan </label>
							<div class='controls'>
							
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=kontakPel class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanSup value=Simpan />
													 <a href='index.php?halaman=data_pelanggan' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";
	}
	
	else
	{  
//form data karyawan
	//pemanggilan fungsi penambahan
		$a="SELECT * FROM karyawan";
		$b="SELECT inc FROM karyawan ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($a, $b);
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form input data karyawan </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=kar_inc id=kar_inc value=$inc />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode Karyawan </label>
							<div class='controls'>
							
							<input type='text' name=kar_id class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' readonly='true' value='KRY-$inc'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Karyawan </label>
							<div class='controls'>
							
							<input type='text' name=nmkar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Alamat Karyawan </label>
							<div class='controls'>
							
							<input type='text' name=alamatkar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kota Karyawan </label>
							<div class='controls'>
							
							<input type='text' name=kotakar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Email Karyawan </label>
							<div class='controls'>
							
							<input type='text' name=emailkar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kontak Karyawan </label>
							<div class='controls'>
							
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=kontakkar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi'>
							</div>
							
							
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanSup value=Simpan />
													 <a href='index.php?halaman=data_kar' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";
	}
     echo " </form>";

?>