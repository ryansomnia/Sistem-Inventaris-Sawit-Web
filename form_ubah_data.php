<link href="validasi/style_login.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="validasi/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="validasi/jquery-validation.js"></script>
<style type="text/css">
td{
	border:none;
}

#input{
	height:20px;
	border:1px solid #c0d3e2;
}
</style>
<?php
   if ($_GET['ids']=='duplikat'){
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
	<form id=login name=login method=post action=proses.php>
	<input type=hidden name=proses id=proses value=$_GET[kode] />";
	if($_GET['kode']=="barang_update"){
		$pesan="SELECT * FROM barang a INNER JOIN lokasi b ON a.lokasi_id=b.lokasi_id JOIN unit c ON a.unit_id=c.unit_id INNER JOIN kategori d ON a.kategori_id=d.kategori_id WHERE inc='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
		$sql = mysql_query("SELECT * FROM lokasi WHERE lokasi_id <> '$data[lokasi_id]'");
		$sql2 = mysql_query("SELECT * FROM unit WHERE unit_id <> '$data[unit_id]'");
		$sql3 = mysql_query("SELECT * FROM kategori WHERE kategori_id <> '$data[kategori_id]'");
		
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form ubah data barang</h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=inc id=inc value=$data[inc] />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode Barang </label>
							<div class='controls'>
							
							<input type='text' name=Barang_Kode class='span6 typeahead field required' readonly='true' id='typeahead' title='field ini harus di isi' value='".$data[barang_id]."'/>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Barang </label>
							<div class='controls'>
							
							<input type='text' name=nmBarang class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[barang_nama]."'/>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Lokasi </label>
							<div class='controls'>
							
							<select name='lokasi' class='span6 typeahead field required'>
								<option value='".$data[lokasi_id]."'>".$data[lokasi]."</option>
								"; while($tampil = mysql_fetch_array($sql)):  echo "
								<option value='".$tampil[lokasi_id]."'>".$tampil[lokasi]."</option>
								 "; endwhile;
							echo "	 
							</select>
							</div>

								<div class='control-group'>
							<label class='control-label' for='typeahead'>Unit Barang</label>
							<div class='controls'>
							
							<select name='unit' class='span6 typeahead field required'>
								<option value='".$data[unit_id]."'>".$data[unit]."</option>
								"; while($tampil = mysql_fetch_array($sql2)):  echo "
								<option value='".$tampil[unit_id]."'>".$tampil[unit]."</option>
								 "; endwhile;
							echo "	 
							</select>
							</div>

							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kategori Barang</label>
							<div class='controls'>
							
							<select name='kategori' class='span6 typeahead field required'>
								<option value='".$data[kategori_id]."'>".$data[kategori]."</option>
								"; while($tampil = mysql_fetch_array($sql3)):  echo "
								<option value='".$tampil[kategori_id]."'>".$tampil[kategori]."</option>
								 "; endwhile;
							echo "	 
							</select>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Harga beli </label>
							<div class='controls'>
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=harga_beli class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[harga_beli]."'>
							</div>
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanBar 						 <a href='index.php?halaman=data_barang' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";	
		}
		elseif($_GET['kode']=="panen_update"){
		$pesan="SELECT * FROM panen a INNER JOIN lokasi b ON a.lokasi_id=b.lokasi_id JOIN unit c ON a.unit_id=c.unit_id INNER JOIN kategori d ON a.kategori_id=d.kategori_id WHERE inc='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
		$sql = mysql_query("SELECT * FROM lokasi WHERE lokasi_id <> '$data[lokasi_id]'");
		$sql2 = mysql_query("SELECT * FROM unit WHERE unit_id <> '$data[unit_id]'");
		$sql3 = mysql_query("SELECT * FROM kategori WHERE kategori_id <> '$data[kategori_id]'");
		
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form ubah data panen</h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=inc id=inc value=$data[inc] />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode Panen </label>
							<div class='controls'>
							
							<input type='text' name=panen_Kode class='span6 typeahead field required' readonly='true' id='typeahead' title='field ini harus di isi' value='".$data[panen_id]."'/>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Panen </label>
							<div class='controls'>
							
							<input type='text' name=nmpanen class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[panen_nama]."'/>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Lokasi </label>
							<div class='controls'>
							
							<select name='lokasi' class='span6 typeahead field required'>
								<option value='".$data[lokasi_id]."'>".$data[lokasi]."</option>
								"; while($tampil = mysql_fetch_array($sql)):  echo "
								<option value='".$tampil[lokasi_id]."'>".$tampil[lokasi]."</option>
								 "; endwhile;
							echo "	 
							</select>
							</div>

								<div class='control-group'>
							<label class='control-label' for='typeahead'>Unit Barang</label>
							<div class='controls'>
							
							<select name='unit' class='span6 typeahead field required'>
								<option value='".$data[unit_id]."'>".$data[unit]."</option>
								"; while($tampil = mysql_fetch_array($sql2)):  echo "
								<option value='".$tampil[unit_id]."'>".$tampil[unit]."</option>
								 "; endwhile;
							echo "	 
							</select>
							</div>

							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kategori Barang</label>
							<div class='controls'>
							
							<select name='kategori' class='span6 typeahead field required'>
								<option value='".$data[kategori_id]."'>".$data[kategori]."</option>
								"; while($tampil = mysql_fetch_array($sql3)):  echo "
								<option value='".$tampil[kategori_id]."'>".$tampil[kategori]."</option>
								 "; endwhile;
							echo "	 
							</select>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Harga beli </label>
							<div class='controls'>
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=harga_beli class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[harga_beli]."'>
							</div>
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Harga Jual </label>
							<div class='controls'>
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=harga_jual class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[harga_jual]."'>
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

			</div><!--/row-->";	
	}	elseif($_GET['kode']=="supplier_update"){
		$pesan="SELECT * FROM supplier WHERE supplier_id='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Ubah data supplier </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=supplier_id id=supplier_id value='".$data[supplier_id]."' />
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode Suplier </label>
							<div class='controls'>
							
							<input type='text' readonly='yes' name=supplier_id class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[supplier_id]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Supplier </label>
							<div class='controls'>
							
							<input type='text' name=nmSupplier class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[supplier_nama]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Alamat Supplier </label>
							<div class='controls'>
							
							<input type='text' name=alamatSup class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[supplier_alamat]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kota Supplier </label>
							<div class='controls'>
							
							<input type='text' name=kotaSup class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[supplier_kota]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Email Supplier </label>
							<div class='controls'>
							
							<input type='text' name=emailSup class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[supplier_email]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kontak Supplier </label>
							<div class='controls'>
							
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=kontakSup class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[supplier_kontak]."'>
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

 elseif($_GET['kode']=="identitas_update"){
	$pesan="SELECT * FROM identitas WHERE id_identitas='1'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Ubah data identitas </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama identitas </label>
							<div class='controls'>
							
							<input type='text' name=nama_identitas class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[nama_identitas]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Alamat identitas </label>
							<div class='controls'>
							
							<input type='text' name=alamat class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[alamat]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Telp </label>
							<div class='controls'>
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=telp class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[telp]."'>
							</div>

							<div class='control-group'>
							<label class='control-label' for='typeahead'>Keterangan </label>
							<div class='controls'>
							<input type='text' name=keterangan class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[keterangan]."'>
							</div>
							
							
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=SimpanIden value=Simpan />
													 <a href='index.php?halaman=home' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";

}
 elseif($_GET['kode']=="lokasi_update"){
	$pesan="SELECT * FROM lokasi WHERE lokasi_id='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Ubah data Lokasi </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Lokasi </label>
							<div class='controls'>
							
							<input type='text' name=nama_lokasi class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[lokasi]."'>
							<input type='hidden' name=id class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$_GET['id']."'>
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
elseif($_GET['kode']=="kategori_update"){
	$pesan="SELECT * FROM kategori WHERE kategori_id='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Ubah data Kategori </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Lokasi </label>
							<div class='controls'>
							
							<input type='text' name=nama_kategori class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[kategori]."'>
							<input type='hidden' name=id class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$_GET['id']."'>
							</div>
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=UbahKat value=Simpan />
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
elseif($_GET['kode']=="unit_update"){
	$pesan="SELECT * FROM unit WHERE unit_id='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Ubah data unit </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Unit </label>
							<div class='controls'>
							
							<input type='text' name=nama_unit class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[unit]."'>
							<input type='hidden' name=id class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$_GET['id']."'>
							</div>						
							</div>
							
							<div class='form-actions'>
							<input type=submit class='btn btn-primary' name=UbahKat value=Simpan />
													 <a href='index.php?halaman=data_unit' class='btn'>
   <span>Kembali </span>
   </a>
			
							 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->";

}
	elseif($_GET['kode']=="pelanggan_update"){
	$pesan="SELECT * FROM pelanggan WHERE pelanggan_id='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Ubah data pelanggan </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  <input type=hidden name=pelanggan_inc id=pelanggan_inc value='".$data[pelanggan_id]."' />
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode Pelanggan </label>
							<div class='controls'>
							
							<input type='text' readonly='yes' name=pelanggan_id class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[pelanggan_id]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Pelanggan </label>
							<div class='controls'>
							
							<input type='text' name=nmPelanggan class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[pelanggan_nama]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Alamat Pelanggan </label>
							<div class='controls'>
							
							<input type='text' name=alamatPel class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[pelanggan_alamat]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kota Pelanggan </label>
							<div class='controls'>
							
							<input type='text' name=kotaPel class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[pelanggan_kota]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Email Pelanggan </label>
							<div class='controls'>
							
							<input type='text' name=emailPel class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[pelanggan_email]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kontak Pelanggan </label>
							<div class='controls'>
							
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=kontakPel class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[pelanggan_kontak]."'>
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
	else{  
	$pesan="SELECT * FROM karyawan WHERE kar_id='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	echo "<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header' data-original-title>
						<h2><i class='halflings-icon edit'></i><span class='break'></span>Form Ubah data karyawan </h2>
						<div class='box-icon'>
							<a href='#' class='btn-setting'><i class='halflings-icon wrench'></i></a>
							<a href='#' class='btn-minimize'><i class='halflings-icon chevron-up'></i></a>
							<a href='#' class='btn-close'><i class='halflings-icon remove'></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form class='form-horizontal'>
						  <fieldset>
						  
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kode karyawan </label>
							<div class='controls'>
							
							<input type='text' readonly='yes' name=kar_id class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[kar_id]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Karyawan </label>
							<div class='controls'>
							
							<input type='text' name=nmkar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[kar_nama]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Alamat Karyawan </label>
							<div class='controls'>
							
							<input type='text' name=alamatkar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[kar_alamat]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kota Karyawan</label>
							<div class='controls'>
							
							<input type='text' name=kotakar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[kar_kota]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Email Karyawan </label>
							<div class='controls'>
							
							<input type='text' name=emailkar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[kar_email]."'>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Kontak Karyawan </label>
							<div class='controls'>
							
							<input type='text' onkeypress=\"return isNumberKey(event)\" name=kontakkar class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data[kar_kontak]."'>
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
	echo "</form>";
?>