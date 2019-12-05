	<h1>Laporan Penjualan Panen</h1>
					
					<div class="priority low"><span>Berdasarkan Kriteria :</span></div>
	<div class="box-content">
					<form method="post" action="report_keluar.php" target="_blank">
						<table class="table table-bordered table-striped">
							<tr>
								<td><input type="radio" name="berdasar" id="optionsRadios1" value="Semua Data" checked="">
								<td>Semua Data</td>
							</tr>
							<tr>
								<td><input type="radio" name="berdasar" id="optionsRadios2" value="Tanggal"></td>
								<td>Tanggal<br/><br/>
									<input type="text" placeholder='Dari Tanggal' class="input-xlarge datepicker" id="datepicker" name="dari">
									<input type="text" placeholder='Sampai Tanggal' class="input-xlarge datepicker" id="datepicker1" name="ke"></td>
							</tr>

							<tr>
								<td><input type="radio" name="berdasar" id="optionsRadios2" value="Pencarian Kata"></td>
								<td>Pencarian Kriteria<br/><br/>
								
								<select name="field" id="field">
        <option>Pilih Field</option>
          <option value="b.barang_id">Kode Barang</option>
          <option value="a.pelanggan_id">Kode Pelanggan</option>
         <!--  <option value="b.lokasi">Lokasi</option>-->
      </select> 

      <input name="kata" type="text" id="kata" class="textbox" />
								</td>
							</tr>

							
							<tr>
								<td></td>
								<td><input type="submit" name="Submit" class="btn btn-primary" value="Tampilkan" /></td>
								
							</tr>
							
						</table>
						</form>
					</div>	