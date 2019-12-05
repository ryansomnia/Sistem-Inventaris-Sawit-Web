

 

<?php
echo"<div class='row-fluid'>	
				<div class='box blue span12'>
					<div class='box-header'>
						<h2><i class='halflings-icon home'></i><span class='break'></span>Home Dashboard</h2>
					</div>
					<div class='box-content'>";
					?>
 <ul class="chat metro yellow">
							<li class="left">
							
								<span class="message"><span class="arrow"></span>
									<span class="from"><h2><SCRIPT language=JavaScript>var d = new Date();
  var h = d.getHours();
  if (h < 11) { document.write('Selamat pagi,'); }
  else { if (h < 15) { document.write('Selamat siang,'); }
  else { if (h < 19) { document.write('Selamat sore,'); }
  else { if (h <= 23) { document.write('Selamat malam,'); }
  }}}</SCRIPT> <?php echo"$_SESSION[nama]";?></h2></span>
									<span class="time"><div id="clockDisplay" class="clockStyle"></div>
<script type="text/javascript" language="javascript">
function renderTime(){
 var currentTime = new Date();
 var h = currentTime.getHours();
 var m = currentTime.getMinutes();
 var s = currentTime.getSeconds();
 if (h == 0){
  h = 24;
   }
   if (h < 10){
    h = "0" + h;
    }
    if (m < 10){
    m = "0" + m;
    }
    if (s < 10){
    s = "0" + s;
    }
 var myClock = document.getElementById('clockDisplay');
 myClock.textContent = h + ":" + m + ":" + s + "";    
 setTimeout ('renderTime()',1000);
 }
 renderTime();
</script></span>
									<span class="text">
										Silahkan mengelola aplikasi inventory control menggunakan menu menu yang sudah disediakan. 
									</span>
								</span>	                                  
							</li>
						</ul>
						<br/><br/>

					<?php
						echo"<a onClick=\"location.href='index.php?halaman=data_barang'\" class='quick-button span2'>
							<i class='glyphicons-icon cargo'></i>
							<p>Total Barang</p>
							<span class='notification green'>$barang</span>
						</a>

						<a onClick=\"location.href='#'\" class='quick-button span2'>
							<i class='glyphicons-icon group'></i>
							<p>Stok</p>
							<span class='notification green'><=3</span>
						</a>
						<a onClick=\"location.href='index.php?halaman=data_pelanggan'\" class='quick-button span2'>
							<i class=' glyphicons-icon parents'></i>
							<p>Total Pelanggan</p>
							<span class='notification green'>$pelanggan</span>
						</a>
						<a onClick=\"location.href='index.php?halaman=barang_masuk'\" class='quick-button span2'>
							<i class='glyphicons-icon truck'></i>
							<p>Total Pembelian</p>
							<span class='notification green'>$beli</span>
						</a>

						<a onClick=\"location.href='index.php?halaman=penjualan'\" class='quick-button span2'>
							<i class='glyphicons-icon stats'></i>
							<p>Total Penjualan</p>
							<span class='notification green'>$jual</span>
						</a>
						<div class='clearfix'></div><br>
					</div>	
				</div><!--/span-->


				<div class='widget blue span5' onTablet='span6' onDesktop='span5'>
					
					<h2><span class='glyphicons charts'><i></i></span> Grafik Pembelian dan Penjualan</h2>
					
					<hr>
					
					<div class='content'>
						
						<div class='verticalChart'>
							
							<div class='singleBar'>
							
								<div class='bar'>
								
									<div class='value'>
										<span>$persenBeli%</span>
									</div>
								
								</div>
								
								<div class='title'>BELI</div>
							
							</div>
							
							<div class='singleBar'>
							
								<div class='bar'>
								
									<div class='value'>
										<span>$persenjual%</span>
									</div>
								
								</div>
								
								<div class='title'>JUAL</div>
							
							</div>
							
							
							
							<div class='clearfix'></div>
							
						</div>
					
					</div>
					
				</div><!--/span-->"; ?>


				
			<!--/sever load-->
				<div class='box span6'>
					<div class='box-header'>
						<h2><i class='halflings-icon list-alt'></i>Daftar stok yang kurang dari 3</h2>
						
					</div>
					<div class='box-content'>

							<!-- <div id='piechart' style='height:300px'></div>
							<p>Total Penjualan &nbsp;: <b>Rp. ".digit($Tsumjual)."</b></p>
							<p>Total Pembelian : <b>Rp. ".digit($sumBeli[totalBeli])."</b></p>
							<p>------------------------------------------------------ (-)</p>
							<p>Laba atau Rugi &nbsp;&nbsp;: <b>Rp. ".digit($PL)."</b>"; if($PL<0){echo" <span class=\"label label-important\">(RUGI)</span>";} if($PL>0){echo" <span class=\"label label-success\">(UNTUNG)</span>";}echo"</p> -->
					<?php
					$cekStok=mysql_query("SELECT * FROM stok WHERE qty <= 3");
						if(mysql_num_rows($cekStok) > 0){
							while ($stok = mysql_fetch_array($cekStok)) { ?>
								<div class='alert-danger' style='padding:15px 5px 15px 5px; margin:5px;'><center><b><?php echo $stok[barang_nama]; ?></b> </center></div>
							
						<?php	}
						} ?>

					</div>
				</div>

				<!--/sever load-->


				
			</div><!--/row-->
			



