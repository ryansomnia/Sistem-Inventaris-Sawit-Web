	<h1>Laporan Pembelian</h1>
					
					<div class="priority low"><span>Berdasarkan Kriteria :</span></div>

	<div class="box-content">
					<form method="post" action="report_beli.php"  target="_blank">
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
								<td></td>
								<td><input type="submit" name="Submit" id="btn_tampilkan" value="Tampilkan" /></td>
								
							</tr>
							
						</table>
						</form>
					</div>	