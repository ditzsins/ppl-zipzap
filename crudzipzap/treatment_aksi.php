<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='treatment')
{
    $sql="INSERT INTO metode_cuci (id_sepatu, jenis_treatment, harga, deskripsi, foto_treatment)
        VALUES
        ('$_POST[id_sepatu]',
        '$_POST[jenis_treatment]',
        '$_POST[harga]',
        '$_POST[deskripsi]',
        '$_POST[foto_treatment]'
        )";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Jenis Treatment baru dengan nama :('.$_POST[jenis_treatment].') Tersimpan")
            window.location.href="index.php?page=treatment";
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
        mysqli_query($config,
            "UPDATE metode_cuci
            SET id_sepatu           ='$_POST[id_sepatu]',
                jenis_treatment     ='$_POST[jenis_treatment]',
                harga               ='$_POST[harga]',
                deskripsi           ='$_POST[deskripsi]',
                foto_treatment      ='$_POST[foto_treatment]' 
            WHERE id_metode_cuci='$_POST[id_metode_cuci]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Jenis Treatment dengan :('.$_POST[jenis_treatment].') Di Update")
            window.location.href="index.php?page=treatment";
            </script>';
        }
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM metode_cuci where id_metode_cuci='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Jenis Treatment dengan :('.$_GET[jenis_treatment].') Di Terhapus")
            window.location.href="index.php?page=treatment";
            </script>';
    }
?>
