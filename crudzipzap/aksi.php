<?php
include 'koneksi.php';

$g=$_GET['sender'];
if($g=='anggota')
{
    $sql="INSERT INTO anggota (nama, alamat)
        VALUES
        ('$_POST[nama]',
         '$_POST[alamat]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Anggota baru dengan nama :('.$_POST[nama].') Tersimpan")
            window.location.href="index.php?page=anggota";
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
        mysqli_query($config,"UPDATE anggota SET id='$_POST[id]',
            nama='$_POST[nama]',
                alamat='$_POST[alamat]' WHERE id='$_POST[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan nama :('.$_POST[nama].') Di Update")
            window.location.href="index.php?page=anggota";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM anggota where id_anggota='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan Id :('.$_GET[id_anggota].') Di Terhapus")
            window.location.href="index.php?page=anggota";
            </script>';
    }
//End Aksi Anggota
?>
