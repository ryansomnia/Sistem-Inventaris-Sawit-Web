<?php
error_reporting(0);
//koneksi ke database, username,password  dan barang_iddatabase menyesuaikan 
require_once "library/koneksi.php";
 
//memanggil file excel_reader
require "excel_reader.php";
 
//jika tombol import ditekan
if(isset($_POST['submit'])){
 
    $target = basename($_FILES['filebarangall']['name']) ;
    move_uploaded_file($_FILES['filebarangall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filebarangall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    if($_POST['drop']==1){
//             kosongkan tabel barang
             $truncate ="TRUNCATE TABLE barang";
             mysql_query($truncate);
    };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $barang_id        = $data->val($i, 1);
      $barang_nama   	= $data->val($i, 2);
      $barang_kategori  = $data->val($i, 3);
      $harga_beli 	    = $data->val($i, 4);
      $harga_jual  		= $data->val($i, 5);
 
//      setelah data dibaca, masukkan ke tabel barang sql
      $query = "INSERT into barang (barang_id,barang_nama,barang_kategori,harga_beli,harga_jual)values('$barang_id','$barang_nama','$barang_kategori','$harga_beli','$harga_jual')";
      $hasil = mysql_query($query);
    }
    
    if(!$hasil){
//          jika import gagal
          die(mysql_error());
      }else{
//          jika impor berhasil
          echo "Data berhasil diimpor.";
          echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=data_barang'>";
    }
    

}
 
?>
 
<form name="myForm" id="myForm" onSubmit="return validateForm()" action="import.php" method="post" enctype="multipart/form-data">
    <input type="file" id="filebarangall" name="filebarangall" />
    <input type="submit" name="submit" value="Import" /><br/>
    <label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
</form>
 
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filebarangall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>