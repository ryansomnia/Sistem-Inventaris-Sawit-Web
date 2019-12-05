<body onload="print();">
<table width="100%">
	<tr>
		<?php
	$kode = $_GET['kode'];
	$ex = explode(",",$kode);
		for($i = 0;$i < sizeof($ex);$i ++): 
			if ($ex[$i] != "") {?>
			<td><img src="barcode/hasil/<?php echo $ex[$i]; ?>.jpg"></td>
			<br>
<?php 		}
endfor; ?>
	</tr>
	<tr>
		<?php
			for($i = 0;$i < sizeof($ex);$i ++): 
				if ($ex[$i] != "") { ?>
			<td><?php echo $ex[$i]; ?></td>
			<?php } endfor; ?>

	</tr>
</table>
	
</body>
