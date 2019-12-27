<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='checkout')
{
    $sql="INSERT INTO pesanan (nama_lengkap, alamat, jenis_sepatu, total_harga, nama_metode)
        VALUES
        ('$_POST[nama_lengkap]',
         '$_POST[alamat]'
         '$_POST[jenis_sepatu]',
         '$_POST[total_harga]',
         '$_POST[nama_metode]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Checkout baru dengan nama :('.$_POST[nama_lengkap].') Tersimpan")
            window.location.href="index.php?page=checkout";
            </script>'; 
    }
    else{
        echo "Error : ".$sql.". ".mysqli_error($config);
    }
     //header('location:http://localhost/');
}

else 
    if($g=='edit')
    {
        mysqli_query($config,"UPDATE pesanan SET id_pesanan='$_POST[id]',
            nama='$_POST[nama_lengkap]',
                alamat='$_POST[alamat]' WHERE id_pesanan='$_POST[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Checkout dengan nama :('.$_POST[nama_lengkap].') Di Update")
            window.location.href="index.php?page=checkout";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM pesanan where id_pesanan='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Checkout dengan Id :('.$_GET[id_pesanan].') Di Terhapus")
            window.location.href="index.php?page=checkout";
            </script>';
    }
//End Aksi Anggota
?>
