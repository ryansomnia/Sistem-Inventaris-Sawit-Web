<?php  
// cek level user apakah admin atau bukan
if ($_SESSION['level'] == "admin")
{ 
	?>
<div id="sidebar-left" class="span2">
<div class="nav-collapse sidebar-nav">
<ul class="nav nav-tabs nav-stacked main-menu">

<li><a href="index.php?halaman=home"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
<li><a href="index.php?halaman=form_ubah_data&kode=identitas_update"><i class="icon-user"></i><span class="hidden-tablet"> Identitas</span></a></li>

<li><a class="dropmenu" href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Data Master</span><span class="label label-important"> 8 </span></a>
 <ul>
	<li><a class="submenu" href="index.php?halaman=data_barang"><i class="icon-file-alt"></i><span class="hidden-tablet"> Barang Inventory</span></a></li>
	<li><a class="submenu" href="index.php?halaman=data_panen"><i class="icon-file-alt"></i><span class="hidden-tablet"> Barang Panen</span></a></li>
	<li><a class="submenu" href="index.php?halaman=data_supplier"><i class="icon-file-alt"></i><span class="hidden-tablet"> Supplier </span></a></li>
	<li><a class="submenu" href="index.php?halaman=data_pelanggan"><i class="icon-file-alt"></i><span class="hidden-tablet"> Pelanggan </span></a></li>
	<li><a class="submenu" href="index.php?halaman=data_kar"><i class="icon-file-alt"></i><span class="hidden-tablet"> Karyawan </span></a></li>
	<li><a class="submenu" href="index.php?halaman=data_lokasi"><i class="icon-file-alt"></i><span class="hidden-tablet"> Lokasi </span></a></li>
	<li><a class="submenu" href="index.php?halaman=data_kategori"><i class="icon-file-alt"></i><span class="hidden-tablet"> Kategori </span></a></li>
	<li><a class="submenu" href="index.php?halaman=data_unit"><i class="icon-file-alt"></i><span class="hidden-tablet"> Unit </span></a></li>
 </ul>	
</li>

<li><a class="dropmenu" href="#"><i class="icon-tasks"></i><span class="hidden-tablet">Transaksi Inventory</span><span class="label label-important"> 3 </span></a>
 <ul>
<li><a href="index.php?halaman=barang_masuk"><i class="icon-calendar"></i><span class="hidden-tablet"> Barang Masuk</span></a></li>
	<li><a href="index.php?halaman=penjualan"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Pemakaian</span></a></li>
	<li><a href="index.php?halaman=stok"><i class="icon-tasks"></i><span class="hidden-tablet">Stok Inventory</span></a></li>
 </ul>	
</li>

<li><a class="dropmenu" href="#"><i class="icon-tasks"></i><span class="hidden-tablet">Transaksi Panen</span><span class="label label-important"> 3 </span></a>
 <ul>
<li><a href="index.php?halaman=panen_masuk"><i class="icon-calendar"></i><span class="hidden-tablet"> Panen Masuk</span></a></li>
	<li><a href="index.php?halaman=keluar"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Penjualan</span></a></li>
	<li><a href="index.php?halaman=stok2"><i class="icon-tasks"></i><span class="hidden-tablet">Stok Panen</span></a></li>
 </ul>	
</li>
<!--<li><a href="index.php?halaman=move_barang"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Ecerin</span></a></li>-->





<li><a class='dropmenu' href='#'><i class='icon-file'></i><span class='hidden-tablet'> Laporan Inventory</span><span class='label label-important'> 2 </span></a>
 <ul>
	<li><a class='submenu' href='index.php?halaman=laptrans_beli'><i class='icon-file-alt'></i><span class='hidden-tablet'> Pembelian </span></a></li>
	<li><a class='submenu' href='index.php?halaman=laptrans_jual'><i class='icon-file-alt'></i><span class='hidden-tablet'> Pemakaian </span></a></li>
 </ul>	
</li>
<li><a class='dropmenu' href='#'><i class='icon-file'></i><span class='hidden-tablet'> Laporan Panen</span><span class='label label-important'> 2 </span></a>
 <ul>
	<li><a class='submenu' href='index.php?halaman=laptrans_hasil'><i class='icon-file-alt'></i><span class='hidden-tablet'> Panen Masuk </span></a></li>
	<li><a class='submenu' href='index.php?halaman=laptrans_keluar'><i class='icon-file-alt'></i><span class='hidden-tablet'> Penjualan </span></a></li>
 </ul>	
</li>
<!--<li><a href="#"><i class="icon-tasks"></i><span class="hidden-tablet">Cetak Barcode</span></a></li>-->
<li><a href="index.php?halaman=data_akun"><i class="icon-user"></i><span class="hidden-tablet"> Data Akun</span></a></li>
<li><a href="logout.php"><i class="icon-off"></i><span class="hidden-tablet"> Logout</span></a></li>

					
</ul>
</div>
</div>

<?php
}
else if($_SESSION['level'] == "user")
{
?>
<div id="sidebar-left" class="span2">
<div class="nav-collapse sidebar-nav">
<ul class="nav nav-tabs nav-stacked main-menu">

<li><a href="index.php?halaman=home"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
<li><a class="dropmenu" href="#"><i class="icon-tasks"></i><span class="hidden-tablet">Transaksi Inventory</span><span class="label label-important"> 3 </span></a>
 <ul>
<li><a href="index.php?halaman=barang_masuk"><i class="icon-calendar"></i><span class="hidden-tablet"> Barang Masuk</span></a></li>
	<li><a href="index.php?halaman=penjualan"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Pemakaian</span></a></li>
	<li><a href="index.php?halaman=stok"><i class="icon-tasks"></i><span class="hidden-tablet">Stok Inventory</span></a></li>
 </ul>	
</li>

<li><a class="dropmenu" href="#"><i class="icon-tasks"></i><span class="hidden-tablet">Transaksi Panen</span><span class="label label-important"> 3 </span></a>
 <ul>
<li><a href="index.php?halaman=panen_masuk"><i class="icon-calendar"></i><span class="hidden-tablet"> Panen Masuk</span></a></li>
	<li><a href="index.php?halaman=keluar"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Penjualan</span></a></li>
	<li><a href="index.php?halaman=stok2"><i class="icon-tasks"></i><span class="hidden-tablet">Stok Panen</span></a></li>
 </ul>	
</li>	
<li><a class='dropmenu' href='#'><i class='icon-file'></i><span class='hidden-tablet'> Laporan Inventory</span><span class='label label-important'> 2 </span></a>
 <ul>
	<li><a class='submenu' href='index.php?halaman=laptrans_beli'><i class='icon-file-alt'></i><span class='hidden-tablet'> Pembelian </span></a></li>
	<li><a class='submenu' href='index.php?halaman=laptrans_jual'><i class='icon-file-alt'></i><span class='hidden-tablet'> Pemakaian </span></a></li>
 </ul>	
</li>
<li><a class='dropmenu' href='#'><i class='icon-file'></i><span class='hidden-tablet'> Laporan Panen</span><span class='label label-important'> 2 </span></a>
 <ul>
	<li><a class='submenu' href='index.php?halaman=laptrans_hasil'><i class='icon-file-alt'></i><span class='hidden-tablet'> Panen Masuk </span></a></li>
	<li><a class='submenu' href='index.php?halaman=laptrans_keluar'><i class='icon-file-alt'></i><span class='hidden-tablet'> Penjualan </span></a></li>
 </ul>	
</li>				
</ul>
</div>
</div>
<?php
}
?>