<?php

include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorPNG.php');
include('src/BarcodeGeneratorSVG.php');
include('src/BarcodeGeneratorJPG.php');
include('src/BarcodeGeneratorHTML.php');

// $generatorSVG = new Picqer\Barcode\BarcodeGeneratorSVG();
// file_put_contents('tests/verified-files/081231723897-ean13.svg', $generatorSVG->getBarcode('081231723897', $generatorSVG::TYPE_EAN_13));

if (isset($_GET['kode2'])) {
	$kode2 = $_GET['kode2'];
	$array = explode(",", $kode2);
	for ($i=0; $i < sizeof($array); $i++) {
		if ($array[$i] != "") {
			$generatorJPG = new Picqer\Barcode\BarcodeGeneratorJPG();
			file_put_contents('hasil/'.$array[$i].'.jpg', $generatorJPG->getBarcode($kode, $generatorJPG::TYPE_CODE_128));
			echo "<script>
			alert('Berhasil mengenerate barcode');
			document.location='../validasi_cetak.php?kode=$kode2';
			</script>";
		}
	}
}
else {
	$kode = $_GET['kode'];
	$generatorJPG = new Picqer\Barcode\BarcodeGeneratorJPG();
	file_put_contents('hasil/'.$kode.'.jpg', $generatorJPG->getBarcode($kode, $generatorJPG::TYPE_CODE_128));
	?><meta http-equiv="refresh" content="0;URL='../barcode/hasil/<?php echo $kode; ?>.html'">
<?php
}


// $generatorSVG = new Picqer\Barcode\BarcodeGeneratorSVG();
// file_put_contents('tests/verified-files/0049000004632-ean13.svg', $generatorSVG->getBarcode('0049000004632', $generatorSVG::TYPE_EAN_13));

// $generatorJPG = new Picqer\Barcode\BarcodeGeneratorJPG();
// file_put_contents('hasil/'.$kode.'.jpg', $generatorJPG->getBarcode($kode, $generatorJPG::TYPE_CODE_128));
 ?>