
<!DOCTYPE html>
<html lang="en">
<head>

	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Edit Halaman</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Sigit Dwi Prasetyo">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	
	<!-- end: Favicon -->
	<!-- tambahan -->
<link href="validasi/style_login.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="validasi/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="validasi/jquery-validation.js"></script>


</head>
<body>


<form method="post">
<?php 
require_once "library/koneksi.php";

$pesan="SELECT panen.*, kategori, lokasi, unit from panen
				inner join kategori on kategori.kategori_id = panen.kategori_id
				inner join lokasi on lokasi.lokasi_id = panen.lokasi_id
				inner join unit on unit.unit_id = panen.unit_id
				WHERE inc = '$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
		$sql = mysql_query("SELECT * FROM lokasi WHERE lokasi_id <> '$data[lokasi_id]'");
		$sql2 = mysql_query("SELECT * FROM unit WHERE unit_id <> '$data[unit_id]'");
		$sql3 = mysql_query("SELECT * FROM kategori WHERE kategori_id <> '$data[kategori_id]'");
		
		if(isset($_POST['simpan'])){

			$sql="UPDATE  `dbtoko`.`panen` SET  `lokasi_id` =  '$_POST[lokasi]',
					`panen_id` =  '$_POST[panen_Kode]',
					`panen_nama` =  '$_POST[nmpanen]',
					`unit_id` =  '$_POST[unit]',
					`kategori_id` =  '$_POST[kategori]',
					`harga_beli` =  '$_POST[harga_beli]',
					`harga_jual` =  '$_POST[harga_jual]' WHERE  `dbtoko`.`panen`.`inc` ='$_GET[id]';";
			$execute=mysql_query($sql);

			if($execute){
				echo "<script>alert('berhasil hore')</script>";
				echo "<script>document.location.href='index.php?halaman=data_panen'</script>";
			}else{
				echo mysql_error();
				echo "<script>alert('gagal')</script>";
			}
		}

	echo "
	<form method='post'>
	<div class='row-fluid sortable'>
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
							
							<input type='text' name=panen_Kode class='span6 typeahead field required' readonly='true' id='typeahead' title='field ini harus di isi' value='".$data[2]."'/>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Nama Panen </label>
							<div class='controls'>
							
							<input type='text' name=nmpanen class='span6 typeahead field required' id='typeahead' title='field ini harus di isi' value='".$data['panen_nama']."'/>
							</div>
							
							<div class='control-group'>
							<label class='control-label' for='typeahead'>Lokasi </label>
							<div class='controls'>
							
							<select name='lokasi' class='span6 typeahead field required'>
								<option value='".$data['lokasi_id']."'>".$data['lokasi']."</option>
								"; while($tampil = mysql_fetch_array($sql)):  echo "
								<option value='".$tampil['lokasi_id']."'>".$tampil['lokasi']."</option>
								 "; endwhile;
							echo "	 
							</select>
							</div>

								<div class='control-group'>
							<label class='control-label' for='typeahead'>Unit Barang</label>
							<div class='controls'>
							
							<select name='unit' class='span6 typeahead field required'>
								<option value='".$data['unit_id']."'>".$data['unit']."</option>
								"; while($tampil = mysql_fetch_array($sql2)):  echo "
								<option value='".$tampil['unit_id']."'>".$tampil['unit']."</option>
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
							
							<input type=submit class='btn btn-primary' name=simpan value=Simpan />
							<input type=reset name=BatalBar class='btn btn-warning' value=Reset />
							 <a href='index.php?halaman=data_panen' class='btn'>
   								<span>Kembali </span></a>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
				</form>";
		
?>
</form>