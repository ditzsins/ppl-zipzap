<?php
include 'koneksi.php';
if($g=='order')
{
    $sql="INSERT INTO pesanan (nama_lengkap, tgl_pesanan, jenis_sepatu, jenis_treatment, harga, nama_metode)
        VALUES
        ($nama_lengkap      ='$_POST[nama_lengkap]',
         $tgl_pesanan       ='$_POST[tgl_pesanan]',
         $jenis_sepatu      ='$_POST[jenis_sepatu]',
         $jenis_treatment   ='$_POST[jenis_treatment]', 
         $harga             ='$_POST[harga]',
         $nama_metode       ='$_POST[nama_metode]')"; 
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Order baru dengan nama :('.$_POST[nama_lengkap].') Tersimpan")
            window.location.href="index.php?page=order";
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
        mysqli_query($config,"
            UPDATE pesanan 
            SET id_pesanan='$_POST[id_pesanan]',
                nama_lengkap='$_POST[nama_lengkap]',
                tgl_pesanan='$_POST[tgl_pesanan]'
                jenis_sepatu='$_POST[jenis_sepatu]',
                jenis_treatment='$_POST[jenis_treatment]'
                harga='$_POST[harga]',
                nama_metode='$_POST[nama_metode]' 
                WHERE id_pesanan='$_POST[id_pesanan]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Order dengan nama_lengkap :('.$_POST[nama_lengkap].') Di Update")
            window.location.href="index.php?page=order";
            </script>';
    } 
else 
    if($g=='hapus')
    {
 mysqli_query($config,"DELETE FROM pesanan where id_pesanan='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Order dengan Pesanan :('.$_GET[id_pesanan].') Di Terhapus")
            window.location.href="index.php?page=order";
            </script>';
    }
//End Aksi Anggota
?>
